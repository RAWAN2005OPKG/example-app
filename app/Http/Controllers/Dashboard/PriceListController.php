<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PriceListController extends Controller
{
    /**
     * عرض قائمة قوائم الأسعار مع البحث.
     */
    public function index(Request $request)
    {
        $query = PriceList::withCount('products');

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $priceLists = $query->latest()->get();
        return view('dashboard.pricelists.index', compact('priceLists'));
    }

    /**
     * عرض فورم إنشاء قائمة أسعار جديدة.
     */
    public function create()
    {
        $products = Product::select('id', 'name', 'sale_price')->get();
        return view('dashboard.pricelists.create', compact('products'));
    }

    /**
     * تخزين قائمة أسعار جديدة.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:price_lists,name',
            'type' => 'required|in:percentage,fixed',
            'value' => 'nullable|required_if:type,percentage|numeric',
            'is_active' => 'required|boolean',
            'products' => 'nullable|required_if:type,fixed|array',
            'products.*.id' => 'required_with:products|exists:products,id',
            'products.*.price' => 'required_with:products|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $priceList = PriceList::create($request->only('name', 'type', 'value', 'is_active'));

            if ($request->type == 'fixed' && $request->has('products')) {
                foreach ($request->products as $productData) {
                    $priceList->products()->attach($productData['id'], ['fixed_price' => $productData['price']]);
                }
            }
        });

        return redirect()->route('dashboard.pricelists.index')->with('success', 'تم إنشاء قائمة الأسعار بنجاح.');
    }

    /**
     * عرض فورم تعديل قائمة الأسعار.
     */
    public function edit(PriceList $pricelist)
    {
        $products = Product::select('id', 'name', 'sale_price')->get();
        $pricelist->load('products'); // تحميل المنتجات المرتبطة بالقائمة
        return view('dashboard.pricelists.edit', compact('pricelist', 'products'));
    }

    /**
     * تحديث قائمة أسعار موجودة.
     */
    public function update(Request $request, PriceList $pricelist)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('price_lists')->ignore($pricelist->id)],
            'type' => 'required|in:percentage,fixed',
            'value' => 'nullable|required_if:type,percentage|numeric',
            'is_active' => 'required|boolean',
            'products' => 'nullable|required_if:type,fixed|array',
        ]);

        DB::transaction(function () use ($request, $pricelist) {
            $pricelist->update($request->only('name', 'type', 'value', 'is_active'));

            // مزامنة المنتجات للنوع الثابت
            if ($request->type == 'fixed') {
                $syncData = [];
                if ($request->has('products')) {
                    foreach ($request->products as $productData) {
                        $syncData[$productData['id']] = ['fixed_price' => $productData['price']];
                    }
                }
                $pricelist->products()->sync($syncData);
            } else {
                // إذا تم التغيير إلى نسبة مئوية، قم بإزالة المنتجات المرتبطة
                $pricelist->products()->detach();
            }
        });

        return redirect()->route('dashboard.pricelists.index')->with('success', 'تم تحديث قائمة الأسعار بنجاح.');
    }

    /**
     * نقل قائمة الأسعار إلى سلة المحذوفات.
     */
    public function destroy(PriceList $pricelist)
    {
        $pricelist->delete();
        return redirect()->route('dashboard.pricelists.index')->with('success', 'تم نقل القائمة إلى سلة المحذوفات.');
    }

    /**
     * عرض سلة المحذوفات.
     */
    public function trash()
    {
        $trashed = PriceList::onlyTrashed()->latest()->get();
        return view('dashboard.pricelists.trash', compact('trashed'));
    }

    /**
     * استعادة قائمة من سلة المحذوفات.
     */
    public function restore($id)
    {
        PriceList::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.pricelists.trash.index')->with('success', 'تمت استعادة القائمة بنجاح.');
    }

    /**
     * حذف قائمة بشكل نهائي.
     */
    public function forceDelete($id)
    {
        PriceList::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.pricelists.trash.index')->with('success', 'تم حذف القائمة نهائياً.');
    }
}
