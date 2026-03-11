@extends('layouts.container')
@section('title', 'إضافة فاتورة شراء')
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">إضافة فاتورة شراء جديدة</h3>
    </div>
    {{-- لقد قمت بتصحيح مسار الحفظ ليكون لفواتير الشراء بدلاً من المنتجات --}}
    <form action="{{ route('dashboard.purchases.store') }}" method="POST">
        @csrf
        <div class="card-body">
            {{-- معلومات الفاتورة الأساسية --}}
            <div class="row">
                <div class="form-group col-md-6">
                    <label>اسم المورد <span class="text-danger">*</span></label>
                    <select name="supplier_id" class="form-control select2" required>
                        <option value="" disabled selected>اختر مورد</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>رقم الفاتورة</label>
                    <input type="text" name="invoice_number" class="form-control" placeholder="اختياري">
                </div>
                <div class="form-group col-md-6">
                    <label>تاريخ الفاتورة <span class="text-danger">*</span></label>
                    <input type="date" name="invoice_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>تاريخ الاستحقاق</label>
                    <input type="date" name="due_date" class="form-control">
                </div>
            </div>

            <div class="separator separator-dashed my-8"></div>

            {{-- الأصناف --}}
            <h4 class="mb-5">الأصناف</h4>
            <div id="items-container">
                {{-- الصف الأول من الأصناف (يتم إنشاؤه مبدئياً) --}}
                <div class="row item-row align-items-center">
                    <div class="form-group col-md-4">
                        <label>المنتج <span class="text-danger">*</span></label>
                        <select name="items[0][product_id]" class="form-control product-select select2" required>
                            <option value="" disabled selected>اختر منتج</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->purchase_price ?? 0 }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>الكمية <span class="text-danger">*</span></label>
                        <input type="number" name="items[0][quantity]" class="form-control item-quantity" value="1" min="1" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>سعر الشراء <span class="text-danger">*</span></label>
                        <input type="number" name="items[0][unit_price]" class="form-control item-price" step="0.01" min="0" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>الإجمالي</label>
                        <input type="text" class="form-control item-total" readonly>
                    </div>
                    <div class="col-md-1">
                        {{-- زر الحذف لا يظهر في أول صف --}}
                    </div>
                </div>
            </div>
            <button type="button" id="addItemBtn" class="btn btn-light-primary btn-sm mt-3"><i class="fas fa-plus"></i> إضافة بند جديد</button>

            <div class="separator separator-dashed my-8"></div>

            {{-- معلومات الدفع --}}
            <h4 class="mb-5">الدفع</h4>
            <div class="row">
                <div class="form-group col-lg-3 col-md-6">
                    <label>الإجمالي الكلي</label>
                    <input type="text" id="grandTotal" name="total_amount" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label>المبلغ المدفوع</label>
                    <input type="number" id="paid_amount" name="paid_amount" class="form-control" step="0.01" value="0" min="0">
                </div>
                 <div class="form-group col-lg-3 col-md-6">
                    <label>المبلغ المتبقي</label>
                    <input type="text" id="due_amount" name="due_amount" class="form-control" readonly>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label>طريقة الدفع</label>
                    <select name="payment_method" class="form-control">
                        <option value="cash">نقداً</option>
                        <option value="bank">تحويل بنكي</option>
                        <option value="credit">آجل</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success mr-2">حفظ الفاتورة</button>
            {{-- لقد قمت بتصحيح مسار الإلغاء ليعود إلى قائمة المشتريات --}}
            <a href="{{ route('dashboard.purchases.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // تهيئة كل عناصر Select2 في الصفحة
    $('.select2').select2({
        placeholder: "اختر...",
        // allowClear: true // يمكن إزالتها إذا كان الحقل مطلوباً
    });

    let itemIndex = 1;

    // --- دوال الحساب ---
    function calculateRowTotal(row) {
        const quantity = parseFloat(row.find('.item-quantity').val()) || 0;
        const price = parseFloat(row.find('.item-price').val()) || 0;
        const total = quantity * price;
        row.find('.item-total').val(total.toFixed(2));
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        $('.item-total').each(function() {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        $('#grandTotal').val(grandTotal.toFixed(2));
        calculateDueAmount();
    }

    function calculateDueAmount() {
        const grandTotal = parseFloat($('#grandTotal').val()) || 0;
        const paidAmount = parseFloat($('#paid_amount').val()) || 0;
        const due = grandTotal - paidAmount;
        $('#due_amount').val(due.toFixed(2));
    }

    // --- الأحداث (Events) ---

    // جلب سعر المنتج عند اختياره
    $('#items-container').on('change', '.product-select', function() {
        const selectedOption = $(this).find('option:selected');
        const price = selectedOption.data('price') || 0;
        const row = $(this).closest('.item-row');
        row.find('.item-price').val(price);
        calculateRowTotal(row);
    });

    // حساب الإجمالي عند تغيير الكمية أو السعر
    $('#items-container').on('input', '.item-quantity, .item-price', function() {
        const row = $(this).closest('.item-row');
        calculateRowTotal(row);
    });

    // حساب المتبقي عند تغيير المبلغ المدفوع
    $('#paid_amount').on('input', function() {
        calculateDueAmount();
    });

    // إضافة بند جديد
    $('#addItemBtn').on('click', function() {
        // استنساخ محتوى select الأصلي لتجنب مشاكل Blade
        const productOptions = $('.product-select:first').html();

        const newRowHtml = `
            <div class="row item-row align-items-center mt-3">
                <div class="form-group col-md-4">
                    <select name="items[${itemIndex}][product_id]" class="form-control product-select select2" required>
                        ${productOptions}
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-quantity" value="1" min="1" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" step="0.01" min="0" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control item-total" readonly>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-sm btn-danger remove-item-btn"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `;
        $('#items-container').append(newRowHtml);

        // تهيئة Select2 للصف الجديد
        $('#items-container').find('.item-row:last .select2').select2({
            placeholder: "اختر...",
        });

        itemIndex++;
    });

    // إزالة بند
    $('#items-container').on('click', '.remove-item-btn', function() {
        $(this).closest('.item-row').remove();
        calculateGrandTotal();
    });

    // الحساب الأولي عند تحميل الصفحة
    $('.item-row').each(function() {
        calculateRowTotal($(this));
    });
});
</script>
@endpush
