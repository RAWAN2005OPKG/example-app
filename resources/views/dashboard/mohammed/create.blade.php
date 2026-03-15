@extends('layouts.container')
@section('title', 'إنشاء سند محمد جديد')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; display: flex; align-items: center; }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 100% !important; }
</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle text-primary mr-2"></i>إنشاء سند جديد (سندات محمد)</h3></div>
    <form action="{{ route('dashboard.mohammed.store') }}" method="POST" id="voucher-form">
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

            <div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">1. المعلومات الأساسية</h4></div><div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group"><label>تاريخ السند <span class="text-danger">*</span></label><input type="date" name="voucher_date" class="form-control" value="{{ old('voucher_date', date('Y-m-d')) }}" required></div>
                    <div class="col-md-4 form-group"><label>نوع السند <span class="text-danger">*</span></label><select name="type" id="voucher_type" class="form-control" required><option value="receipt" @selected(old('type') == 'receipt')>سند قبض</option><option value="payment" @selected(old('type') == 'payment')>سند صرف</option></select></div>
                    <div class="col-md-4 form-group"><label>طريقة الدفع <span class="text-danger">*</span></label><select name="payment_method" id="payment_method" class="form-control" required><option value="cash" @selected(old('payment_method') == 'cash')>نقدي</option><option value="bank_transfer" @selected(old('payment_method') == 'bank_transfer')>تحويل بنكي</option><option value="check" @selected(old('payment_method') == 'check')>شيك</option></select></div>
                </div>
                <div class="form-group"><label>البيان/الوصف <span class="text-danger">*</span></label><textarea name="description" class="form-control" required rows="3">{{ old('description') }}</textarea></div>
            </div></div>

            <div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">2. تفاصيل المبلغ</h4></div><div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required></div>
                    <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="currency" id="currency" class="form-control" required><option value="ILS" @selected(old('currency') == 'ILS')>ILS</option><option value="USD" @selected(old('currency') == 'USD')>USD</option><option value="JOD" @selected(old('currency') == 'JOD')>JOD</option></select></div>
                    <div class="col-md-2 form-group" id="exchange_rate_wrapper" style="display: none;"><label>سعر الصرف</label><input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.001" value="{{ old('exchange_rate', 1) }}"></div>
                    <div class="col-md-3 form-group"><label>القيمة بالشيكل (تقريبي)</label><input type="text" id="amount_ils_display" class="form-control bg-light" readonly></div>
                </div>
            </div></div>

            <div id="payment-details-wrapper"></div>

            <div class="card shadow-sm mb-5"><div class="card-header"><h4 class="card-title">4. ربط وتحويل (اختياري)</h4></div><div class="card-body">
                <div class="row">
                    <div class="col-md-3 form-group"><label>ربط بمشروع</label><select name="project_id" id="project_id" class="form-control select2-basic"><option value="">-- اختر مشروع --</option>@foreach($projects as $project)<option value="{{ $project->id }}" @selected(old('project_id') == $project->id)>{{ $project->name }}</option>@endforeach</select></div>
                    <div class="col-md-3 form-group"><label>ربط بعميل</label><select name="client_id" id="client_id" class="form-control select2-basic payable-trigger"><option value="">-- اختر عميل --</option>@foreach($clients as $client)<option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>{{ $client->name }}</option>@endforeach</select></div>
                    <div class="col-md-3 form-group"><label>ربط بمستثمر</label><select name="investor_id" id="investor_id" class="form-control select2-basic payable-trigger"><option value="">-- اختر مستثمر --</option>@foreach($investors as $investor)<option value="{{ $investor->id }}" @selected(old('investor_id') == $investor->id)>{{ $investor->name }}</option>@endforeach</select></div>
                    <div class="col-md-3 form-group"><label>العقد المرتبط</label><select name="contract_id" id="contract_id" class="form-control select2-basic"><option value="">-- اختر العقد --</option></select></div>
                </div>
                <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea></div>
            </div></div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg px-8">حفظ السند</button>
            <a href="{{ route('dashboard.mohammed.index') }}" class="btn btn-secondary btn-lg px-6">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document ).ready(function() {
    $('.select2-basic').select2();
    const exchangeRates = @json($exchangeRates);
    const bankAccountsOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}">{{ $account->account_name }} - {{ $account->bank->name ?? '' }} ({{ $account->currency }})</option>@endforeach`;

    function renderPaymentDetails() {
        const method = $('#payment_method').val();
        const type = $('#voucher_type').val();
        const wrapper = $('#payment-details-wrapper');
        let html = '';

        if (method === 'cash') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل الدفع النقدي</h4></div><div class="card-body">
                <div class="form-group"><label>${type === 'receipt' ? 'تم القبض من' : 'تم الصرف إلى'} <span class="text-danger">*</span></label><input type="text" name="cash_source_name" class="form-control" value="{{ old('cash_source_name') }}" placeholder="اكتب اسم الشخص أو الجهة..." required></div>
                <div class="row"><div class="col-md-6 form-group"><label>اسم المستلم/المسلم</label><input type="text" name="handler_name" class="form-control" value="{{ old('handler_name') }}"></div><div class="col-md-6 form-group"><label>الوظيفة</label><input type="text" name="handler_role" class="form-control" value="{{ old('handler_role') }}"></div></div>
            </div></div>`;
        } else if (method === 'bank_transfer') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل التحويل البنكي</h4></div><div class="card-body">
                <div class="form-group"><label>من حساب بنكي</label><select name="from_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
                <div class="form-group"><label>إلى حساب بنكي</label><select name="to_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select></div>
            </div></div>`;
        } else if (method === 'check') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل الشيك</h4></div><div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group"><label>رقم الشيك <span class="text-danger">*</span></label><input type="text" name="check_number" class="form-control" value="{{ old('check_number') }}" required></div>
                    <div class="col-md-4 form-group"><label>اسم صاحب الشيك <span class="text-danger">*</span></label><input type="text" name="check_owner_name" class="form-control" value="{{ old('check_owner_name') }}" required></div>
                    <div class="col-md-4 form-group"><label>اسم البنك <span class="text-danger">*</span></label><input type="text" name="check_bank_name" class="form-control" value="{{ old('check_bank_name') }}" required></div>
                </div>
                <div class="row"><div class="col-md-4 form-group"><label>تاريخ الاستحقاق <span class="text-danger">*</span></label><input type="date" name="check_due_date" class="form-control" value="{{ old('check_due_date', date('Y-m-d')) }}" required></div></div>
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

    function updateExchangeRate() {
        const currency = $('#currency').val();
        if (currency === 'ILS') {
            $('#exchange_rate_wrapper').hide();
            $('#exchange_rate').val(1);
        } else {
            $('#exchange_rate_wrapper').show();
            $('#exchange_rate').val(exchangeRates[currency] || 1);
        }
        calculateILS();
    }

    $('#payment_method, #voucher_type').on('change', renderPaymentDetails);
    $('#amount, #exchange_rate').on('input', calculateILS);
    $('#currency').on('change', updateExchangeRate);

    renderPaymentDetails();
    updateExchangeRate();

    $('.payable-trigger').on('change', function() {
        const id = $(this).val();
        const type = $(this).attr('id') === 'client_id' ? 'Client' : 'Investor';
        const contractSelect = $('#contract_id');
        contractSelect.empty().append('<option value="">جاري التحميل...</option>');
        if (id) {
            $.ajax({
                url: "{{ route('dashboard.getPayableContracts') }}",
                data: { payable_id: id, payable_type: type },
                success: function(data) {
                    contractSelect.empty().append('<option value="">-- اختر العقد --</option>');
                    data.contracts.forEach(c => {
                        contractSelect.append(`<option value="${c.id}">العقد رقم ${c.id} - ${c.investment_amount}</option>`);
                    });
                }
            });
        } else {
            contractSelect.empty().append('<option value="">-- اختر العقد --</option>');
        }
    });
});
</script>
@endpush
