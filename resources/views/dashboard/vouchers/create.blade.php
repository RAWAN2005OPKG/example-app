@extends('layouts.container')
@section('title', 'إنشاء سند جديد')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>.select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; }</style>
@endpush

@section('content')
<form action="{{ route('dashboard.vouchers.store') }}" method="POST" id="voucher-form">
    @csrf
    @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">المعلومات الأساسية</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>تاريخ السند <span class="text-danger">*</span></label><input type="date" name="voucher_date" class="form-control" value="{{ date('Y-m-d') }}" required></div>
            <div class="col-md-4 form-group"><label>نوع السند <span class="text-danger">*</span></label><select name="type" id="voucher_type" class="form-control" required><option value="receipt">سند قبض</option><option value="payment">سند صرف</option></select></div>
            <div class="col-md-4 form-group"><label>طريقة الدفع <span class="text-danger">*</span></label><select name="payment_method" id="payment_method" class="form-control" required><option value="cash">نقدي</option><option value="bank_transfer">تحويل بنكي</option><option value="check">شيك</option></select></div>
        </div>
        <div class="form-group"><label>البيان/الوصف <span class="text-danger">*</span></label><textarea name="description" class="form-control" required>{{ old('description') }}</textarea></div>
    </div></div>

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">تفاصيل المبلغ</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" id="amount" class="form-control" step="0.01" required></div>
            <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="currency" id="currency" class="form-control" required><option value="ILS">ILS</option><option value="USD">USD</option><option value="JOD">JOD</option></select></div>
            <div class="col-md-2 form-group" id="exchange_rate_wrapper"><label>سعر الصرف</label><input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.001" value="3.75"></div>
            <div class="col-md-3 form-group"><label>القيمة بالشيكل</label><input type="text" id="amount_ils_display" class="form-control" readonly></div>
        </div>
    </div></div>

    <div id="payment-details-wrapper"></div>

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">ربط وتحويل (اختياري)</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>ربط بمشروع</label><select name="project_id" class="form-control select2-basic"><option value="">-- اختر مشروع --</option>@foreach($projects as $project)<option value="{{ $project->id }}">{{ $project->name }}</option>@endforeach</select></div>
            <div class="col-md-8 form-group"><label>ملاحظات</label><textarea name="notes" class="form-control"></textarea></div>
        </div>
    </div></div>

    <button type="submit" class="btn btn-primary btn-lg">حفظ السند</button>
</form>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document ).ready(function() {
    $('.select2-basic').select2();

    const cashSafesOptions = `@foreach($cashSafes as $safe)<option value="{{ $safe->id }}">{{ $safe->name }} ({{ $safe->currency }})</option>@endforeach`;
    const bankAccountsOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}">{{ $account->account_name }} - {{ $account->bank->name }} ({{ $account->currency }})</option>@endforeach`;

    function renderPaymentDetails() {
        const method = $('#payment_method').val();
        const type = $('#voucher_type').val();
        const wrapper = $('#payment-details-wrapper');
        let html = '';

        if (method === 'cash') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الدفع النقدي</h4>
                <div class="form-group"><label>${type === 'receipt' ? 'إلى خزينة' : 'من خزينة'} <span class="text-danger">*</span></label><select name="cash_safe_id" class="form-control select2-basic" required>${cashSafesOptions}</select></div>
                <div class="row"><div class="col-md-6 form-group"><label>اسم المستلم/المسلم</label><input type="text" name="handler_name" class="form-control"></div><div class="col-md-6 form-group"><label>الوظيفة</label><input type="text" name="handler_role" class="form-control"></div></div>
            </div></div>`;
        } else if (method === 'bank_transfer') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل التحويل البنكي</h4>
                <div class="form-group"><label>من حساب بنكي</label><select name="from_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
                <div class="form-group"><label>إلى حساب بنكي</label><select name="to_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
            </div></div>`;
        } else if (method === 'check') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الشيك</h4>
                <div class="row">
                    <div class="col-md-4 form-group"><label>رقم الشيك <span class="text-danger">*</span></label><input type="text" name="check_number" class="form-control" required></div>
                    <div class="col-md-4 form-group"><label>اسم صاحب الشيك (الساحب) <span class="text-danger">*</span></label><input type="text" name="check_owner_name" class="form-control" required></div>
                    <div class="col-md-4 form-group"><label>اسم البنك <span class="text-danger">*</span></label><input type="text" name="check_bank_name" class="form-control" required></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label>تاريخ الاستحقاق <span class="text-danger">*</span></label><input type="date" name="check_due_date" class="form-control" required></div>
                </div>
            </div></div>`;
        }
        wrapper.html(html);
        wrapper.find('.select2-basic').select2();
    }

    function calculateILS() {
        const amount = parseFloat($('#amount').val()) || 0;
        const rate = parseFloat($('#exchange_rate').val()) || 1;
        $('#amount_ils_display').val((amount * rate).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    }

    $('#payment_method, #voucher_type').on('change', renderPaymentDetails);
    $('#amount, #exchange_rate').on('input', calculateILS);
    $('#currency').on('change', function() {
        $('#exchange_rate_wrapper').toggle(this.value !== 'ILS');
        if (this.value === 'ILS') $('#exchange_rate').val(1);
        calculateILS();
    });

    renderPaymentDetails();
    calculateILS();
    $('#currency').trigger('change');
});
</script>
@endpush
@endsection
