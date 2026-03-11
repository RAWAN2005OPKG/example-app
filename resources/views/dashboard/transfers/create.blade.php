@extends('layouts.container')
@section('title', 'إضافة إذن مخزني جديد')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content" x-data="transferManager()">
    <div class="page-header">
        <h1><i class="fas fa-plus"></i> إضافة إذن مخزني جديد</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.transfers.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للقائمة</a>
        </div>
    </div>

    <div class="form-container">
        <form action="{{ route('dashboard.transfers.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="from_warehouse_id">من مستودع</label>
                    <select name="from_warehouse_id" required>
                        <option value="">-- اختر --</option>
                        @foreach($warehouses as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="to_warehouse_id">إلى مستودع</label>
                    <select name="to_warehouse_id" required>
                        <option value="">-- اختر --</option>
                        @foreach($warehouses as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">التاريخ</label>
                    <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" required>
                </div>
            </div>

            <h4>الأصناف</h4>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead><tr><th>المنتج</th><th>الكمية</th><th></th></tr></thead>
                    <tbody>
                        <template x-for="(item, index) in items" :key="index">
                            <tr>
                                <td x-text="item.name"></td>
                                <td>
                                    <input type="hidden" :name="`items[${index}][product_id]`" :value="item.id">
                                    <input type="number" :name="`items[${index}][quantity]`" x-model.number="item.quantity" required min="1" class="form-control-sm">
                                </td>
                                <td><button type="button" @click="removeItem(index)" class="delete-btn"><i class="fas fa-times"></i></button></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <select id="product-select-transfer" class="form-control">
                    <option value="">-- اختر صنف --</option>
                    @foreach($products as $id => $name)
                    <option value="{{ $id }}" data-name="{{ $name }}">{{ $name }}</option>
                    @endforeach
                </select>
                <button type="button" @click="addItem()" class="btn btn-sm btn-secondary mt-2">إضافة صنف</button>
            </div>

            <div class="form-actions">
                <button type="submit" name="status" value="pending" class="btn btn-info">حفظ كـ "قيد الانتظار"</button>
                <button type="submit" name="status" value="completed" class="btn btn-primary">حفظ كـ "مكتمل"</button>
            </div>
        </form>
    </div>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function transferManager( ) {
        return {
            items: [],
            addItem() {
                const select = document.getElementById('product-select-transfer');
                const selectedOption = select.options[select.selectedIndex];
                if (!selectedOption.value || this.items.some(i => i.id == selectedOption.value)) return;

                this.items.push({
                    id: selectedOption.value,
                    name: selectedOption.dataset.name,
                    quantity: 1,
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
