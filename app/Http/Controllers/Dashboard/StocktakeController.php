<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Stocktake;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocktakeController extends Controller
{
    /**
     * عرض قائمة عمليات الجرد مع البحث.
     */
    public function index(Request $request)
    {
        $query = Stocktake::with('warehouse');

        if ($search = $request->input('search')) {
            $query->where('reference_no', 'like', "%{$search}%")
                  ->orWhereHas('warehouse', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }

        $stocktakes = $query->latest()->get();
        return view('dashboard.stocktakes.index', compact('stocktakes'));
    }

    /**
     * عرض فورم إنشاء جرد جديد.
     */
    public function create()
    {
        $warehouses = Warehouse::where('is_active', true)->pluck('name', 'id');
        $products = Product::select('id', 'name', 'quantity')->get();
        $latestId = Stocktake::latest('id')->first()?->id ?? 0;
        $referenceNo = 'JRD-' . date('Y') . '-' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);

        return view('dashboard.stocktakes.create', compact('warehouses', 'products', 'referenceNo'));
    }

    /**
     * تخزين جرد جديد.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference_no' => 'required|string|unique:stocktakes,reference_no',
            'warehouse_id' => 'required|exists:warehouses,id',
            'date' => 'required|date',
            'status' => 'required|in:draft,completed',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.actual_quantity' => 'required|integer|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $stocktake = Stocktake::create($request->only('reference_no', 'warehouse_id', 'date', 'status'));

            foreach ($request->items as $itemData) {
                $product = Product::find($itemData['product_id']);
                $difference = $itemData['actual_quantity'] - $product->quantity;

                $stocktake->items()->create([
                    'product_id' => $product->id,
                    'system_quantity' => $product->quantity,
                    'actual_quantity' => $itemData['actual_quantity'],
                    'difference' => $difference,
                ]);

                // إذا كان الجرد "مكتمل"، قم بتحديث كمية المنتج
                if ($request->status === 'completed') {
                    $product->update(['quantity' => $itemData['actual_quantity']]);
                }
            }
        });

        return redirect()->route('dashboard.stocktakes.index')->with('success', 'تم حفظ الجرد بنجاح.');
    }

    /**
     * نقل الجرد إلى سلة المحذوفات.
     */
    public function destroy(Stocktake $stocktake)
    {
        $stocktake->delete();
        return redirect()->route('dashboard.stocktakes.index')->with('success', 'تم نقل الجرد إلى سلة المحذوفات.');
    }

    /**
     * عرض سلة المحذوفات.
     */
    public function trash()
    {
        $trashed = Stocktake::onlyTrashed()->with('warehouse')->latest()->get();
        return view('dashboard.stocktakes.trash', compact('trashed'));
    }

    /**
     * استعادة جرد من سلة المحذوفات.
     */
    public function restore($id)
    {
        Stocktake::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.stocktakes.trash.index')->with('success', 'تمت استعادة الجرد بنجاح.');
    }

    /**
     * حذف جرد بشكل نهائي.
     */
    public function forceDelete($id)
    {
        $stocktake = Stocktake::onlyTrashed()->findOrFail($id);
        // لا يمكن حذف الجرد إذا كان مرتبطاً بأصناف، يجب حذف الأصناف أولاً
        // هذا محمي بواسطة on_delete('cascade') في الـ migration
        $stocktake->forceDelete();
        return redirect()->route('dashboard.stocktakes.trash.index')->with('success', 'تم حذف الجرد نهائياً.');
    }
}
