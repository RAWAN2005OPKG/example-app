<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SaleReturn;
use App\Models\SaleReturnItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = SaleReturn::with('customer')->latest();
        if ($search = $request->input('search')) {
            $query->where('number', 'like', "%{$search}%")
                  ->orWhereHas('customer', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }
        $returns = $query->paginate(15);
        return view('dashboard.sales-returns.index', compact('returns'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('dashboard.sales-returns.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'return_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = array_reduce($request->items, fn($sum, $item) => $sum + ($item['quantity'] * $item['price']), 0);

            $return = SaleReturn::create([
                'number' => 'RTN-' . time(),
                'customer_id' => $request->customer_id,
                'return_date' => $request->return_date,
                'total_amount' => $totalAmount,
                'sale_invoice_id' => $request->sale_invoice_id,
            ]);

            foreach ($request->items as $item) {
                $return->items()->create($item);
                Product::find($item['product_id'])->increment('stock', $item['quantity']);
            }

            // يمكنك هنا إنشاء قيد محاسبي أو تحديث رصيد العميل
            // Customer::find($request->customer_id)->decrement('balance', $totalAmount);

            DB::commit();
            return redirect()->route('dashboard.sales-returns.index')->with('success', 'تم تسجيل مردود المبيعات بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function show(SaleReturn $sales_return) // اسم المتغير يجب أن يكون متطابقاً
    {
        $sales_return->load('customer', 'items.product');
        return view('dashboard.sales-returns.show', compact('sales_return'));
    }

    public function destroy(SaleReturn $sales_return)
    {
        // لا يمكن حذف مردود مبيعات بسهولة لأنه يؤثر على الحسابات والمخزون
        // يجب عكس كل العمليات التي قام بها
        DB::beginTransaction();
        try {
            // عكس حركة المخزون
            foreach ($sales_return->items as $item) {
                Product::find($item->product_id)->decrement('stock', $item->quantity);
            }
            $sales_return->delete();
            DB::commit();
            return redirect()->route('dashboard.sales-returns.index')->with('success', 'تم حذف المردود وعكس حركة المخزون.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }
}
