<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Check;
use App\Models\Project;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ChecksExport;
use App\Models\ProjectUnit;
class CheckController extends Controller
{
    /**
     * عرض قائمة الشيكات
     */
    public function index(Request $request)
    {
        $query = Check::query();

        // فلترة بسيطة إذا لزم الأمر
        if ($request->has('search')) {
            $query->where('check_number', 'like', '%' . $request->search . '%')
                  ->orWhere('party_name', 'like', '%' . $request->search . '%');
        }

        $checks = $query->latest()->paginate(15);

        return view('dashboard.checks.index', compact('checks'));
    }

    /**
     * عرض نموذج إضافة شيك جديد
     */
    public function create()
    {
        $bankAccounts = BankAccount::all();
        $projects = Project::all();
        $projectUnits = ProjectUnit::with('project:id,name')->get(['id', 'project_id', 'unit_number']);

    return view('dashboard.checks.create', compact(
        'bankAccounts',
        'projects',
        'projectUnits'
    ));
    }

    /**
     * حفظ الشيك الجديد
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'check_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'type' => 'required|in:receivable,payable',
            'party_name' => 'required|string|max:255',
            'party_phone' => 'nullable|string|max:20',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'deposit_bank_account_id' => 'nullable|exists:bank_accounts,id',
            'payment_bank_account_id' => 'nullable|exists:bank_accounts,id',
            'project_id' => 'nullable|exists:projects,id',
            'notes' => 'nullable|string',
        ]);

        // حساب القيمة بالشيكل
        $validated['amount_ils'] = $validated['amount'] * $validated['exchange_rate'];

        Check::create($validated);

        return redirect()->route('dashboard.checks.index')
            ->with('success', 'تم إضافة الشيك بنجاح');
    }

    /**
     * عرض تفاصيل الشيك
     */
    public function show(Check $check)
    {
        return view('dashboard.checks.show', compact('check'));
    }

    /**
     * عرض نموذج تعديل الشيك
     */
    public function edit(Check $check)
    {
        $bankAccounts = BankAccount::all();
        $projects = Project::all();
        $projectUnits = ProjectUnit::with('project:id,name')->get(['id', 'project_id', 'unit_number']);

    return view('dashboard.checks.edit', compact(
        'check',
        'bankAccounts',
        'projects',
        'projectUnits'
    ));
    }

    /**
     * تحديث بيانات الشيك
     */
    public function update(Request $request, Check $check)
    {
        $validated = $request->validate([
            'check_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'type' => 'required|in:receivable,payable',
            'party_name' => 'required|string|max:255',
            'party_phone' => 'nullable|string|max:20',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'deposit_bank_account_id' => 'nullable|exists:bank_accounts,id',
            'payment_bank_account_id' => 'nullable|exists:bank_accounts,id',
            'project_id' => 'nullable|exists:projects,id',
            'notes' => 'nullable|string',
        ]);

        $validated['amount_ils'] = $validated['amount'] * $validated['exchange_rate'];

        $check->update($validated);

        return redirect()->route('dashboard.checks.index')
            ->with('success', 'تم تحديث بيانات الشيك بنجاح');
    }

    /**
     * حذف الشيك
     */
    public function destroy(Check $check)
    {
        $check->delete();
        return redirect()->route('dashboard.checks.index')
            ->with('success', 'تم حذف الشيك بنجاح');
    }
    public function trash()
{
    $checks = Check::onlyTrashed()->latest('deleted_at')->paginate(10);
    return view('dashboard.checks.trash', compact('checks'));
}


    /**
     * استعادة شيك محذوف من سلة المهملات.
     */
    public function restore($id)
    {
        $check = Check::onlyTrashed()->findOrFail($id);
        $check->restore();
        return redirect()->route('dashboard.checks.trash')->with('success', 'تم استعادة الشيك بنجاح.');
    }

    /**
     * حذف شيك بشكل نهائي من قاعدة البيانات.
     */
    public function forceDelete($id)
    {
        $check = Check::onlyTrashed()->findOrFail($id);
        $check->forceDelete();
        return redirect()->route('dashboard.checks.trash')->with('success', 'تم حذف الشيك نهائياً.');
    }


    /**
     * تصدير الشيكات إلى ملف Excel
     */
    public function exportExcel()
    {
        // ملاحظة: يتطلب مكتبة Maatwebsite/Laravel-Excel
        // سأقوم بتزويدك بكود الـ Export أيضاً
        return Excel::download(new ChecksExport, 'checks_report_' . date('Y-m-d') . '.xlsx');
    }
}
