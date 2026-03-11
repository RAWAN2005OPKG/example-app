<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleInvoiceController extends Controller
{
    /**
     * عرض جميع فواتير المبيعات مع البحث
     */
    public function index(Request $request)
    {
        $query = SaleInvoice::with('customer')->latest();
        if ($search = $request->input('search')) {
            $query->where('number', 'like', "%{$search}%")
                  ->orWhereHas('customer', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }
        $invoices = $query->paginate(15);
        return view('dashboard.sales.index', compact('invoices'));
    }

    /**
     * عرض صفحة إنشاء فاتورة جديدة
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('dashboard.sales.create', compact('customers', 'products'));
    }

    /**
     * تخزين فاتورة جديدة في قاعدة البيانات وتحديث المخزون
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'discount_value' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $subtotal = array_reduce($request->items, fn($sum, $item) => $sum + ($item['quantity'] * $item['price']), 0);
            $taxRate = 0.15; // 15%
            $discount = $request->discount_value ?? 0;
            $taxValue = ($subtotal - $discount) * $taxRate;
            $totalAmount = ($subtotal - $discount) + $taxValue;

            $invoice = SaleInvoice::create([
                'number' => 'INV-' . time(), // الأفضل استخدام نظام ترقيم أكثر قوة
                'customer_id' => $request->customer_id,
                'issue_date' => $request->issue_date,
                'due_date' => $request->due_date,
                'subtotal' => $subtotal,
                'discount_value' => $discount,
                'tax_value' => $taxValue,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'notes' => $request->notes,
            ]);

            foreach ($request->items as $item) {
                $invoice->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['quantity'] * $item['price'],
                ]);
                // خصم الكمية من المخزون
                Product::find($item['product_id'])->decrement('stock', $item['quantity']);
            }

            DB::commit();
            return redirect()->route('dashboard.sales.index')->with('success', 'تم إنشاء الفاتورة بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء إنشاء الفاتورة: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * عرض تفاصيل فاتورة محددة
     */
    public function show(SaleInvoice $sale)
    {
        $sale->load('customer', 'items.product');
        return view('dashboard.sales.show', compact('sale'));
    }

    /**
     * عرض صفحة تعديل فاتورة (مع تحذير)
     */
    public function edit(SaleInvoice $sale)
    {
        if ($sale->status === 'paid') {
            return back()->with('error', 'لا يمكن تعديل فاتورة مدفوعة بالكامل.');
        }
        $customers = Customer::all();
        $products = Product::all();
        $sale->load('items');
        return view('dashboard.sales.edit', compact('sale', 'customers', 'products'));
    }

    /**
     * تحديث بيانات فاتورة (وظيفة معقدة)
     */
    public function update(Request $request, SaleInvoice $sale)
    {
        // منطق التحديث معقد ويتطلب عكس حركات المخزون القديمة وتطبيق الجديدة.
        // يفضل في الأنظمة الحقيقية إصدار إشعار دائن/مدين بدلاً من التعديل المباشر.
        return redirect()->route('dashboard.sales.index')->with('info', 'تم تحديث الفاتورة (هذه وظيفة تجريبية).');
    }

    /**
     * حذف فاتورة (مع عكس حركة المخزون)
     */
    public function destroy(SaleInvoice $sale)
    {
        if ($sale->paid_amount > 0) {
            return back()->with('error', 'لا يمكن حذف فاتورة تم استلام دفعات عليها.');
        }

        DB::beginTransaction();
        try {
            // إعادة كميات المنتجات إلى المخزون
            foreach ($sale->items as $item) {
                Product::find($item->product_id)->increment('stock', $item->quantity);
            }
            $sale->delete(); // الحذف سيشمل البنود بسبب علاقة onCascadeDelete
            DB::commit();
            return redirect()->route('dashboard.sales.index')->with('success', 'تم حذف الفاتورة وإعادة الكميات للمخزون.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }

    /**
     * عرض صفحة التحصيل وتسجيل الدفعات
     */
    public function collections(Request $request)
    {
        SaleInvoice::where('status', '!=', 'paid')->whereDate('due_date', '<', now())->update(['status' => 'overdue']);
        $query = SaleInvoice::with('customer')->whereIn('status', ['unpaid', 'partial', 'overdue'])->latest('due_date');
        if ($search = $request->input('search')) {
            $query->where(fn($q) => $q->where('number', 'like', "%{$search}%")->orWhereHas('customer', fn($subQ) => $subQ->where('name', 'like', "%{$search}%")));
        }
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }
        $invoices = $query->paginate(15);
        $statsQuery = SaleInvoice::whereIn('status', ['unpaid', 'partial', 'overdue']);
        $totalDue = (clone $statsQuery)->sum(DB::raw('total_amount - paid_amount'));
        $overdueCount = SaleInvoice::where('status', 'overdue')->count();
        $unpaidCount = SaleInvoice::whereIn('status', ['unpaid', 'partial'])->count();
        return view('dashboard.sales.collections', compact('invoices', 'totalDue', 'overdueCount', 'unpaidCount'));
    }

    /**
     * إضافة دفعة جديدة لفاتورة
     */
    public function addPayment(Request $request, SaleInvoice $sale)
    {
        $request->validate(['amount' => 'required|numeric|min:0.01', 'payment_date' => 'required|date']);
        $amount = floatval($request->amount);
        $remaining = floatval($sale->total_amount) - floatval($sale->paid_amount);
        if ($amount > round($remaining, 2) + 0.001) {
            return back()->with('error', 'المبلغ المدفوع أكبر من المبلغ المتبقي.');
        }
        DB::transaction(function () use ($sale, $amount) {
            $sale->increment('paid_amount', $amount);
            $sale->status = ($sale->paid_amount >= $sale->total_amount) ? 'paid' : 'partial';
            $sale->save();
        });
        return back()->with('success', 'تم تسجيل الدفعة بنجاح.');
    }
}
