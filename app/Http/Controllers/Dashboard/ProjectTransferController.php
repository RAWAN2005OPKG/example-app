<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProjectTransfer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\JournalEntry;
use App\Models\JournalEntryItem;
use App\Models\Account;
use App\Models\Client;
use App\Models\Supplier;
use App\Models\Investor;
use App\Models\CashSafe;
use App\Models\KhaledVoucher;
use App\Models\MohammedVoucher;
use App\Models\WaliVoucher;
use App\Models\CashTransaction;
use App\Models\Voucher;
use App\Models\SupplierPayment;
use App\Models\Expense;

class ProjectTransferController extends Controller
{
    public function index(Request $request) {
        $query = ProjectTransfer::with(['fromProject', 'toProject', 'user'])->latest();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('notes', 'like', '%' . $request->search . '%')
                  ->orWhere('amount', 'like', '%' . $request->search . '%');
            });
        }

        $transfers = $query->paginate(15);
        return view('dashboard.project_transfers.index', compact('transfers'));
    }

    public function create() {
        $projects = Project::where('status', '!=', 'completed')->get();
        $clients = Client::all();
        $investors = Investor::all();
        $suppliers = Supplier::all();
        $safes = CashSafe::where('is_active', true)->get();
        return view('dashboard.project_transfers.create', compact('projects', 'clients', 'investors', 'suppliers', 'safes'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'from_project_id' => ['nullable', 'exists:projects,id'],
            'to_project_id' => ['nullable', 'exists:projects,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'transfer_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
            
            // Complex workflow fields
            'from_entity_type' => ['nullable', 'string', 'in:client,investor,safe,project_balance'],
            'from_entity_id' => ['nullable', 'numeric'],
            'to_entity_type' => ['nullable', 'string', 'in:supplier,safe,project_balance'],
            'to_entity_id' => ['nullable', 'numeric'],
            'voucher_type' => ['nullable', 'string', 'in:khaled,mohammed,wali,none'],
        ]);

        DB::beginTransaction();
        try {
            $amount = $validated['amount'];
            $transferDate = $validated['transfer_date'];
            
            // 1. Create the transfer record
            $transfer = ProjectTransfer::create($validated + ['user_id' => Auth::id()]);

            // 2. Handle Source (From)
            if (in_array($validated['from_entity_type'], ['client', 'investor']) && $validated['from_entity_id']) {
                $entityIdField = $validated['from_entity_type'] === 'client' ? 'client_id' : 'investor_id';
                
                // Client/Investor -> Project A (via Voucher)
                if ($validated['voucher_type'] === 'khaled') {
                    $voucher = KhaledVoucher::create([
                        'voucher_date' => $transferDate,
                        'type' => 'receipt',
                        'payment_method' => 'cash',
                        'amount' => $amount,
                        'currency' => 'ILS',
                        'exchange_rate' => 1,
                        'amount_ils' => $amount,
                        'project_id' => $validated['from_project_id'],
                        $entityIdField => $validated['from_entity_id'],
                        'description' => 'سند صرف من ' . ($validated['from_entity_type'] === 'client' ? 'عميل' : 'مستثمر') . ' (تحويل مشروع) - ' . $validated['notes'],
                        'user_id' => Auth::id(),
                    ]);
                    $voucher->details()->create(['cash_id' => 1]); // Assuming default cash
                } elseif ($validated['voucher_type'] === 'mohammed') {
                     MohammedVoucher::create([
                        'voucher_date' => $transferDate,
                        'type' => 'receipt',
                        'payment_method' => 'cash',
                        'amount' => $amount,
                        'currency' => 'ILS',
                        'exchange_rate' => 1,
                        'project_id' => $validated['from_project_id'],
                        $entityIdField => $validated['from_entity_id'],
                        'description' => 'سند صرف من ' . ($validated['from_entity_type'] === 'client' ? 'عميل' : 'مستثمر') . ' (تحويل مشروع) - ' . $validated['notes'],
                        'user_id' => Auth::id(),
                    ]);
                } elseif ($validated['voucher_type'] === 'wali') {
                     WaliVoucher::create([
                        'voucher_date' => $transferDate,
                        'type' => 'receipt',
                        'payment_method' => 'cash',
                        'amount' => $amount,
                        'currency' => 'ILS',
                        'exchange_rate' => 1,
                        'project_id' => $validated['from_project_id'],
                        $entityIdField => $validated['from_entity_id'],
                        'description' => 'سند صرف من ' . ($validated['from_entity_type'] === 'client' ? 'عميل' : 'مستثمر') . ' (تحويل مشروع) - ' . $validated['notes'],
                        'user_id' => Auth::id(),
                    ]);
                }
            }

            // Update Source Project Balance
            if ($validated['from_project_id']) {
                $fromProject = Project::findOrFail($validated['from_project_id']);
                // If it's a balance transfer (not from client/investor), we decrement
                if (!in_array($validated['from_entity_type'], ['client', 'investor'])) {
                    if ($fromProject->balance < $amount) {
                         throw new \Exception('الرصيد في المشروع المصدر غير كافٍ.');
                    }
                    $fromProject->decrement('balance', $amount);
                } else {
                    // Client/Investor payment already increments balance in Voucher Controller usually, 
                    // but here we are doing it manually since we are in store()
                    $fromProject->increment('balance', $amount);
                }
            }

            // 3. Handle Target (To)
            if ($validated['to_project_id']) {
                $toProject = Project::findOrFail($validated['to_project_id']);
                $toProject->increment('balance', $amount);
            }

            if ($validated['to_entity_type'] === 'supplier' && $validated['to_entity_id']) {
                // Project B -> Supplier (Payment)
                $supplier = Supplier::findOrFail($validated['to_entity_id']);
                SupplierPayment::create([
                    'date' => $transferDate,
                    'source_of_funds' => 'مشروع: ' . ($toProject->name ?? $fromProject->name),
                    'paid_by' => Auth::user()->name,
                    'amount' => $amount,
                    'amount_ils' => $amount,
                    'currency' => 'ILS',
                    'exchange_rate' => 1, // Added for consistency
                    'payment_method' => 'cash',
                    'payment_source' => 'تحويل مشروع',
                    'payee' => $supplier->name,
                    'payable_type' => Supplier::class,
                    'payable_id' => $supplier->id,
                    'project_id' => $validated['to_project_id'] ?? $validated['from_project_id'],
                    'details' => 'تحويل ناتج عن عملية مشروع: ' . $validated['notes'],
                    'notes' => $validated['notes'],
                ]);
            } elseif ($validated['to_entity_type'] === 'safe' && $validated['to_entity_id']) {
                // Project B -> Safe (Deposit)
                $safe = CashSafe::findOrFail($validated['to_entity_id']);
                $safe->increment('balance', $amount);
                
                CashTransaction::create([
                    'type' => 'in',
                    'amount' => $amount,
                    'currency' => $safe->currency,
                    'cash_safe_id' => $safe->id,
                    'source' => 'تحويل من مشروع: ' . ($toProject->name ?? 'غير محدد'),
                    'description' => $validated['notes'],
                    'date' => $transferDate,
                    'user_id' => Auth::id(),
                ]);
            }

            // 4. Create Journal Entries
            $this->createJournalEntry($transfer);

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم تنفيذ التحويل المركب بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(ProjectTransfer $projectTransfer) {
        $projects = Project::where('status', '!=', 'completed')->get();
        return view('dashboard.project_transfers.edit', compact('projectTransfer', 'projects'));
    }

    public function update(Request $request, ProjectTransfer $projectTransfer) {
        $validated = $request->validate([
            'from_project_id' => ['required', 'exists:projects,id', 'different:to_project_id'],
            'to_project_id' => ['required', 'exists:projects,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'transfer_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::beginTransaction();
        try {
            // 1. عكس العملية القديمة
            $oldFromProject = Project::find($projectTransfer->from_project_id);
            $oldToProject = Project::find($projectTransfer->to_project_id);
            $oldFromProject->increment('balance', $projectTransfer->amount);
            $oldToProject->decrement('balance', $projectTransfer->amount);

            // 2. تطبيق العملية الجديدة
            $newFromProject = Project::find($validated['from_project_id']);
            $newToProject = Project::find($validated['to_project_id']);
            $newFromProject->decrement('balance', $validated['amount']);
            $newToProject->increment('balance', $validated['amount']);

            // 3. تحديث سجل التحويل نفسه
            $projectTransfer->update($validated);

            // 4. تحديث القيد المحاسبي
            $this->deleteJournalEntry($projectTransfer);
            $this->createJournalEntry($projectTransfer);

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم تحديث التحويل بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(ProjectTransfer $projectTransfer) {
        DB::beginTransaction();
        try {
            // عكس أثر التحويل على أرصدة المشاريع قبل الحذف
            $fromProject = Project::find($projectTransfer->from_project_id);
            $toProject = Project::find($projectTransfer->to_project_id);
            $fromProject->increment('balance', $projectTransfer->amount);
            $toProject->decrement('balance', $projectTransfer->amount);

            // حذف سجل التحويل
            $this->deleteJournalEntry($projectTransfer);
            $projectTransfer->delete();

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم حذف التحويل وعكس أثره المالي بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }

    /**
     * إنشاء قيود محاسبية للعملية بالكامل
     */
    private function createJournalEntry(ProjectTransfer $transfer)
    {
        $amount = $transfer->amount;
        $date = $transfer->transfer_date;
        $notes = $transfer->notes;

        $journalEntry = JournalEntry::create([
            'date' => $date,
            'description' => 'عملية تحويل مركب رقم ' . $transfer->id . ($notes ? ' - ' . $notes : ''),
            'reference_type' => ProjectTransfer::class,
            'reference_id' => $transfer->id,
        ]);

        // الخطوة 1: من المصدر الخارجي إلى المشروع الأول (إذا وجد)
        if (in_array($transfer->from_entity_type, ['client', 'investor']) && $transfer->from_entity_id && $transfer->from_project_id) {
            $sourceAccount = $this->getOrCreateEntityAccount($transfer->from_entity_type, $transfer->from_entity_id);
            $projectAccount = $this->getOrCreateProjectAccount(Project::find($transfer->from_project_id));
            
            if ($sourceAccount && $projectAccount) {
                $this->addEntryItem($journalEntry->id, $projectAccount->id, $amount, 0); // المدين: المشروع
                $this->addEntryItem($journalEntry->id, $sourceAccount->id, 0, $amount); // الدائن: المصدر
            }
        } elseif ($transfer->from_entity_type === 'safe' && $transfer->from_entity_id && $transfer->from_project_id) {
            $safeAccount = $this->getOrCreateEntityAccount('safe', $transfer->from_entity_id);
            $projectAccount = $this->getOrCreateProjectAccount(Project::find($transfer->from_project_id));
            if ($safeAccount && $projectAccount) {
                $this->addEntryItem($journalEntry->id, $projectAccount->id, $amount, 0);
                $this->addEntryItem($journalEntry->id, $safeAccount->id, 0, $amount);
            }
        }

        // الخطوة 2: تحويل بين المشاريع (إذا وجد)
        if ($transfer->from_project_id && $transfer->to_project_id && $transfer->from_project_id != $transfer->to_project_id) {
            $fromProjectAcc = $this->getOrCreateProjectAccount(Project::find($transfer->from_project_id));
            $toProjectAcc = $this->getOrCreateProjectAccount(Project::find($transfer->to_project_id));
            
            if ($fromProjectAcc && $toProjectAcc) {
                $this->addEntryItem($journalEntry->id, $toProjectAcc->id, $amount, 0); // المدين: المشروع المستلم
                $this->addEntryItem($journalEntry->id, $fromProjectAcc->id, 0, $amount); // الدائن: المشروع المرسل
            }
        }

        // الخطوة 3: من المشروع الأخير إلى الوجهة النهائية (إذا وجد)
        $lastProjectId = $transfer->to_project_id ?: $transfer->from_project_id;
        if ($lastProjectId && $transfer->to_entity_type && $transfer->to_entity_id) {
             $projectAccount = $this->getOrCreateProjectAccount(Project::find($lastProjectId));
             $destAccount = $this->getOrCreateEntityAccount($transfer->to_entity_type, $transfer->to_entity_id);
             
             if ($projectAccount && $destAccount) {
                 $this->addEntryItem($journalEntry->id, $destAccount->id, $amount, 0); // المدين: الوجهة
                 $this->addEntryItem($journalEntry->id, $projectAccount->id, 0, $amount); // الدائن: المشروع الأخير
             }
        }
    }

    private function addEntryItem($journalId, $accountId, $debit, $credit) {
        JournalEntryItem::create([
            'journal_entry_id' => $journalId,
            'account_id' => $accountId,
            'debit' => $debit,
            'credit' => $credit,
        ]);
    }

    private function getOrCreateEntityAccount($type, $id) {
        $prefix = ['client' => '300', 'investor' => '400', 'supplier' => '500', 'safe' => '100'][$type] ?? '999';
        $code = $prefix . $id;
        $namePrefix = ['client' => 'عميل: ', 'investor' => 'مستثمر: ', 'supplier' => 'مورد: ', 'safe' => 'خزينة: '][$type] ?? 'حساب: ';
        
        $account = Account::where('code', $code)->first();
        if (!$account) {
            $entityName = 'مجهول';
            if ($type === 'client') $entityName = Client::find($id)->name ?? 'ع';
            elseif ($type === 'investor') $entityName = Investor::find($id)->name ?? 'م';
            elseif ($type === 'supplier') $entityName = Supplier::find($id)->name ?? 'س';
            elseif ($type === 'safe') $entityName = CashSafe::find($id)->name ?? 'خ';

            $account = Account::create([
                'name' => $namePrefix . $entityName,
                'code' => $code,
                'type' => in_array($type, ['client', 'investor', 'supplier']) ? 'equity' : 'asset',
                'is_active' => true,
            ]);
        }
        return $account;
    }

    private function deleteJournalEntry(ProjectTransfer $transfer)
    {
        $journalEntry = JournalEntry::where('reference_type', ProjectTransfer::class)
            ->where('reference_id', $transfer->id)
            ->first();

        if ($journalEntry) {
            JournalEntryItem::where('journal_entry_id', $journalEntry->id)->delete();
            $journalEntry->delete();
        }
    }

    private function getOrCreateProjectAccount(Project $project)
    {
        // نفترض كود حسابات المشاريع يبدأ بـ 2000
        $code = '200' . $project->id; 
        $account = Account::where('code', $code)->first();

        if (!$account) {
            $account = Account::create([
                'name' => 'حساب مشروع: ' . $project->name,
                'code' => $code,
                'type' => 'asset',
                'is_active' => true,
            ]);
        }
        return $account;
    }
}
