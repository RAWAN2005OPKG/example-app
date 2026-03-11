<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class QuotationController extends Controller
{
    /**
     * عرض جميع عروض الأسعار
     */
    public function index(Request $request)
    {
        $query = Quotation::with('customer')->latest();
        if ($search = $request->input('search')) {
            $query->where('number', 'like', "%{$search}%")
                  ->orWhereHas('customer', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }
        $quotations = $query->paginate(15);
        return view('dashboard.quotations.index', compact('quotations'));
    }

    /**
     * عرض صفحة إنشاء عرض سعر
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('dashboard.quotations.create', compact('customers', 'products'));
    }

    /**
     * تخزين عرض سعر جديد
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:issue_date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = array_reduce($request->items, fn($sum, $item) => $sum + ($item['quantity'] * $item['price']), 0);
            $quotation = Quotation::create([
                'number' => 'QUO-' . time(),
                'customer_id' => $request->customer_id,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'total_amount' => $totalAmount,
                'status' => 'draft',
            ]);
            foreach ($request->items as $item) {
                $quotation->items()->create($item);
            }
            DB::commit();
            return redirect()->route('dashboard.quotations.index')->with('success', 'تم إنشاء عرض السعر بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * عرض تفاصيل عرض سعر
     */
    public function show(Quotation $quotation)
    {
        $quotation->load('customer', 'items.product');
        return view('dashboard.quotations.show', compact('quotation'));
    }

    /**
     * عرض صفحة تعديل عرض سعر
     */
    public function edit(Quotation $quotation)
    {
        $customers = Customer::all();
        $products = Product::all();
        $quotation->load('items');
        return view('dashboard.quotations.edit', compact('quotation', 'customers', 'products'));
    }

    /**
     * تحديث عرض سعر
     */
    public function update(Request $request, Quotation $quotation)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:issue_date',
            'items' => 'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = array_reduce($request->items, fn($sum, $item) => $sum + ($item['quantity'] * $item['price']), 0);
            $quotation->update([
                'customer_id' => $request->customer_id,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'total_amount' => $totalAmount,
                'status' => $request->status ?? $quotation->status,
            ]);
            $quotation->items()->delete();
            foreach ($request->items as $item) {
                $quotation->items()->create($item);
            }
            DB::commit();
            return redirect()->route('dashboard.quotations.index')->with('success', 'تم تحديث عرض السعر بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * حذف عرض سعر
     */
    public function destroy(Quotation $quotation)
    {
        if ($quotation->status === 'invoiced') {
            return back()->with('error', 'لا يمكن حذف عرض سعر تم تحويله إلى فاتورة.');
        }
        $quotation->delete();
        return redirect()->route('dashboard.quotations.index')->with('success', 'تم حذف عرض السعر بنجاح.');
    }

    /**
     * تحويل عرض السعر إلى فاتورة مبيعات
     */
    public function convertToInvoice(Quotation $quotation)
    {
        if ($quotation->status === 'invoiced') {
            return back()->with('error', 'تم تحويل عرض السعر هذا إلى فاتورة مسبقاً.');
        }

        DB::beginTransaction();
        try {
            $subtotal = $quotation->total_amount;
            $taxRate = 0.15;
            $taxValue = $subtotal * $taxRate;
            $totalAmount = $subtotal + $taxValue;

            $invoice = SaleInvoice::create([
                'number' => 'INV-' . time(),
                'customer_id' => $quotation->customer_id,
                'issue_date' => now(),
                'due_date' => now()->addDays(30),
                'subtotal' => $subtotal,
                'tax_value' => $taxValue,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'notes' => 'تم إنشاؤها من عرض السعر ' . $quotation->number,
            ]);

            foreach ($quotation->items as $item) {
                $invoice->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->quantity * $item->price,
                ]);
                Product::find($item->product_id)->decrement('stock', $item->quantity);
            }

            $quotation->update(['status' => 'invoiced']);
            DB::commit();
            return redirect()->route('dashboard.sales.show', $invoice->id)->with('success', 'تم تحويل عرض السعر إلى فاتورة بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء تحويل عرض السعر: ' . $e->getMessage());
        }
    }
}
