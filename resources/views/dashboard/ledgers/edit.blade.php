@extends('layouts.container')
@section('title', $pageTitle)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>.select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; }</style>
@endpush

@section('content')
<form action="{{ route($routeName.'.update', $voucher->id) }}" method="POST" id="voucher-form">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>حدث خطأ! يرجى مراجعة الحقول التالية:</strong>
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    {{-- القسم الأول: معلومات السند الأساسية --}}
    <div class="card mb-5">
        <div class="card-body">
            <h4 class="card-title">المعلومات الأساسية</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>تاريخ السند <span class="text-danger">*</span></label>
                    <input type="date" name="voucher_date" class="form-control" value="{{ old('voucher_date', $voucher->voucher_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>نوع السند <span class="text-danger">*</span></label>
                    <select name="type" id="voucher_type" class="form-control" required>
                        <option value="receipt" @selected(old('type', $voucher->type) == 'receipt')>سند قبض</option>
                        <option value="payment" @selected(old('type', $voucher->type) == 'payment')>سند صرف</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>طريقة الدفع <span class="text-danger">*</span></label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="cash" @selected(old('payment_method', $voucher->payment_method) == 'cash')>نقدي</option>
                        <option value="bank_transfer" @selected(old('payment_method', $voucher->payment_method) == 'bank_transfer')>تحويل بنكي</option>
                        <option value="check" @selected(old('payment_method', $voucher->payment_method) == 'check')>شيك</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>البيان/الوصف <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control" required>{{ old('description', $voucher->description) }}</textarea>
            </div>
        </div>
    </div>

    {{-- القسم الثاني: تفاصيل المبلغ --}}
    <div class="card mb-5">
        <div class="card-body">
            <h4 class="card-title">تفاصيل المبلغ</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>المبلغ <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $voucher->amount) }}" step="0.01" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>العملة <span class="text-danger">*</span></label>
                    <select name="currency" id="currency" class="form-control" required>
                        <option value="ILS" @selected(old('currency', $voucher->currency) == 'ILS')>ILS</option>
                        <option value="USD" @selected(old('currency', $voucher->currency) == 'USD')>USD</option>
                        <option value="JOD" @selected(old('currency', $voucher->currency) == 'JOD')>JOD</option>
                    </select>
                </div>
                <div class="col-md-2 form-group" id="exchange_rate_wrapper">
                    <label>سعر الصرف</label>
                    <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" value="{{ old('exchange_rate', $voucher->exchange_rate) }}" step="0.001">
                </div>
                <div class="col-md-3 form-group">
                    <label>القيمة بالشيكل</label>
                    <input type="text" id="amount_ils_display" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>

    {{-- القسم الثالث: تفاصيل طريقة الدفع (ديناميكي) --}}
    <div id="payment-details-wrapper"></div>

    {{-- القسم الرابع: الربط والتحويلات (اختياري) --}}
    <div class="card mb-5">
        <div class="card-body">
            <h4 class="card-title">ربط وتحويل (اختياري)</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>ربط بمشروع</label>
                    <select name="project_id" class="form-control select2-basic">
                        <option value="">-- اختر مشروع --</option>
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}" @selected(old('project_id', $voucher->project_id) == $project->id)>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 form-group">
                    <label>ملاحظات</label>
                    <textarea name="notes" class="form-control">{{ old('notes', $voucher->notes) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">تحديث السند</button>
    <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary btn-lg">إلغاء</a>
</form>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document ).ready(function() {
    // تهيئة Select2
    $('.select2-basic').select2();

    // قوالب HTML الديناميكية مع البيانات القديمة
    const cashSafesOptions = `@foreach($cashSafes as $safe)<option value="{{ $safe->id }}" {{ old('cash_safe_id', $voucher->cash_safe_id) == $safe->id ? 'selected' : '' }}>{{ $safe->name }} ({{ $safe->currency }})</option>@endforeach`;
    const bankAccountsOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}">{{ $account->account_name }} - {{ $account->bank->name }} ({{ $account->currency }})</option>@endforeach`;

    function renderPaymentDetails() {
        const method = $('#payment_method').val();
        const type = $('#voucher_type').val();
        const wrapper = $('#payment-details-wrapper');
        let html = '';

        if (method === 'cash') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الدفع النقدي</h4>
                <div class="form-group"><label>${type === 'receipt' ? 'إلى خزينة' : 'من خزينة'} <span class="text-danger">*</span></label><select name="cash_safe_id" class="form-control select2-basic" required>${cashSafesOptions}</select></div>
                <div class="row">
                    <div class="col-md-6 form-group"><label>اسم المستلم/المسلم</label><input type="text" name="handler_name" class="form-control" value="{{ old('handler_name', $voucher->handler_name) }}"></div>
                    <div class="col-md-6 form-group"><label>الوظيفة</label><input type="text" name="handler_role" class="form-control" value="{{ old('handler_role', $voucher->handler_role) }}"></div>
                </div>
            </div></div>`;
        } else if (method === 'bank_transfer') {
            // بناء خيارات الحسابات البنكية مع تحديد الخيار المحفوظ
            const fromBankOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}" {{ old('from_bank_account_id', $voucher->from_bank_account_id) == $account->id ? 'selected' : '' }}>{{ $account->account_name }} - {{ $account->bank->name }} ({{ $account->currency }})</option>@endforeach`;
            const toBankOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}" {{ old('to_bank_account_id', $voucher->to_bank_account_id) == $account->id ? 'selected' : '' }}>{{ $account->account_name }} - {{ $account->bank->name }} ({{ $account->currency }})</option>@endforeach`;

            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل التحويل البنكي</h4>
                <div class="form-group"><label>من حساب بنكي</label><select name="from_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${fromBankOptions}</select></div>
                <div class="form-group"><label>إلى حساب بنكي</label><select name="to_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${toBankOptions}</select></div>
            </div></div>`;
        } else if (method === 'check') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الشيك</h4>
                <div class="row">
                    <div class="col-md-4 form-group"><label>رقم الشيك <span class="text-danger">*</span></label><input type="text" name="check_number" class="form-control" value="{{ old('check_number', $voucher->check_number) }}" required></div>
                    <div class="col-md-4 form-group"><label>اسم صاحب الشيك (الساحب) <span class="text-danger">*</span></label><input type="text" name="check_owner_name" class="form-control" value="{{ old('check_owner_name', $voucher->check_owner_name) }}" required></div>
                    <div class="col-md-4 form-group"><label>اسم البنك <span class="text-danger">*</span></label><input type="text" name="check_bank_name" class="form-control" value="{{ old('check_bank_name', $voucher->check_bank_name) }}" required></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label>تاريخ الاستحقاق <span class="text-danger">*</span></label><input type="date" name="check_due_date" class="form-control" value="{{ old('check_due_date', $voucher->check_due_date ? $voucher->check_due_date->format('Y-m-d') : '') }}" required></div>
                </div>
            </div></div>`;
        }
        wrapper.html(html);
        // إعادة تهيئة Select2 على الحقول الجديدة
        wrapper.find('.select2-basic').select2();
    }

    // دالة حساب القيمة بالشيكل
    function calculateILS() {
        const amount = parseFloat($('#amount').val()) || 0;
        const rate = parseFloat($('#exchange_rate').val()) || 1;
        $('#amount_ils_display').val((amount * rate).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    }

    // ربط الأحداث
    $('#payment_method, #voucher_type').on('change', renderPaymentDetails);
    $('#amount, #exchange_rate').on('input', calculateILS);
    $('#currency').on('change', function() {
        $('#exchange_rate_wrapper').toggle(this.value !== 'ILS');
        if (this.value === 'ILS') {
            $('#exchange_rate').val(1);
        }
        calculateILS();
    });

    // التشغيل الأولي عند تحميل الصفحة
    renderPaymentDetails();
    calculateILS();
    $('#currency').trigger('change');
});
</script>
@endpush
@endsection
