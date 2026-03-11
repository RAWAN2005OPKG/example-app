@extends('layouts.container')
@section('title', 'إضافة جرد جديد')
  @section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared-styles.css') }}">
@endsection

@section('content')
<main class="main-content" x-data="stocktakeManager()">
    <div class="page-header"><h1><i class="fas fa-plus"></i> إضافة جرد جديد</h1></div>
    <div class="form-container">
        <form action="{{ route('dashboard.stocktakes.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label>الرقم المرجعي</label>
                    <input type="text" name="reference_no" value="{{ $referenceNo }}" readonly>
                </div>
                <div class="form-group">
                    <label>المستودع</label>
                    <select name="warehouse_id" required>
                        @foreach($warehouses as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>التاريخ</label>
                    <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" required>
                </div>
            </div>

            <h4>الأصناف</h4>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead><tr><th>المنتج</th><th>الكمية بالنظام</th><th>الكمية الفعلية</th><th>الفرق</th><th></th></tr></thead>
                    <tbody>
                        <template x-for="(item, index) in items" :key="index">
                            <tr>
                                <td x-text="item.name"></td>
                                <td x-text="item.system_quantity"></td>
                                <td>
                                    <input type="hidden" :name="`items[${index}][product_id]`" :value="item.id">
                                    <input type="number" :name="`items[${index}][actual_quantity]`" x-model.number="item.actual_quantity" @input="item.difference = item.actual_quantity - item.system_quantity" required class="form-control-sm">
                                </td>
                                <td x-text="item.difference"></td>
                                <td><button type="button" @click="removeItem(index)" class="delete-btn"><i class="fas fa-times"></i></button></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <select id="product-select-stocktake" class="form-control">
                    <option value="">-- اختر صنف --</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <button type="button" @click="addItem()" class="btn btn-sm btn-secondary mt-2">إضافة صنف</button>
            </div>

            <div class="form-actions">
                <button type="submit" name="status" value="draft" class="btn btn-info">حفظ كمسودة</button>
            </div>
        </form>
    </div>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function stocktakeManager( ) {
        return {
            allProducts: @json($products->keyBy('id')),
            items: [],
            addItem() {
                const select = document.getElementById('product-select-stocktake');
                const selectedId = select.value;
                if (!selectedId || this.items.some(i => i.id == selectedId)) return;

                const productData = this.allProducts[selectedId];
                this.items.push({
                    id: productData.id,
                    name: productData.name,
                    system_quantity: productData.quantity,
                    actual_quantity: 0,
                    difference: -productData.quantity
                });
                select.value = '';
            },
            removeItem(index) {
                this.items.splice(index, 1);
            }
        }
    }
</script>
@endpush
@endsection
