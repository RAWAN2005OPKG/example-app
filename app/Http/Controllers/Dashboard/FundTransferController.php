<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\CashSafe;
use App\Models\FundTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class FundTransferController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::where('is_active', true)->get();
        $cashSafes = CashSafe::where('is_active', true)->get();
        $transfers = FundTransfer::latest()->take(15)->get();
        
        // إضافة أسماء الحسابات بشكل واضح للعرض في الجدول
        $transfers->each(function ($transfer) {
            $transfer->fromAccountName = $this->getAccountName($transfer->from_type, $transfer->from_id);
            $transfer->toAccountName = $this->getAccountName($transfer->to_type, $transfer->to_id);
        });

        return view('dashboard.fund_transfers.index', compact( 'bankAccounts', 'cashSafes', 'transfers'));
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

        DB::beginTransaction();
        try {
            // خصم المبلغ من الحساب المصدر
            $fromAccount = $this->getAccountModel($fromType, $fromId);
            $fromBalance = $fromAccount instanceof BankAccount ? $fromAccount->resolved_balance : (float) $fromAccount->balance;
            if ($fromBalance < $amount) {
                throw new \Exception('الرصيد في الحساب المصدر غير كافٍ لإتمام عملية التحويل.');
            }
            if ($fromAccount instanceof BankAccount) {
                $fromAccount->applyBalanceDelta(-1 * $amount);
            } else {
                $fromAccount->decrement('balance', $amount);
            }

            // إضافة المبلغ إلى الحساب الهدف
            $toAccount = $this->getAccountModel($toType, $toId);
            if ($toAccount instanceof BankAccount) {
                $toAccount->applyBalanceDelta($amount);
            } else {
                $toAccount->increment('balance', $amount);
            }

            // تسجيل عملية التحويل
            FundTransfer::create([
                'date' => $request->date,
                'amount' => $amount,
                'currency' => $request->currency,
                'from_type' => $fromType,
                'from_id' => $fromId,
                'to_type' => $toType,
                'to_id' => $toId,
                'notes' => $request->notes,
            ]);

            DB::commit();
            return redirect()->route('dashboard.fund-transfers.index')->with('success', 'تم التحويل بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'حدث خطأ: ' . $e->getMessage()])->withInput();
        }
    }

    // دالة مساعدة لجلب المودل الصحيح
    private function getAccountModel($type, $id)
    {
        if ($type === 'cash') {
            return CashSafe::findOrFail($id);
        }
        return BankAccount::findOrFail($id);
    }

    // دالة مساعدة لجلب اسم الحساب للعرض
    private function getAccountName($type, $id)
    {
        try {
            $account = $this->getAccountModel($type, $id);
            if ($type === 'cash') {
                return 'خزينة: ' . $account->name;
            }
            return 'بنك: ' . $account->account_name;
        } catch (\Exception $e) {
            return 'حساب محذوف';
        }
    }
}
