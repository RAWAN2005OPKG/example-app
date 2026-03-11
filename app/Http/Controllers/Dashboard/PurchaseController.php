<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PurchaseController extends Controller
{
    /**
     * عرض قائمة بكل فواتير الشراء.
     */
    public function index()
    {
        $purchases = Purchase::with('supplier')->latest()->paginate(15);
        return view('dashboard.purchases.index', compact('purchases'));
    }

    /**
     * عرض نموذج إضافة فاتورة شراء جديدة.
     */
    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        return view('dashboard.purchases.create', compact('suppliers', 'products'));
    }

    /**
     * تخزين فاتورة الشراء الجديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'invoice_number' => 'required|string|unique:purchases,invoice_number',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:invoice_date',
            'total_amount' => 'required|numeric|min:0.01',
            'paid_amount' => 'required|numeric|min:0|lte:total_amount', // المبلغ المدفوع يجب أن يكون أقل من أو يساوي الإجمالي
            'payment_method' => ['required', Rule::in(['cash', 'bank'])],
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ], [
            'supplier_id.required' => 'يجب اختيار المورد.',
            'invoice_number.unique' => 'رقم الفاتورة هذا مستخدم من قبل.',
            'paid_amount.lte' => 'المبلغ المدفوع لا يمكن أن يكون أكبر من الإجمالي.',
            'items.required' => 'يجب إضافة صنف واحد على الأقل للفاتورة.',
        ]);

        try {
            $purchase = DB::transaction(function () use ($validated) {
                // تحديد حالة الفاتورة (مدفوعة، غير مدفوعة، ...)
                $status = 'unpaid';
                if ($validated['paid_amount'] == $validated['total_amount']) {
                    $status = 'paid';
                } elseif ($validated['paid_amount'] > 0 && $validated['paid_amount'] < $validated['total_amount']) {
                    $status = 'partially_paid';
                }

                // 1. إنشاء سجل الفاتورة الرئيسي
                $purchase = Purchase::create([
                    'supplier_id' => $validated['supplier_id'],
                    'invoice_number' => $validated['invoice_number'],
                    'invoice_date' => $validated['invoice_date'],
                    'due_date' => $validated['due_date'],
                    'total_amount' => $validated['total_amount'],
                    'paid_amount' => $validated['paid_amount'],
                    'payment_method' => $validated['payment_method'],
                    'status' => $status,
                ]);

                // 2. إضافة الأصناف و (اختياري) تحديث المخزون
                foreach ($validated['items'] as $item) {
                    $purchase->items()->create([
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['unit_price'],
                        'total' => $item['quantity'] * $item['unit_price'],
                    ]);

                    // (اختياري ومهم) تحديث المخزون: زيادة كمية المنتج
                    // Product::find($item['product_id'])->increment('stock', $item['quantity']);
                }

                return $purchase;
            });

            return redirect()->route('dashboard.purchases.index')
                             ->with('success', "تم حفظ فاتورة الشراء رقم #{$purchase->invoice_number} بنجاح.");

        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى.')->withInput();
        }
    }

    /**
     * عرض تفاصيل فاتورة شراء معينة.
     */
    public function show(Purchase $purchase)
    {
        $purchase->load('supplier', 'items.product');
        return view('dashboard.purchases.show', compact('purchase'));
    }

    /**
     * حذف فاتورة شراء.
     */
    public function destroy(Purchase $purchase)
    {
        // يمكنك إضافة منطق هنا لمنع الحذف في حالات معينة
        // أو لإعادة الكميات للمخزون قبل الحذف
        $purchase->delete();

        return redirect()->route('dashboard.purchases.index')
                         ->with('success', 'تم حذف فاتورة الشراء بنجاح.');
    }
}
