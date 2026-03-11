<?php

// المسار: app/Http/Controllers/Dashboard/PurchaseReturnController.php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PurchaseReturn;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ضروري لعمليات الحفظ الآمنة (Transactions)
use Illuminate\Validation\Rule;

class PurchaseReturnController extends Controller
{
    /**
     * الدالة 1: عرض قائمة بكل مرتجعات المشتريات (صفحة Index).
     */
    public function index()
    {
        // جلب البيانات مع علاقة المورد لتحسين الأداء (Eager Loading)
        $purchaseReturns = PurchaseReturn::with('supplier')
            ->latest() // ترتيبها من الأحدث للأقدم
            ->paginate(15); // تقسيم النتائج لصفحات

        // عرض الواجهة وإرسال البيانات لها
        return view('dashboard.purchase-returns.index', compact('purchaseReturns'));
    }

    /**
     * الدالة 2: عرض نموذج إضافة مرجوع مشتريات جديد (صفحة Create).
     */
    public function create()
    {
        // جلب الموردين والمنتجات لعرضهم في القوائم المنسدلة بالنموذج
        $suppliers = Supplier::orderBy('name')->get();
        // تم تعديل هذا السطر ليجلب كل المنتجات دون التحقق من المخزون
        $products = Product::orderBy('name')->get();

        return view('dashboard.purchase-returns.create', compact('suppliers', 'products'));
    }

    /**
     * الدالة 3: تخزين مرجوع المشتريات الجديد في قاعدة البيانات (عند الحفظ).
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات القادمة من النموذج
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'return_date' => 'required|date|before_or_equal:today',
            'total_amount' => 'required|numeric|min:0.01',
            'payment_method' => ['required', Rule::in(['cash', 'bank'])],
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ], [
            // رسائل خطأ مخصصة باللغة العربية لتحسين تجربة المستخدم
            'supplier_id.required' => 'يجب اختيار المورد.',
            'return_date.required' => 'حقل تاريخ الإرجاع مطلوب.',
            'total_amount.min' => 'يجب أن يكون الإجمالي أكبر من صفر.',
            'items.required' => 'يجب إضافة منتج واحد على الأقل في الفاتورة.',
        ]);

        try {
            // استخدام Transaction لضمان حفظ كل البيانات معًا (إما تنجح كلها أو تفشل كلها)
            $purchaseReturn = DB::transaction(function () use ($validated) {
                // 1. إنشاء سجل المرجوع الرئيسي
                $return = PurchaseReturn::create([
                    'supplier_id' => $validated['supplier_id'],
                    'return_date' => $validated['return_date'],
                    'total_amount' => $validated['total_amount'],
                    'payment_method' => $validated['payment_method'],
                ]);

                // 2. إضافة المنتجات كبنود مرتبطة بالمرجوع
                foreach ($validated['items'] as $item) {
                    $return->items()->create([
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['unit_price'],
                        'total' => $item['quantity'] * $item['unit_price'],
                    ]);
                }

                return $return;
            });

            // 3. إعادة التوجيه لصفحة القائمة مع رسالة نجاح
            return redirect()->route('dashboard.purchase-returns.index')
                             ->with('success', "تم إنشاء مرجوع المشتريات رقم #{$purchaseReturn->id} بنجاح.");

        } catch (\Exception $e) {
            // في حال حدوث أي خطأ، يتم إرجاع المستخدم للنموذج مع رسالة خطأ
            // يمكنك استخدام dd($e->getMessage()) هنا لمعرفة سبب الخطأ بالتحديد أثناء التطوير
            return back()->with('error', 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى.')
                         ->withInput(); // مع الاحتفاظ بالبيانات التي أدخلها
        }
    }

    /**
     * الدالة 4: عرض تفاصيل مرجوع معين (صفحة Show).
     */
    public function show(PurchaseReturn $purchaseReturn)
    {
        // تحميل كل العلاقات اللازمة (المورد، البنود، والمنتجات داخل البنود)
        $purchaseReturn->load('supplier', 'items.product');

        return view('dashboard.purchase-returns.show', compact('purchaseReturn'));
    }

    /**
     * الدالة 5: حذف مرجوع مشتريات من قاعدة البيانات.
     */
    public function destroy(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->delete();

        return redirect()->route('dashboard.purchase-returns.index')
                         ->with('success', 'تم حذف مرجوع المشتريات بنجاح.');
    }


}
