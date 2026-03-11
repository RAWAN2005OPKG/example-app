@extends('layouts.container')
@section('title', 'إضافة قائمة أسعار جديدة')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content" x-data="{ type: 'percentage' }">
    <div class="page-header">
        <h1><i class="fas fa-plus"></i> إضافة قائمة أسعار جديدة</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('dashboard.pricelists.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">اسم القائمة</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="is_active">الحالة</label>
                    <select name="is_active">
                        <option value="1">نشطة</option>
                        <option value="0">غير نشطة</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>نوع التسعير</label>
                <div class="radio-group">
                    <label><input type="radio" name="type" value="percentage" x-model="type"> نسبة مئوية</input></label>
                    <label><input type="radio" name="type" value="fixed" x-model="type"> سعر جديد</input></label>
                </div>
            </div>

            {{-- قسم النسبة المئوية --}}
            <div class="form-group" x-show="type === 'percentage'">
                <label for="value">نسبة الزيادة/النقصان (%)</label>
                <input type="number" name="value" placeholder="مثال: 15 للزيادة، -10 للخصم" x-bind:disabled="type !== 'percentage'">
            </div>

            {{-- قسم السعر الثابت --}}
            <div x-show="type === 'fixed'" x-data="productsManager()">
                <h4>المنتجات</h4>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead><tr><th>المنتج</th><th>السعر الأصلي</th><th>السعر الجديد</th><th></th></tr></thead>
                        <tbody id="products-tbody">
                            <template x-for="(product, index) in selectedProducts" :key="index">
                                <tr>
                                    <td x-text="product.name"></td>
                                    <td x-text="product.original_price"></td>
                                    <td>
                                        <input type="hidden" :name="`products[${index}][id]`" :value="product.id">
                                        <input type="number" step="0.01" :name="`products[${index}][price]`" required class="form-control-sm">
                                    </td>
                                    <td><button type="button" @click="removeProduct(index)" class="delete-btn"><i class="fas fa-times"></i></button></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <select id="product-select" class="form-control">
                        <option value="">-- اختر منتج لإضافته --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->sale_price }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" @click="addProduct()" class="btn btn-sm btn-secondary mt-2">إضافة منتج</button>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">حفظ القائمة</button>
            </div>
        </form>
    </div>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function productsManager( ) {
        return {
            allProducts: @json($products->keyBy('id')),
            selectedProducts: [],
            addProduct() {
                const select = document.getElementById('product-select');
                const selectedId = select.value;
                if (!selectedId || this.selectedProducts.some(p => p.id == selectedId)) {
                    return; // لا تضف المنتج إذا لم يتم اختياره أو إذا كان مضافاً بالفعل
                }
                const productData = this.allProducts[selectedId];
                this.selectedProducts.push({
                    id: productData.id,
                    name: productData.name,
                    original_price: productData.sale_price
                });
                select.value = '';
            },
            removeProduct(index) {
                this.selectedProducts.splice(index, 1);
            }
        }
    }
</script>
@endpush
@endsection
