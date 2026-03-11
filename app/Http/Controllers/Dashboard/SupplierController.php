<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('dashboard.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Supplier::create($validatedData);

        return redirect()->route('dashboard.suppliers.index')->with('success', 'تم إضافة المورد بنجاح.');
    }

    public function edit(Supplier $supplier)
    {
        return view('dashboard.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $supplier->update($validatedData);

        return redirect()->route('dashboard.suppliers.index')->with('success', 'تم تحديث بيانات المورد بنجاح.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete(); // Soft Delete
        return redirect()->route('dashboard.suppliers.index')->with('success', 'تم نقل المورد إلى سلة المحذوفات.');
    }

    // دوال سلة المحذوفات
    public function trash()
    {
        $suppliers = Supplier::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.suppliers.trash', compact('suppliers'));
    }

    public function restore($id)
    {
        Supplier::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.suppliers.trash')->with('success', 'تم استعادة المورد بنجاح.');
    }

    public function forceDelete($id)
    {
        Supplier::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.suppliers.trash')->with('success', 'تم حذف المورد نهائياً.');
    }
}
