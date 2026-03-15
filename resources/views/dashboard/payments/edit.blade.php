@extends('layouts.container')
@section('title', 'تعديل القيد رقم ' . $payment->id)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; display: flex; align-items: center; }
    .payment-details-box { border: 1px solid #ebedf2; padding: 20px; border-radius: 6px; margin-top: 10px; background-color: #f9f9f9; }
</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header"><h3 class="card-title">تعديل القيد رقم: {{ $payment->id }}</h3></div>
    <form action="{{ route('dashboard.payments.update', $payment->id) }}" method="POST" id="payment-form">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <h4 class="mb-5 text-primary">1. الشخص المرتبط</h4>
            <div class="alert alert-info">
                <strong>الشخص:</strong> {{ $payment->payable->name ?? 'N/A' }} ({{ str_replace('App\\Models\\', '', $payment->payable_type) }})
            </div>
            <input type="hidden" name="payable_id" value="{{ $payment->payable_id }}">
            <input type="hidden" name="payable_type" value="{{ str_replace('App\\Models\\', '', $payment->payable_type) }}">

            <div class="form-group">
                <label>العقد المرتبط</label>
                <select name="contract_id" class="form-control select2-basic">
                    <option value="">-- اختر العقد (اختياري) --</option>
                    @foreach($contracts as $contract)
                        <option value="{{ $contract->id }}" @selected(old('contract_id', $payment->contract_id) == $contract->id)>
                            العقد رقم: {{ $contract->id }} - القيمة: {{ number_format($contract->investment_amount, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- ================== 2. تفاصيل الدفعة ================== --}}
            <h4 class="my-5 text-primary">2. تفاصيل الدفعة</h4>
            <div class="row">
                <div class="col-md-3 form-group"><label>تاريخ الدفعة *</label><input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}" required></div>
                <div class="col-md-3 form-group"><label>نوع الحركة *</label><select name="type" class="form-control" required><option value="in" @selected(old('type', $payment->type) == 'in')>قبض</option><option value="out" @selected(old('type', $payment->type) == 'out')>صرف</option></select></div>
                <div class="col-md-3 form-group"><label>المبلغ *</label><input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount', $payment->amount) }}" required></div>
                <div class="col-md-3 form-group"><label>العملة *</label><select name="currency" id="currency" class="form-control" required><option value="ILS" @selected(old('currency', $payment->currency) == 'ILS')>شيكل</option><option value="USD" @selected(old('currency', $payment->currency) == 'USD')>دولار</option><option value="JOD" @selected(old('currency', $payment->currency) == 'JOD')>دينار</option></select></div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group d-none" id="exchange-rate-group">
                    <label>سعر الصرف مقابل الشيكل *</label>
                    <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.0001" value="{{ old('exchange_rate', $payment->exchange_rate) }}">
                    <small class="form-text text-muted">القيمة بالشيكل: <strong id="amount-ils-display">0.00 ILS</strong></small>
                </div>
            </div>

            <hr class="my-10">

            {{-- ================== 3. طريقة الدفع ================== --}}
            <h4 class="mb-5 text-primary">3. طريقة الدفع</h4>
            <div class="form-group">
                <label for="method">طريقة الدفع *</label>
                <select name="method" id="method" class="form-control" required>
                    <option value="cash" @selected(old('method', $payment->method) == 'cash')>نقدي</option>
                    <option value="bank_transfer" @selected(old('method', $payment->method) == 'bank_transfer')>تحويل بنكي</option>
                    <option value="check" @selected(old('method', $payment->method) == 'check')>شيك</option>
                </select>
            </div>
            <div id="payment-details-container" class="payment-details-box"></div>

            <div class="form-group mt-5">
                <label>ملاحظات على القيد</label>
                <textarea name="notes" class="form-control" rows="2">{{ old('notes', $payment->notes) }}</textarea>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
            <a href="{{ route('dashboard.payments.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
$(document ).ready(function() {
    // تهيئة المتغيرات والمكتبات
    const exchangeRates = {'USD': 3.75, 'JOD': 5.20, 'ILS': 1};
    const bankAccounts = @json($bankAccounts ?? []);
    const paymentDetails = @json($payment->details ?? null);
    let cleaveAmount = new Cleave('#amount', { numeral: true, numeralThousandsGroupStyle: 'thousand' });

    // دالة حساب العملة
    function calculateILS() {
        const amount = parseFloat(cleaveAmount.getRawValue()) || 0;
        const currency = $('#currency').val();
        const exchangeRateGroup = $('#exchange-rate-group');
        const exchangeRateInput = $('#exchange_rate');

        if (currency === 'ILS') {
            exchangeRateGroup.addClass('d-none');
            exchangeRateInput.val(1);
        } else {
            exchangeRateGroup.removeClass('d-none');
            if (exchangeRateInput.val() == 1 || exchangeRateInput.val() == "") {
                exchangeRateInput.val(exchangeRates[currency] || 1);
            }
        }
        const exchangeRate = parseFloat(exchangeRateInput.val()) || 1;
        const formatter = new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        $('#amount-ils-display').text(formatter.format(amount * exchangeRate) + ' ILS');
    }

    // دالة رسم تفاصيل طريقة الدفع
    function renderPaymentDetails(method) {
        const container = $('#payment-details-container');
        container.empty();
        let html = '';

        if (method === 'cash') {
            const deliveredBy = paymentDetails?.delivered_by || '';
            const receivedBy = paymentDetails?.received_by || '';
            html = `<h5 class="text-success">تفاصيل الدفع النقدي</h5><div class="row"><div class="col-md-6 form-group"><label>من سلم المبلغ *</label><input type="text" name="delivered_by" class="form-control" value="${deliveredBy}" required></div><div class="col-md-6 form-group"><label>من استلم المبلغ *</label><input type="text" name="received_by" class="form-control" value="${receivedBy}" required></div></div>`;
        } else if (method === 'check') {
            const checkNumber = paymentDetails?.check_number || '';
            const dueDate = paymentDetails?.due_date || '{{ now()->toDateString() }}';
            const checkOwner = paymentDetails?.check_owner || '';
            html = `<h5 class="text-warning">تفاصيل الشيك</h5><div class="row"><div class="col-md-4 form-group"><label>رقم الشيك *</label><input type="text" name="check_number" class="form-control" value="${checkNumber}" required></div><div class="col-md-4 form-group"><label>تاريخ الاستحقاق *</label><input type="date" name="due_date" class="form-control" value="${dueDate}" required></div><div class="col-md-4 form-group"><label>اسم مالك الشيك *</label><input type="text" name="check_owner" class="form-control" value="${checkOwner}" required></div></div>`;
        } else if (method === 'bank_transfer') {
            let senderOptions = '<option value="">اختر حساب...</option>';
            let receiverOptions = '<option value="">اختر حساب...</option>';
            bankAccounts.forEach(acc => {
                const senderSelected = (paymentDetails?.sender_bank_account_id == acc.id) ? 'selected' : '';
                const receiverSelected = (paymentDetails?.receiver_bank_account_id == acc.id) ? 'selected' : '';
                const optionText = `${acc.account_number} - ${acc.bank ? acc.bank.name : 'N/A'}`;
                senderOptions += `<option value="${acc.id}" ${senderSelected}>${optionText}</option>`;
                receiverOptions += `<option value="${acc.id}" ${receiverSelected}>${optionText}</option>`;
            });
            const reference = paymentDetails?.transaction_reference || '';
            html = `<h5 class="text-info">تفاصيل التحويل البنكي</h5><div class="row"><div class="col-md-6 form-group"><label>من حساب *</label><select name="sender_bank_account_id" class="form-control" required>${senderOptions}</select></div><div class="col-md-6 form-group"><label>إلى حساب *</label><select name="receiver_bank_account_id" class="form-control" required>${receiverOptions}</select></div></div><div class="form-group"><label>مرجع التحويل</label><input type="text" name="transaction_reference" value="${reference}" class="form-control"></div>`;
        }
        container.html(html);
    }

    // استدعاء الدوال عند تحميل الصفحة وعند تغيير المدخلات
    $('#method').on('change', function() { renderPaymentDetails($(this).val()); });
    $('#amount, #currency, #exchange_rate').on('input change', calculateILS);

    // تشغيل الدوال لأول مرة لملء الصفحة بالبيانات الحالية
    calculateILS();
    renderPaymentDetails($('#method').val());

    // معالجة إرسال النموذج
    $('#payment-form').on('submit', function() {
        $('#amount').val(cleaveAmount.getRawValue());
        return true;
    });
});
</script>
@endpush
