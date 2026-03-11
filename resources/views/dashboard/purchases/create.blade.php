@extends('layouts.container')
@section('title', 'إضافة فاتورة شراء')

{{-- أضف هنا الـ CSS الخاص بالصفحة إذا أردت --}}

@section('content')
<div class="card card-custom">
    <div class="card-header"><h3 class="card-title">إضافة فاتورة شراء جديدة</h3></div>
    <form action="{{ route('dashboard.purchases.store') }}" method="POST">
        @csrf
        <div class="card-body">
            {{-- عرض أخطاء التحقق من الصحة --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                {{-- تم تحويل حقل المورد إلى قائمة منسدلة --}}
                <div class="col-md-6 form-group">
                    <label>اسم المورد</label>
                    <select name="supplier_id" class="form-control select2" required>
                        <option value="">اختر مورد</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group"><label>رقم الفاتورة</label><input type="text" name="invoice_number" class="form-control" value="{{ old('invoice_number') }}" required></div>
                <div class="col-md-6 form-group"><label>تاريخ الفاتورة</label><input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}" required></div>
                <div class="col-md-6 form-group"><label>تاريخ الاستحقاق</label><input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}"></div>
            </div>

            <h4 class="mt-5 mb-3">الأصناف</h4>
            <div id="items-container">
                {{-- الصنف الأول --}}
                <div class="row item-row mb-3">
                    <div class="col-md-4 form-group">
                        <label>المنتج</label>
                        <select name="items[0][product_id]" class="form-control product-select select2" required>
                            <option value="">اختر منتج</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group"><label>الكمية</label><input type="number" name="items[0][quantity]" class="form-control item-quantity" value="1" min="1"></div>
                    <div class="col-md-2 form-group"><label>سعر الوحدة</label><input type="number" name="items[0][unit_price]" class="form-control item-price" step="0.01" min="0"></div>
                    <div class="col-md-3 form-group"><label>الإجمالي</label><input type="text" class="form-control item-total" readonly></div>
                    <div class="col-md-1 form-group d-flex align-items-end"><button type="button" class="btn btn-danger btn-sm remove-item-btn" style="display: none;"><i class="fas fa-trash"></i></button></div>
                </div>
            </div>
            <button type="button" id="addItemBtn" class="btn btn-light-primary"><i class="fas fa-plus"></i> إضافة صنف</button>

            <h4 class="mt-5 mb-3">ملخص الدفع</h4>
            <div class="row">
                <div class="col-md-4 form-group"><label>الإجمالي الكلي</label><input type="text" id="grandTotal" name="total_amount" class="form-control" readonly></div>
                <div class="col-md-4 form-group"><label>المبلغ المدفوع</label><input type="number" name="paid_amount" id="paidAmount" class="form-control" step="0.01" value="0" min="0"></div>
                <div class="col-md-4 form-group"><label>طريقة الدفع</label><select name="payment_method" class="form-control"><option value="cash">نقداً</option><option value="bank">تحويل بنكي</option></select></div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">حفظ الفاتورة</button>
            <a href="{{ route('dashboard.purchases.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// ستحتاج إلى كود JavaScript مشابه لما استخدمناه في مرتجعات الشراء
// لإضافة وحذف الأصناف وحساب الإجماليات تلقائياً.
// يمكنك استخدام نفس الكود السابق مع تغيير أسماء الأزرار والحاويات.
</script>
@endpush
