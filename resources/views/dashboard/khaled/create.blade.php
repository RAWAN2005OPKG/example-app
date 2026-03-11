@extends('layouts.container')
@section('title', 'إنشاء سند خالد جديد')

@push('styles')
{{-- مكتبة لتحسين شكل قوائم الاختيار وجعلها قابلة للبحث --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* تعديل ارتفاع حقل Select2 ليتناسب مع تصميم Bootstrap */
    .select2-container .select2-selection--single { 
        height: calc(1.5em + 1.3rem + 2px ) !important; 
        display: flex;
        align-items: center;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
    }
</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-plus-circle text-primary mr-2"></i>
            إنشاء سند جديد (سندات خالد)
        </h3>
    </div>
    <form action="{{ route('dashboard.khaled.store') }}" method="POST" id="voucher-form">
        @csrf

        <div class="card-body">
            {{-- ================== عرض رسائل الخطأ في حال وجودها ================== --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>يرجى تصحيح الأخطاء التالية:</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- ================== 1. المعلومات الأساسية ================== --}}
            <div class="card shadow-sm mb-8">
                <div class="card-header"><h4 class="card-title">1. المعلومات الأساسية</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>تاريخ السند <span class="text-danger">*</span></label>
                            <input type="date" name="voucher_date" class="form-control" value="{{ old('voucher_date', date('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>نوع السند <span class="text-danger">*</span></label>
                            <select name="type" id="voucher_type" class="form-control" required>
                                <option value="receipt" @selected(old('type') == 'receipt')>سند قبض</option>
                                <option value="payment" @selected(old('type') == 'payment')>سند صرف</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>طريقة الدفع <span class="text-danger">*</span></label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="cash" @selected(old('payment_method') == 'cash')>نقدي</option>
                                <option value="bank_transfer" @selected(old('payment_method') == 'bank_transfer')>تحويل بنكي</option>
                                <option value="check" @selected(old('payment_method') == 'check')>شيك</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>البيان/الوصف <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" required rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- ================== 2. تفاصيل المبلغ ================== --}}
            <div class="card shadow-sm mb-8">
                <div class="card-header"><h4 class="card-title">2. تفاصيل المبلغ</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>المبلغ <span class="text-danger">*</span></label>
                            <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>العملة <span class="text-danger">*</span></label>
                            <select name="currency" id="currency" class="form-control" required>
                                <option value="ILS" @selected(old('currency') == 'ILS')>ILS</option>
                                <option value="USD" @selected(old('currency') == 'USD')>USD</option>
                                <option value="JOD" @selected(old('currency') == 'JOD')>JOD</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group" id="exchange_rate_wrapper" style="display: none;">
                            <label>سعر الصرف</label>
                            <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.001" value="{{ old('exchange_rate', 1) }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>القيمة بالشيكل (تقريبي)</label>
                            <input type="text" id="amount_ils_display" class="form-control bg-light" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div id="payment-details-wrapper"></div>

            <div class="card shadow-sm mb-5">
                <div class="card-header"><h4 class="card-title">4. ربط وتحويل (اختياري)</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>ربط بمشروع</label>
                            <select name="project_id" class="form-control select2-basic">
                                <option value="">-- اختر مشروع --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" @selected(old('project_id') == $project->id)>{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>ربط بعميل</label>
                            <select name="client_id" class="form-control select2-basic">
                                <option value="">-- اختر عميل --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>ربط بمستثمر</label>
                            <select name="investor_id" class="form-control select2-basic">
                                <option value="">-- اختر مستثمر --</option>
                                @foreach($investors as $investor)
                                    <option value="{{ $investor->id }}" @selected(old('investor_id') == $investor->id)>{{ $investor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ملاحظات</label>
                        <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg px-8">حفظ السند</button>
            <a href="{{ route('dashboard.khaled.index') }}" class="btn btn-secondary btn-lg px-6">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document ).ready(function() {
    // تهيئة قوائم الاختيار المحسنة
    $('.select2-basic').select2();

    // جلب البيانات من المتحكم
    const exchangeRates = @json($exchangeRates);
    const cashesOptions = `@foreach($cashes as $cash)<option value="{{ $cash->id }}">{{ $cash->name ?? ('حركة رقم ' . $cash->id) }} ({{ $cash->currency ?? 'N/A' }})</option>@endforeach`;
    const bankAccountsOptions = `@foreach($bankAccounts as $account)<option value="{{ $account->id }}">{{ $account->account_name }} - {{ $account->bank->name ?? '' }} ({{ $account->currency }})</option>@endforeach`;

    // دالة لرسم تفاصيل طريقة الدفع
    function renderPaymentDetails() {
        const method = $('#payment_method').val();
        const type = $('#voucher_type').val();
        const wrapper = $('#payment-details-wrapper');
        let html = '';

        const cardHeader = `<div class="card-header"><h4 class="card-title">3. تفاصيل طريقة الدفع (${method})</h4></div>`;

        if (method === 'cash') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل الدفع النقدي</h4></div><div class="card-body">
                <div class="form-group">
                    <label>${type === 'receipt' ? 'إلى كاش' : 'من كاش'} <span class="text-danger">*</span></label>
                    <select name="cash_id" class="form-control select2-basic" required>${cashesOptions}</select>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>اسم المستلم/المسلم</label>
                        <input type="text" name="handler_name" class="form-control" value="{{ old('handler_name') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>الوظيفة</label>
                        <input type="text" name="handler_role" class="form-control" value="{{ old('handler_role') }}">
                    </div>
                </div>
            </div></div>`;
        } else if (method === 'bank_transfer') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل التحويل البنكي</h4></div><div class="card-body">
                <div class="form-group">
                    <label>من حساب بنكي</label>
                    <select name="from_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select>
                </div>
                <div class="form-group">
                    <label>إلى حساب بنكي</label>
                    <select name="to_bank_account_id" class="form-control select2-basic"><option value="">-- اختر --</option>${bankAccountsOptions}</select>
                </div>
            </div></div>`;
        } else if (method === 'check') {
            html = `<div class="card shadow-sm mb-8"><div class="card-header"><h4 class="card-title">3. تفاصيل الشيك</h4></div><div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>رقم الشيك <span class="text-danger">*</span></label>
                        <input type="text" name="check_number" class="form-control" value="{{ old('check_number') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>اسم صاحب الشيك (الساحب) <span class="text-danger">*</span></label>
                        <input type="text" name="check_owner_name" class="form-control" value="{{ old('check_owner_name') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>اسم البنك <span class="text-danger">*</span></label>
                        <input type="text" name="check_bank_name" class="form-control" value="{{ old('check_bank_name') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>تاريخ الاستحقاق <span class="text-danger">*</span></label>
                        <input type="date" name="check_due_date" class="form-control" value="{{ old('check_due_date', date('Y-m-d')) }}" required>
                    </div>
                </div>
            </div></div>`;
        }
        wrapper.html(html);
        wrapper.find('.select2-basic').select2(); // إعادة تهيئة Select2 للعناصر الجديدة
    }

    // دالة لحساب القيمة بالشيكل
    function calculateILS() {
        const amount = parseFloat($('#amount').val()) || 0;
        const rate = parseFloat($('#exchange_rate').val()) || 1;
        $('#amount_ils_display').val((amount * rate).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    }

    // دالة لتحديث سعر الصرف عند تغيير العملة
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

    // ربط الأحداث بالدوال
    $('#payment_method, #voucher_type').on('change', renderPaymentDetails);
    $('#amount, #exchange_rate').on('input', calculateILS);
    $('#currency').on('change', updateExchangeRate);

    // التشغيل الأولي عند تحميل الصفحة
    renderPaymentDetails();
    updateExchangeRate();
});
</script>
@endpush
