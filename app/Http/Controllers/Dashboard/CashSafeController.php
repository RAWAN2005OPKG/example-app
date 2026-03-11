<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CashSafe;
use Illuminate\Http\Request;

class CashSafeController extends Controller
{
    public function index(Request $request)
    {
        $query = CashSafe::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $safes = $query->latest()->paginate(10);
        return view('dashboard.cash_safes.index', compact('safes'));
    }

    public function create()
    {
        return view('dashboard.cash_safes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cash_safes,name',
            'currency' => 'required|string|size:3',
            'balance' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->has('is_active');

        CashSafe::create($data);

        return redirect()->route('dashboard.cash-safes.index')->with('success', 'تم إنشاء الخزينة النقدية بنجاح.');
    }

    public function edit(CashSafe $cashSafe)
    {
        return view('dashboard.cash_safes.edit', compact('cashSafe'));
    }

    public function update(Request $request, CashSafe $cashSafe)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cash_safes,name,' . $cashSafe->id,
            'currency' => 'required|string|size:3',
            'balance' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->has('is_active');

        $cashSafe->update($data);

        return redirect()->route('dashboard.cash-safes.index')->with('success', 'تم تحديث الخزينة النقدية بنجاح.');
    }

    public function destroy(CashSafe $cashSafe)
    {
        // يمكنك إضافة شرط هنا لمنع حذف خزينة رصيدها لا يساوي صفر
        if ($cashSafe->balance > 0) {
            return redirect()->back()->with('error', 'لا يمكن حذف خزينة تحتوي على رصيد.');
        }
        $cashSafe->delete();
        return redirect()->route('dashboard.cash-safes.index')->with('success', 'تم نقل الخزينة إلى سلة المحذوفات.');
    }

    // --- سلة المحذوفات ---
    public function trash()
    {
        $safes = CashSafe::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.cash_safes.trash', compact('safes'));
    }

    public function restore($id)
    {
        CashSafe::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.cash-safes.trash')->with('success', 'تم استعادة الخزينة بنجاح.');
    }

    public function forceDelete($id)
    {
        CashSafe::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.cash-safes.trash')->with('success', 'تم حذف الخزينة نهائياً.');
    }
}
