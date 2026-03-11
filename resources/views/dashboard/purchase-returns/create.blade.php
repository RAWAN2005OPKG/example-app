@extends('layouts.container')
@section('title', 'إضافة مرجوع مشتريات')

@push('styles')
<style>
    /* تحسينات عامة على التصميم */
    body {
        background-color: #f4f6f9;
        font-family: 'Cairo', sans-serif; /* استخدام خط أفضل للغة العربية */
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .card-custom:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .card-header {
        background-color: #ffffff;
        border-bottom: 1px solid #e9ecef;
        padding: 1.25rem 1.5rem;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-title {
        font-weight: 700;
        color: #343a40;
        font-size: 1.5rem;
    }

    .card-body {
        padding: 2rem;
    }

    .form-group label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .select2-container .select2-selection--single {
        height: calc(1.5em + 1.5rem + 2px) !important;
        padding: 0.75rem 1rem;
        border-radius: 8px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.5;
        padding-left: 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        right: 0.5rem;
    }

    h4 {
        color: #007bff;
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: 10px;
        margin-top: 2.5rem !important;
        margin-bottom: 1.5rem !important;
        font-weight: 600;
    }

    #addReturnItemBtn {
        border-radius: 20px;
        padding: 8px 20px;
        font-weight: 600;
    }

    .item-row {
        background-color: #fafafa;
        padding: 1rem;
        border-radius: 8px;
        border: 1px solid #eee;
        margin-bottom: 1rem !important; /* لضمان التباعد */
        align-items: flex-end; /* لمحاذاة زر الحذف */
    }

    .item-row:last-child {
        margin-bottom: 0 !important;
    }

    .item-total {
        background-color: #e9ecef;
        font-weight: bold;
        text-align: center;
    }

    #grandTotal {
        background-color: #28a745;
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    .remove-item {
        width: 100%;
        height: calc(1.5em + 1.5rem + 2px);
    }

    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #e9ecef;
        padding: 1rem 1.5rem;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    .btn {
        border-radius: 8px;
        padding: 0.65rem 1.5rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">إضافة مرجوع مشتريات</h3>
    </div>
    <form action="{{ route('dashboard.purchase-returns.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                {{-- حقل اختيار المورد --}}
                <div class="col-md-6 form-group">
                    <label>اسم المورد</label>
                    <select name="supplier_id" class="form-control select2" required>
                        <option value="">اختر مورد</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>تاريخ الإرجاع</label>
                    <input type="date" name="return_date" class="form-control" required>
                </div>
            </div>

            <h4 class="mt-5 mb-3">المنتجات المرتجعة</h4>
            <div id="return-items-container">
                {{-- الصنف الأول --}}
                <div class="row item-row">
                    <div class="col-md-4 form-group">
                        <label>اختر منتج</label>
                        <select name="items[0][product_id]" class="form-control product-select select2" required>
                            <option value="">اختر منتج</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-name="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>الكمية</label>
                        <input type="number" name="items[0][quantity]" class="form-control item-quantity" value="1" min="1">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>سعر الوحدة</label>
                        <input type="number" name="items[0][unit_price]" class="form-control item-price" step="0.01">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>الإجمالي</label>
                        <input type="text" class="form-control item-total" readonly>
                    </div>
                </div>
            </div>
            <button type="button" id="addReturnItemBtn" class="btn btn-light-primary mt-3"><i class="fas fa-plus"></i> إضافة منتج آخر</button>

            <h4 class="mt-5 mb-3">ملخص الدفع</h4>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>الإجمالي الكلي للمرجوع</label>
                    <input type="text" id="grandTotal" name="total_amount" class="form-control" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>طريقة استرداد المبلغ</label>
                    <select name="payment_method" class="form-control">
                        <option value="cash">نقداً</option>
                        <option value="bank">تحويل بنكي</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">حفظ المرجوع</button>
            <a href="{{ route('dashboard.purchase-returns.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // تهيئة Select2
    function initSelect2(element) {
        element.select2({
            placeholder: "اختر...",
            allowClear: true,
            dir: "rtl" // دعم الاتجاه من اليمين لليسار
        });
    }

    initSelect2($('.select2'));

    let itemIndex = 1;

    // دالة لحساب الإجمالي الفرعي
    function calculateTotal(row) {
        const quantity = parseFloat(row.find('.item-quantity').val()) || 0;
        const price = parseFloat(row.find('.item-price').val()) || 0;
        const total = (quantity * price).toFixed(2);
        row.find('.item-total').val(total);
        calculateGrandTotal();
    }

    // دالة لحساب الإجمالي الكلي
    function calculateGrandTotal() {
        let grandTotal = 0;
        $('.item-total').each(function() {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        $('#grandTotal').val(grandTotal.toFixed(2));
    }

    // إضافة بند جديد
    $('#addReturnItemBtn').on('click', function() {
        const newRowHtml = `
            <div class="row item-row mt-3">
                <div class="col-md-4 form-group">
                    <select name="items[${itemIndex}][product_id]" class="form-control product-select select2" required>
                        <option value="">اختر منتج</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-name="{{ $product->name }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-quantity" value="1" min="1" placeholder="الكمية">
                </div>
                <div class="col-md-3 form-group">
                    <input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" step="0.01" placeholder="سعر الوحدة">
                </div>
                <div class="col-md-2 form-group">
                    <input type="text" class="form-control item-total" readonly placeholder="الإجمالي">
                </div>
                <div class="col-md-1 form-group">
                    <button type="button" class="btn btn-danger remove-item"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `;
        const newRow = $(newRowHtml);
        $('#return-items-container').append(newRow);

        // إعادة تهيئة Select2 للعنصر الجديد
        initSelect2(newRow.find('.select2'));

        itemIndex++;
    });

    // إزالة بند
    $('#return-items-container').on('click', '.remove-item', function() {
        $(this).closest('.item-row').fadeOut(300, function() {
            $(this).remove();
            calculateGrandTotal();
        });
    });

    // حساب الإجمالي عند تغيير الكمية أو السعر
    $('#return-items-container').on('input', '.item-quantity, .item-price', function() {
        calculateTotal($(this).closest('.item-row'));
    });

    // حساب الإجمالي عند تحميل الصفحة لأول مرة
    $('.item-row').each(function() {
        calculateTotal($(this));
    });
});
</script>
@endsection
