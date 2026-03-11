<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * عرض قائمة المستودعات مع إمكانية البحث.
     */
    public function index(Request $request)
    {
        $query = Warehouse::query();

        // تطبيق البحث إذا كان موجوداً
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
        }

        $warehouses = $query->latest()->get();

        // إحصائيات
        $totalCount = Warehouse::count();
        $activeCount = Warehouse::where('is_active', true)->count();
        $inactiveCount = $totalCount - $activeCount;

        return view('dashboard.warehouses.index', compact('warehouses', 'totalCount', 'activeCount', 'inactiveCount'));
    }

    /**
     * تخزين مستودع جديد.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name',
            'location' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        Warehouse::create($request->all());
        return redirect()->route('dashboard.warehouses.index')->with('success', 'تمت إضافة المستودع بنجاح.');
    }

    /**
     * تحديث مستودع موجود.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name,' . $warehouse->id,
            'location' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $warehouse->update($request->all());
        return redirect()->route('dashboard.warehouses.index')->with('success', 'تم تحديث المستودع بنجاح.');
    }

    /**
     * نقل مستودع إلى سلة المحذوفات (Soft Delete).
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('dashboard.warehouses.index')->with('success', 'تم نقل المستودع إلى سلة المحذوفات.');
    }

    /**
     * عرض المستودعات في سلة المحذوفات.
     */
    public function trash()
    {
        $trashedWarehouses = Warehouse::onlyTrashed()->latest()->get();
        return view('dashboard.warehouses.trash', compact('trashedWarehouses'));
    }

    /**
     * استعادة مستودع من سلة المحذوفات.
     */
    public function restore($id)
    {
        Warehouse::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.warehouses.trash.index')->with('success', 'تم استعادة المستودع بنجاح.');
    }

    /**
     * حذف مستودع بشكل نهائي.
     */
    public function forceDelete($id)
    {
        Warehouse::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.warehouses.trash.index')->with('success', 'تم حذف المستودع نهائياً.');
    }
}
