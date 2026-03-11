@extends('layouts.container')
@section('title', 'تعديل سند خالد رقم ' . $voucher->id)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>.select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; }</style>
@endpush

@section('content')
<form action="{{ route('dashboard.khaled.update', $voucher->id) }}" method="POST" id="voucher-form">
    @csrf
    @method('PUT')
    @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">المعلومات الأساسية</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>تاريخ السند <span class="text-danger">*</span></label><input type="date" name="voucher_date" class="form-control" value="{{ old('voucher_date', $voucher->voucher_date->format('Y-m-d')) }}" required></div>
            <div class="col-md-4 form-group"><label>نوع السند <span class="text-danger">*</span></label><select name="type" id="voucher_type" class="form-control" required><option value="receipt" @selected(old('type', $voucher->type) == 'receipt')>سند قبض</option><option value="payment" @selected(old('type', $voucher->type) == 'payment')>سند صرف</option></select></div>
            <div class="col-md-4 form-group"><label>طريقة الدفع <span class="text-danger">*</span></label><select name="payment_method" id="payment_method" class="form-control" required><option value="cash" @selected(old('payment_method', $voucher->payment_method) == 'cash')>نقدي</option><option value="bank_transfer" @selected(old('payment_method', $voucher->payment_method) == 'bank_transfer')>تحويل بنكي</option><option value="check" @selected(old('payment_method', $voucher->payment_method) == 'check')>شيك</option></select></div>
        </div>
        <div class="form-group"><label>البيان/الوصف <span class="text-danger">*</span></label><textarea name="description" class="form-control" required>{{ old('description', $voucher->description) }}</textarea></div>
    </div></div>

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">تفاصيل المبلغ</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount', $voucher->amount) }}" required></div>
            <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="currency" id="currency" class="form-control" required><option value="ILS" @selected(old('currency', $voucher->currency) == 'ILS')>ILS</option><option value="USD" @selected(old('currency', $voucher->currency) == 'USD')>USD</option><option value="JOD" @selected(old('currency', $voucher->currency) == 'JOD')>JOD</option></select></div>
            <div class="col-md-2 form-group" id="exchange_rate_wrapper" style="display: none;"><label>سعر الصرف</label><input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.001" value="{{ old('exchange_rate', $voucher->exchange_rate) }}"></div>
            <div class="col-md-3 form-group"><label>القيمة بالشيكل</label><input type="text" id="amount_ils_display" class="form-control" readonly></div>
        </div>
    </div></div>

    <div id="payment-details-wrapper"></div>

    <div class="card mb-5"><div class="card-body">
        <h4 class="card-title">ربط وتحويل (اختياري)</h4>
        <div class="row">
            <div class="col-md-4 form-group"><label>ربط بمشروع</label><select name="project_id" class="form-control select2-basic"><option value="">-- اختر مشروع --</option>@foreach($projects as $project)<option value="{{ $project->id }}" @selected(old('project_id', $voucher->project_id) == $project->id)>{{ $project->name }}</option>@endforeach</select></div>
            <div class="col-md-4 form-group"><label>ربط بعميل</label><select name="client_id" class="form-control select2-basic"><option value="">-- اختر عميل --</option>@foreach($clients as $client)<option value="{{ $client->id }}" @selected(old('client_id', $voucher->client_id) == $client->id)>{{ $client->name }}</option>@endforeach</select></div>
            <div class="col-md-4 form-group"><label>ربط بمستثمر</label><select name="investor_id" class="form-control select2-basic"><option value="">-- اختر مستثمر --</option>@foreach($investors as $investor)<option value="{{ $investor->id }}" @selected(old('investor_id', $voucher->investor_id) == $investor->id)>{{ $investor->name }}</option>@endforeach</select></div>
        </div>
        <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control">{{ old('notes', $voucher->notes) }}</textarea></div>
    </div></div>

    <button type="submit" class="btn btn-primary btn-lg">حفظ التعديلات</button>
    <a href="{{ route('dashboard.khaled.index') }}" class="btn btn-secondary btn-lg">إلغاء</a>
</form>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document ).ready(function() {
    $('.select2-basic').select2();

    const exchangeRates = @json($exchangeRates);
    const cashesOptions = `@foreach($cashes as $cash)<option value="{{ $cash->id }}">{{ $cash->name }} ({{ $cash->currency }})</option>@endforeach`;
    const bankAccountsOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}">{{ $account->account_name }} - {{ $account->bank->name ?? '' }} ({{ $account->currency }})</option>@endforeach`;
    const voucherDetails = @json($voucher->details);

    function renderPaymentDetails() {
        const method = $('#payment_method').val();
        const type = $('#voucher_type').val();
        const wrapper = $('#payment-details-wrapper');
        let html = '';

        if (method === 'cash') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الدفع النقدي</h4>
                <div class="form-group"><label>${type === 'receipt' ? 'إلى كاش' : 'من كاش'} <span class="text-danger">*</span></label><select name="cash_id" id="cash_id" class="form-control select2-basic" required>${cashesOptions}</select></div>
                <div class="row"><div class="col-md-6 form-group"><label>اسم المستلم/المسلم</label><input type="text" name="handler_name" class="form-control" value="${voucherDetails?.handler_name || ''}"></div><div class="col-md-6 form-group"><label>الوظيفة</label><input type="text" name="handler_role" class="form-control" value="${voucherDetails?.handler_role || ''}"></div></div>
            </div></div>`;
        } else if (method === 'bank_transfer') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل التحويل البنكي</h4>
                <div class="form-group"><label>من حساب بنكي</label><select name="from_bank_account_id" id="from_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
                <div class="form-group"><label>إلى حساب بنكي</label><select name="to_bank_account_id" id="to_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
            </div></div>`;
        } else if (method === 'check') {
            html = `<div class="card mb-5"><div class="card-body"><h4>تفاصيل الشيك</h4>
                <div class="row">
                    <div class="col-md-4 form-group"><label>رقم الشيك <span class="text-danger">*</span></label><input type="text" name="check_number" class="form-control" value="${voucherDetails?.check_number || ''}" required></div>
                    <div class="col-md-4 form-group"><label>اسم صاحب الشيك (الساحب) <span class="text-danger">*</span></label><input type="text" name="check_owner_name" class="form-control" value="${voucherDetails?.check_owner_name || ''}" required></div>
                    <div class="col-md-4 form-group"><label>اسم البنك <span class="text-danger">*</span></label><input type="text" name="check_bank_name" class="form-control" value="${voucherDetails?.check_bank_name || ''}" required></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label>تاريخ الاستحقاق <span class="text-danger">*</span></label><input type="date" name="check_due_date" class="form-control" value="${voucherDetails?.check_due_date || '{{ date('Y-m-d') }}'}" required></div>
                </div>
            </div></div>`;
        }
        wrapper.html(html);
        wrapper.find('.select2-basic').select2();

        // Set selected values for details
        if (method === 'cash') $('#cash_id').val(voucherDetails?.cash_id).trigger('change');
        if (method === 'bank_transfer') {
            $('#from_bank_account_id').val(voucherDetails?.from_bank_account_id).trigger('change');
            $('#to_bank_account_id').val(voucherDetails?.to_bank_account_id).trigger('change');
        }
    }
    // ... (نفس باقي دوال الجافاسكريبت)
    $('#payment_method, #voucher_type').on('change', renderPaymentDetails);
    $('#amount, #exchange_rate').on('input', calculateILS);
    $('#currency').on('change', updateExchangeRate);

    renderPaymentDetails();
    updateExchangeRate();
});
</script>
@endpush
