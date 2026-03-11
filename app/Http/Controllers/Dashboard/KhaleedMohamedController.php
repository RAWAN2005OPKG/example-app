<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KhaleedMohamedTransaction;
use App\Models\Project;
use Illuminate\Http\Request;

class KhaleedMohamedController extends Controller
{
    /**
     * عرض كل الحركات.
     */
    public function index()
    {
        $transactions = KhaleedMohamedTransaction::with('project')->latest()->paginate(15);
        return view('dashboard.khaleed_mohamed.index', compact('transactions'));
    }

    /**
     * عرض فورم إضافة حركة جديدة.
     */
    public function create()
    {
        $projects = Project::all();
        return view('dashboard.khaleed_mohamed.create', compact('projects'));
    }

    /**
     * تخزين حركة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'date' => 'required|date',
            'amount_shekel' => 'nullable|numeric|min:0',
            'amount_dollar' => 'nullable|numeric|min:0',
            'paid_by' => 'required|in:محمد,خالد',
            'paid_to' => 'required|string|max:255',
            'expense_details' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
$transaction = KhaleedMohamedTransaction::create($validatedData);

    // >>== الخطوة 2 (الجديدة): إنشاء مصروف مطابق في جدول المصروفات ==<<
    Expense::create([
        'project_id' => $transaction->project_id,
        'date' => $transaction->date,
        'payee' => $transaction->paid_to, // صرف لمين
        'project_name' => $transaction->project->name ?? 'غير محدد', // اسم المشروع
        'amount' => $transaction->amount_shekel ?: $transaction->amount_dollar, // المبلغ
        'currency' => $transaction->amount_shekel ? 'ILS' : 'USD', // العملة
        'payment_method' => 'cash', // طريقة الدفع
        'payment_source' => 'سجل خالد ومحمد - ' . $transaction->paid_by, // مصدر الدفع
        'notes' => $transaction->expense_details, // بيانات المصاريف
    ]);
        KhaleedMohamedTransaction::create($validatedData);

        return redirect()->route('dashboard.khaleed-mohamed.index')
                         ->with('success', 'تم تسجيل الحركة بنجاح.');
    }

    /**
     * عرض فورم تعديل حركة موجودة.
     */
    public function edit(KhaleedMohamedTransaction $khaleed_mohamed)
    {
        $projects = Project::all();
        // تم تغيير اسم المتغير ليتوافق مع اسم المودل
        return view('dashboard.khaleed_mohamed.edit', ['transaction' => $khaleed_mohamed, 'projects' => $projects]);
    }

    /**
     * تحديث حركة موجودة في قاعدة البيانات.
     */
    public function update(Request $request, KhaleedMohamedTransaction $khaleed_mohamed)
    {
        $validatedData = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'date' => 'required|date',
            'amount_shekel' => 'nullable|numeric|min:0',
            'amount_dollar' => 'nullable|numeric|min:0',
            'paid_by' => 'required|in:محمد,خالد',
            'paid_to' => 'required|string|max:255',
            'expense_details' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $khaleed_mohamed->update($validatedData);

        return redirect()->route('dashboard.khaleed-mohamed.index')
                         ->with('success', 'تم تعديل الحركة بنجاح.');
    }

    /**
     * نقل حركة إلى سلة المحذوفات (حذف ناعم).
     */
    public function destroy(KhaleedMohamedTransaction $khaleed_mohamed)
    {
        $khaleed_mohamed->delete();
        return redirect()->route('dashboard.khaleed-mohamed.index')
                         ->with('success', 'تم نقل الحركة إلى سلة المحذوفات.');
    }

    /**
     * عرض الحركات الموجودة في سلة المحذوفات.
     */
    public function trash()
    {
        $transactions = KhaleedMohamedTransaction::onlyTrashed()->with('project')->latest()->paginate(15);
        return view('dashboard.khaleed_mohamed.trash', compact('transactions'));
    }

    /**
     * استرجاع حركة من سلة المحذوفات.
     */
    public function restore($id)
    {
        $transaction = KhaleedMohamedTransaction::onlyTrashed()->findOrFail($id);
        $transaction->restore();
        return redirect()->route('dashboard.khaleed-mohamed.trash')
                         ->with('success', 'تم استرجاع الحركة بنجاح.');
    }

    /**
     * حذف حركة بشكل نهائي من قاعدة البيانات.
     */
    public function forceDelete($id)
    {
        $transaction = KhaleedMohamedTransaction::onlyTrashed()->findOrFail($id);
        $transaction->forceDelete();
        return redirect()->route('dashboard.khaleed-mohamed.trash')
                         ->with('success', 'تم حذف الحركة نهائياً.');
    }
}
