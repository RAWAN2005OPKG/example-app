<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SupplierPayment;
use App\Models\SupplierExpense;
use App\Models\Subcontractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierExpenseController extends Controller
{
    /**
     * عرض قائمة مصروفات الموردين.
     */
    public function index(Request $request)
    {
        $query = SupplierPayment::where('payable_type', Subcontractor::class)
                            ->with('payable')
                            ->latest('date');

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->whereHas('payable', fn($q) => $q->where('name', 'LIKE', "%{$searchTerm}%"));
        }

        $totalAmount = (clone $query)->sum('amount');
        $expenses = $query->paginate(20);

        return view('dashboard.supplier_expenses.index', compact('expenses', 'totalAmount'));
    }

    /**
     * عرض نموذج إضافة مصروف جديد لمورد.
     */
    public function create()
    {
        $subcontractors = Subcontractor::select('id', 'name', 'specialization')->get();
        return view('dashboard.supplier_expenses.create', compact('subcontractors'));
    }

    /**
     * تخزين مصروف جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'subcontractor_id' => 'required|exists:subcontractors,id',
            'source_of_funds' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $subcontractor = Subcontractor::findOrFail($validated['subcontractor_id']);

        SupplierPayment::create([
            'date' => $validated['date'],
            'amount' => $validated['amount'],
            'amount_ils' => $validated['amount'], // بما أنها بالشيكل دائماً حسب الواجهة
            'currency' => 'ILS',
            'payment_method' => 'cash', // افتراضي
            'payment_source' => 'خزينة', // افتراضي
            'payee' => $subcontractor->name,
            'payable_type' => Subcontractor::class,
            'payable_id' => $validated['subcontractor_id'],
            'source_of_funds' => $validated['source_of_funds'],
            'notes' => $validated['notes'],
            'paid_by' => Auth::user()->name,
        ]);

        return redirect()->route('dashboard.supplier_expenses.index')->with('success', 'تم تسجيل المصروف للمورد بنجاح.');
    }

    public function edit($id)
    {
        $expense = SupplierPayment::findOrFail($id);
        $subcontractors = Subcontractor::all();
        return view('dashboard.supplier_expenses.edit', compact('expense', 'subcontractors'));
    }

    public function update(Request $request, $id)
    {
        $expense = SupplierPayment::findOrFail($id);
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'subcontractor_id' => 'required|exists:subcontractors,id',
            'source_of_funds' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $subcontractor = Subcontractor::findOrFail($validated['subcontractor_id']);

        $expense->update([
            'date' => $validated['date'],
            'amount' => $validated['amount'],
            'amount_ils' => $validated['amount'],
            'payable_id' => $validated['subcontractor_id'],
            'payee' => $subcontractor->name,
            'source_of_funds' => $validated['source_of_funds'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('dashboard.supplier_expenses.index')->with('success', 'تم تحديث مصروف المورد بنجاح.');
    }

    public function destroy($id)
    {
        SupplierPayment::findOrFail($id)->delete();
        return back()->with('success', 'تم نقل المصروف إلى سلة المحذوفات.');
    }

    public function trash()
    {
        $expenses = SupplierPayment::onlyTrashed()->where('payable_type', Subcontractor::class)->paginate(20);
        return view('dashboard.supplier_expenses.trash', compact('expenses'));
    }

    public function restore($id)
    {
        SupplierPayment::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'تم استعادة المصروف بنجاح.');
    }

    public function forceDelete($id)
    {
        SupplierPayment::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'تم حذف المصروف نهائياً.');
    }
}
