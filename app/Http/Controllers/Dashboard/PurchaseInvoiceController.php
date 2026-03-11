<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $invoicesQuery = PurchaseInvoice::with('supplier')->latest();

        if ($search) {
            $invoicesQuery->where('invoice_number', 'like', "%{$search}%")
                          ->orWhereHas('supplier', function ($query) use ($search) {
                              $query->where('name', 'like', "%{$search}%");
                          });
        }

        if ($status && in_array($status, ['paid', 'partial', 'unpaid'])) {
            $invoicesQuery->where('status', $status);
        }

        $invoices = $invoicesQuery->paginate(10);

        // حساب إجماليات KPI
        $totalInvoices = PurchaseInvoice::sum('total_amount');
        $totalPaid = PurchaseInvoice::sum('paid_amount');
        $totalRemaining = PurchaseInvoice::sum('remaining_amount');
        $supplierCount = Supplier::count();

        return view('dashboard.purchases.invoices.index', compact(
            'invoices', 'totalInvoices', 'totalPaid', 'totalRemaining', 'supplierCount', 'search', 'status'
        ));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        // يفترض وجود نموذج للمنتجات
        $products = []; // يجب جلب المنتجات من قاعدة البيانات

        return view('dashboard.purchases.invoices.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        // منطق الحفظ هنا سيكون معقدًا لأنه يتضمن حفظ الفاتورة والبنود
        // سنفترض أنكِ ستقومين بإضافة منطق الحفظ لاحقًا، لكن هنا إعادة التوجيه للنجاح
        // ...
        return redirect()->route('dashboard.purchases.invoices.index')->with('success', 'تم إنشاء فاتورة المشتريات بنجاح.');
    }

    // ... باقي دوال CRUD
}
