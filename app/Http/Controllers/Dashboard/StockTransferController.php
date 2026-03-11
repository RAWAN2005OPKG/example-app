<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StockTransfer;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
{
    /**
     * عرض قائمة الأذون المخزنية مع البحث.
     */
    public function index(Request $request)
    {
        $query = StockTransfer::with(['fromWarehouse', 'toWarehouse']);

        if ($search = $request->input('search')) {
            $query->where('reference_no', 'like', "%{$search}%");
        }

        $transfers = $query->latest()->get();
        return view('dashboard.transfers.index', compact('transfers'));
    }

    /**
     * عرض فورم إنشاء إذن مخزني جديد.
     */
    public function create()
    {
        $warehouses = Warehouse::where('is_active', true)->pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        return view('dashboard.transfers.create', compact('warehouses', 'products'));
    }

    /**
     * تخزين إذن مخزني جديد.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from_warehouse_id' => 'required|exists:warehouses,id',
            'to_warehouse_id' => 'required|exists:warehouses,id|different:from_warehouse_id',
            'date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $latestId = StockTransfer::latest('id')->first()?->id ?? 0;
            $refNo = 'TR-' . date('Y') . '-' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);

            $transfer = StockTransfer::create($request->only('from_warehouse_id', 'to_warehouse_id', 'date', 'status') + ['reference_no' => $refNo]);

            foreach ($request->items as $itemData) {
                $transfer->items()->create($itemData);

                // إذا كان التحويل "مكتمل"، قم بتحديث كميات المنتجات
                // ملاحظة: هذا منطق مبسط. في نظام حقيقي، يجب تتبع الكمية لكل مستودع.
                if ($request->status === 'completed') {
                    $product = Product::find($itemData['product_id']);
                    // يمكنك إضافة منطق أكثر تعقيداً هنا للتعامل مع كميات المستودعات
                    // $product->decrement('quantity', $itemData['quantity']);
                }
            }
        });

        return redirect()->route('dashboard.transfers.index')->with('success', 'تم إنشاء إذن النقل بنجاح.');
    }

    /**
     * نقل الإذن المخزني إلى سلة المحذوفات.
     */
    public function destroy(StockTransfer $transfer)
    {
        $transfer->delete();
        return redirect()->route('dashboard.transfers.index')->with('success', 'تم نقل إذن النقل إلى سلة المحذوفات.');
    }

    /**
     * عرض سلة المحذوفات.
     */
    public function trash()
    {
        $trashed = StockTransfer::onlyTrashed()->with(['fromWarehouse', 'toWarehouse'])->latest()->get();
        return view('dashboard.transfers.trash', compact('trashed'));
    }

    /**
     * استعادة إذن مخزني من سلة المحذوفات.
     */
    public function restore($id)
    {
        StockTransfer::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.transfers.trash.index')->with('success', 'تمت استعادة إذن النقل بنجاح.');
    }

    /**
     * حذف إذن مخزني بشكل نهائي.
     */
    public function forceDelete($id)
    {
        StockTransfer::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.transfers.trash.index')->with('success', 'تم حذف إذن النقل نهائياً.');
    }
}
