@extends('layouts.container')
@  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content" x-data="invoiceForm()">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i> إضافة فاتورة</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.sales.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> إلغاء</a>
            <button type="submit" form="invoiceForm" class="btn btn-primary"><i class="fas fa-save"></i> حفظ الفاتورة</button>
        </div>
    </div>

    <form id="invoiceForm" action="{{ route('dashboard.sales.store') }}" method="POST" class="table-container">
        @csrf
        <!-- Invoice Header -->
        <div class="invoice-form-grid">
            <div class="form-group">
                <label>العميل</label>
                <input type="text" class="form-control" placeholder="ابحث بالاسم أو رقم الهاتف...">
            </div>
            <div class="form-group">
                <label>تاريخ الإصدار</label>
                <input type="date" name="issue_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label>تاريخ الاستحقاق</label>
                <input type="date" name="due_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label>رقم الفاتورة</label>
                <input type="text" name="number" class="form-control" placeholder="تلقائي" readonly>
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="table-wrapper mt-4">
            <table class="table invoice-items-table">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th style="width: 10%;">الكمية</th>
                        <th style="width: 15%;">السعر</th>
                        <th style="width: 15%;">الإجمالي</th>
                        <th style="width: 5%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in items" :key="index">
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="اختر منتج أو خدمة...">
                            </td>
                            <td><input type="number" class="form-control" x-model.number="item.quantity" @input="calculateTotals()"></td>
                            <td><input type="number" class="form-control" x-model.number="item.price" @input="calculateTotals()"></td>
                            <td><input type="text" class="form-control" :value="formatCurrency(item.quantity * item.price)" readonly></td>
                            <td>
                                <button type="button" @click="removeItem(index)" class="delete-btn"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <button type="button" @click="addItem()" class="btn btn-outline-primary mt-3"><i class="fas fa-plus"></i> إضافة بند</button>

        <!-- Invoice Footer -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label>ملاحظات</label>
                    <textarea name="notes" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="invoice-summary">
                    <table class="table">
                        <tr>
                            <td class="summary-label">الإجمالي الفرعي</td>
                            <td class="summary-value" x-text="formatCurrency(summary.subtotal)"></td>
                        </tr>
                        <tr>
                            <td class="summary-label">خصم</td>
                            <td><input type="number" name="discount_value" x-model.number="summary.discount" @input="calculateTotals()" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="summary-label">ضريبة القيمة المضافة (15%)</td>
                            <td class="summary-value" x-text="formatCurrency(summary.tax)"></td>
                        </tr>
                        <tr style="font-size: 1.2rem; background: #f5f8fa;">
                            <td class="summary-label">الإجمالي النهائي</td>
                            <td class="summary-value" x-text="formatCurrency(summary.grandTotal)"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function invoiceForm( ) {
        return {
            items: [{ product_id: null, quantity: 1, price: 0 }],
            summary: { subtotal: 0, discount: 0, tax: 0, grandTotal: 0 },
            taxRate: 0.15,
            addItem() { this.items.push({ product_id: null, quantity: 1, price: 0 }); },
            removeItem(index) { this.items.splice(index, 1); this.calculateTotals(); },
            calculateTotals() {
                this.summary.subtotal = this.items.reduce((acc, item) => acc + (item.quantity * item.price), 0);
                this.summary.tax = (this.summary.subtotal - this.summary.discount) * this.taxRate;
                this.summary.grandTotal = (this.summary.subtotal - this.summary.discount) + this.summary.tax;
            },
            formatCurrency(value) { return new Intl.NumberFormat('ar-SA', { style: 'currency', currency: 'SAR' }).format(value || 0); }
        }
    }
</script>
@endpush
@endsection
