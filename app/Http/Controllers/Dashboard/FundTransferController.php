<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\CashSafe;
use App\Models\FundTransfer;
use App\Models\KhaledVoucher;
use App\Models\MohammedVoucher;
use App\Models\WaliVoucher;
use App\Models\JournalEntry;
use App\Models\JournalEntryItem;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class FundTransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transfers = FundTransfer::latest()->paginate(15);

        // إضافة أسماء الحسابات بشكل واضح للعرض في الجدول
        $transfers->getCollection()->transform(function ($transfer) {
            $transfer->fromAccountName = $this->getAccountName($transfer->fromable_type, $transfer->fromable_id);
            $transfer->toAccountName = $this->getAccountName($transfer->toable_type, $transfer->toable_id);
            return $transfer;
        });

        return view('dashboard.fund_transfers.index', compact('transfers'));
    }

    public function create()
    {
        $bankAccounts = BankAccount::where('is_active', true)->get();
        $cashSafes = CashSafe::where('is_active', true)->get();

        // Get Khaled vouchers (active only)
        $khaledVouchers = KhaledVoucher::all();

        // Get Mohammed vouchers (active only)
        $mohammedVouchers = MohammedVoucher::all();

        // Get Waleed/Wali vouchers (active only)
        $waliVouchers = WaliVoucher::all();

        return view('dashboard.fund_transfers.create', compact(
            'bankAccounts',
            'cashSafes',
            'khaledVouchers',
            'mohammedVouchers',
            'waliVouchers'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string',
            'from_account' => 'required|string',
            'to_account' => 'required|string|different:from_account',
            'notes' => 'nullable|string',
        ], [
            'to_account.different' => 'لا يمكن التحويل من وإلى نفس الحساب.',
        ]);

        list($fromType, $fromId) = explode('-', $request->from_account);
        list($toType, $toId) = explode('-', $request->to_account);
        $amount = (float)$request->amount;

        // Validate from account has sufficient balance
        $fromBalance = $this->getAccountBalance($fromType, $fromId);
        if ($fromBalance < $amount) {
            return back()->withErrors(['error' => 'الرصيد في الحساب المصدر غير كافٍ لإتمام عملية التحويل.'])->withInput();
        }

        DB::beginTransaction();
        try {
            // خصم المبلغ من الحساب المصدر
            $this->updateAccountBalance($fromType, $fromId, -1 * $amount);

            // إضافة المبلغ إلى الحساب الهدف
            $this->updateAccountBalance($toType, $toId, $amount);

            // تسجيل عملية التحويل
            $fundTransfer = FundTransfer::create([
                'date' => $request->date,
                'amount' => $amount,
                'currency' => $request->currency,
                'fromable_type' => $fromType,
                'fromable_id' => $fromId,
                'toable_type' => $toType,
                'toable_id' => $toId,
                'notes' => $request->notes,
            ]);

            // إنشاء قيد محاسبي للتحويل
            $this->createJournalEntry($fundTransfer, $request);

            DB::commit();
            return redirect()->route('dashboard.fund-transfers.index')->with('success', 'تم التحويل بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit(FundTransfer $fundTransfer)
    {
        $bankAccounts = BankAccount::where('is_active', true)->get();
        $cashSafes = CashSafe::where('is_active', true)->get();
        $khaledVouchers = KhaledVoucher::where('status', 'approved')->get();
        $mohammedVouchers = MohammedVoucher::where('status', 'approved')->get();
        $waliVouchers = WaliVoucher::where('status', 'approved')->get();

        $fromAccountName = $this->getAccountName($fundTransfer->fromable_type, $fundTransfer->fromable_id);
        $toAccountName = $this->getAccountName($fundTransfer->toable_type, $fundTransfer->toable_id);

        return view('dashboard.fund_transfers.edit', compact(
            'fundTransfer',
            'bankAccounts',
            'cashSafes',
            'khaledVouchers',
            'mohammedVouchers',
            'waliVouchers',
            'fromAccountName',
            'toAccountName'
        ));
    }

    public function update(Request $request, FundTransfer $fundTransfer)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string',
            'from_account' => 'required|string',
            'to_account' => 'required|string|different:from_account',
            'notes' => 'nullable|string',
        ], [
            'to_account.different' => 'لا يمكن التحويل من وإلى نفس الحساب.',
        ]);

        list($newFromType, $newFromId) = explode('-', $request->from_account);
        list($newToType, $newToId) = explode('-', $request->to_account);
        $newAmount = (float)$request->amount;

        // Reverse the old transfer first
        DB::beginTransaction();
        try {
            // Restore balance to old from account
            $this->updateAccountBalance($fundTransfer->fromable_type, $fundTransfer->fromable_id, $fundTransfer->amount);

            // Deduct from old to account
            $this->updateAccountBalance($fundTransfer->toable_type, $fundTransfer->toable_id, -1 * $fundTransfer->amount);

            // Validate new from account has sufficient balance
            $fromBalance = $this->getAccountBalance($newFromType, $newFromId);
            if ($fromBalance < $newAmount) {
                // Restore old balances
                $this->updateAccountBalance($fundTransfer->fromable_type, $fundTransfer->fromable_id, -1 * $fundTransfer->amount);
                $this->updateAccountBalance($fundTransfer->toable_type, $fundTransfer->toable_id, $fundTransfer->amount);

                return back()->withErrors(['error' => 'الرصيد في الحساب المصدر الجديد غير كافٍ لإتمام عملية التحويل.'])->withInput();
            }

            // Apply new transfer
            $this->updateAccountBalance($newFromType, $newFromId, -1 * $newAmount);
            $this->updateAccountBalance($newToType, $newToId, $newAmount);

            // Update transfer record
            $fundTransfer->update([
                'date' => $request->date,
                'amount' => $newAmount,
                'currency' => $request->currency,
                'fromable_type' => $newFromType,
                'fromable_id' => $newFromId,
                'toable_type' => $newToType,
                'toable_id' => $newToId,
                'notes' => $request->notes,
            ]);

            // Delete old journal entry and create new one
            $this->deleteJournalEntry($fundTransfer);
            $this->createJournalEntry($fundTransfer, $request);

            DB::commit();
            return redirect()->route('dashboard.fund-transfers.index')->with('success', 'تم التحديث بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(FundTransfer $fundTransfer)
    {
        DB::beginTransaction();
        try {
            // Reverse the transfer - restore balance to from account
            $this->updateAccountBalance($fundTransfer->fromable_type, $fundTransfer->fromable_id, $fundTransfer->amount);

            // Deduct from to account
            $this->updateAccountBalance($fundTransfer->toable_type, $fundTransfer->toable_id, -1 * $fundTransfer->amount);

            // Delete journal entry
            $this->deleteJournalEntry($fundTransfer);

            $fundTransfer->delete();

            DB::commit();
            return redirect()->route('dashboard.fund-transfers.index')->with('success', 'تم الحذف بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ: ' . $e->getMessage()]);
        }
    }

    /**
     * Create journal entry for fund transfer
     */
    private function createJournalEntry(FundTransfer $transfer, Request $request)
    {
        // Get or create accounts for the transfer
        $fromAccount = $this->getOrCreateTransferAccount($transfer->fromable_type, $transfer->fromable_id, 'من');
        $toAccount = $this->getOrCreateTransferAccount($transfer->toable_type, $transfer->toable_id, 'إلى');

        if (!$fromAccount || !$toAccount) {
            // If accounts don't exist, skip journal entry
            return;
        }

        $description = 'تحويل من ' . $this->getAccountName($transfer->fromable_type, $transfer->fromable_id) .
                       ' إلى ' . $this->getAccountName($transfer->toable_type, $transfer->toable_id);

        if ($transfer->notes) {
            $description .= ' - ' . $transfer->notes;
        }

        // Create journal entry
        $journalEntry = JournalEntry::create([
            'date' => $transfer->date,
            'description' => $description,
            'reference_type' => FundTransfer::class,
            'reference_id' => $transfer->id,
        ]);

        // Debit the destination account (مدين)
        JournalEntryItem::create([
            'journal_entry_id' => $journalEntry->id,
            'account_id' => $toAccount->id,
            'debit' => $transfer->amount,
            'credit' => 0,
        ]);

        // Credit the source account (دائن)
        JournalEntryItem::create([
            'journal_entry_id' => $journalEntry->id,
            'account_id' => $fromAccount->id,
            'debit' => 0,
            'credit' => $transfer->amount,
        ]);
    }

    /**
     * Delete journal entry for fund transfer
     */
    private function deleteJournalEntry(FundTransfer $transfer)
    {
        $journalEntry = JournalEntry::where('reference_type', FundTransfer::class)
            ->where('reference_id', $transfer->id)
            ->first();

        if ($journalEntry) {
            // Delete journal entry items first
            JournalEntryItem::where('journal_entry_id', $journalEntry->id)->delete();
            // Delete journal entry
            $journalEntry->delete();
        }
    }

    /**
     * Get or create a transfer account for journal entry
     */
    private function getOrCreateTransferAccount($type, $id, $prefix)
    {
        $accountName = $this->getAccountName($type, $id);
        $accountCode = $this->getAccountCode($type);

        // Try to find existing account
        $account = Account::where('code', $accountCode)->first();

        if (!$account) {
            // Create new account if doesn't exist
            $account = Account::create([
                'name' => $accountName,
                'code' => $accountCode,
                'type' => 'asset', // These are asset accounts (cash, bank)
                'is_active' => true,
            ]);
        }

        return $account;
    }

    /**
     * Get account code based on type
     */
    private function getAccountCode($type)
    {
        switch ($type) {
            case 'cash':
                return '1001'; // صندوق/خزينة
            case 'bank':
                return '1002'; // حساب بنكي
            case 'khaled':
                return '1003'; // صندوق خالد
            case 'mohammed':
                return '1004'; // صندوق محمد
            case 'wali':
                return '1005'; // صندوق وليد
            default:
                return '1000'; // عام
        }
    }

    // Get all available accounts for transfer
    public function getAllAccounts()
    {
        $accounts = [];

        // Cash Safes (الخزائن)
        $cashSafes = CashSafe::where('is_active', true)->get();
        foreach ($cashSafes as $safe) {
            $accounts[] = [
                'type' => 'cash',
                'id' => $safe->id,
                'name' => 'خزينة: ' . $safe->name,
                'balance' => (float) $safe->balance,
                'category' => 'الكاش'
            ];
        }

        // Bank Accounts (الحسابات البنكية)
        $bankAccounts = BankAccount::where('is_active', true)->get();
        foreach ($bankAccounts as $account) {
            $accounts[] = [
                'type' => 'bank',
                'id' => $account->id,
                'name' => 'بنك: ' . $account->account_name . ' (' . ($account->bank->name ?? '') . ')',
                'balance' => $account->resolved_balance,
                'category' => 'البنكي'
            ];
        }

        // Khaled Vouchers (صندوق خالد)
        $khaledVouchers = KhaledVoucher::where('status', 'approved')->get();
        foreach ($khaledVouchers as $voucher) {
            $amount = $voucher->amount ?? 0;
            $accounts[] = [
                'type' => 'khaled',
                'id' => $voucher->id,
                'name' => 'خالد: ' . ($voucher->description ?? 'سند رقم ' . $voucher->id),
                'balance' => (float) $amount,
                'category' => 'خالد'
            ];
        }

        // Mohammed Vouchers (صندوق محمد)
        $mohammedVouchers = MohammedVoucher::where('status', 'approved')->get();
        foreach ($mohammedVouchers as $voucher) {
            $amount = $voucher->amount ?? 0;
            $accounts[] = [
                'type' => 'mohammed',
                'id' => $voucher->id,
                'name' => 'محمد: ' . ($voucher->description ?? 'سند رقم ' . $voucher->id),
                'balance' => (float) $amount,
                'category' => 'محمد'
            ];
        }

        // Waleed/Wali Vouchers (صندوق وليد)
        $waliVouchers = WaliVoucher::where('status', 'approved')->get();
        foreach ($waliVouchers as $voucher) {
            $amount = $voucher->amount ?? 0;
            $accounts[] = [
                'type' => 'wali',
                'id' => $voucher->id,
                'name' => 'وليد: ' . ($voucher->description ?? 'سند رقم ' . $voucher->id),
                'balance' => (float) $amount,
                'category' => 'وليد'
            ];
        }

        return $accounts;
    }

    // دالة مساعدة لجلب المودل الصحيح
    private function getAccountModel($type, $id)
    {
        switch ($type) {
            case 'cash':
                return CashSafe::find($id);
            case 'bank':
                return BankAccount::find($id);
            case 'khaled':
                return KhaledVoucher::find($id);
            case 'mohammed':
                return MohammedVoucher::find($id);
            case 'wali':
                return WaliVoucher::find($id);
            default:
                return null;
        }
    }

    // دالة مساعدة لجلب اسم الحساب للعرض
    private function getAccountName($type, $id)
    {
        try {
            $account = $this->getAccountModel($type, $id);
            if (!$account) {
                return 'حساب محذوف';
            }

            switch ($type) {
                case 'cash':
                    return 'خزينة: ' . $account->name;
                case 'bank':
                    return 'بنك: ' . $account->account_name . ' (' . ($account->bank->name ?? '') . ')';
                case 'khaled':
                    return 'خالد: ' . ($account->description ?? 'سند رقم ' . $account->id);
                case 'mohammed':
                    return 'محمد: ' . ($account->description ?? 'سند رقم ' . $account->id);
                case 'wali':
                    return 'وليد: ' . ($account->description ?? 'سند رقم ' . $account->id);
                default:
                    return 'حساب غير معروف';
            }
        } catch (\Exception $e) {
            return 'حساب محذوف';
        }
    }

    // Get account balance
    private function getAccountBalance($type, $id)
    {
        $account = $this->getAccountModel($type, $id);
        if (!$account) {
            return 0;
        }

        switch ($type) {
            case 'cash':
                return (float) $account->balance;
            case 'bank':
                return $account->resolved_balance;
            case 'khaled':
            case 'mohammed':
            case 'wali':
                return (float) ($account->amount ?? 0);
            default:
                return 0;
        }
    }

    // Update account balance
    private function updateAccountBalance($type, $id, $amount)
    {
        $account = $this->getAccountModel($type, $id);
        if (!$account) {
            return;
        }

        switch ($type) {
            case 'cash':
                $account->increment('balance', $amount);
                break;
            case 'bank':
                $account->applyBalanceDelta($amount);
                break;
            case 'khaled':
            case 'mohammed':
            case 'wali':
                // تحديث كل من المبلغ الأساسي والمبلغ بالشيكل لضمان التزامن
                $account->increment('amount', $amount);
                $account->increment('amount_ils', $amount); // نفترض أن التحويل بالشيكل
                break;
        }
    }
}
