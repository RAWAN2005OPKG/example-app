
@extends('layouts.container')
@section('title', 'تسجيل قيد يومي (دفعة/قبض)')

@push('styles')
<style>
    .payment-details-box {
        border: 1px solid #ebedf2;
        padding: 20px;
        border-radius: 6px;
        margin-top: 20px;
    }
    .exchange-rate-box {
        background-color: #f3f6f9;
        padding: 10px;
        border-radius: 4px;
    }
</style>
@endpush

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-money-bill-wave text-success mr-2"></i>
            تسجيل دفعة/قبض (قيد يومي)
        </h3>
    </div>
    <form action="{{ route('dashboard.payments.store') }}" method="POST">
        @csrf
        <div class="card-body">

            {{-- رسائل التنبيه والتحقق --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>يرجى تصحيح الأخطاء التالية:</p>
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            {{-- 1. تحديد الكيان ونوع الحركة --}}
            <h4 class="mb-5 text-primary">1. تحديد الكيان ونوع الحركة</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>الكيان المستهدف <span class="text-danger">*</span></label>
                    <select name="payable_type" id="payable_type" class="form-control" required>
                        <option value="">اختر نوع الكيان</option>
                        <option value="Client">عميل</option>
                        <option value="Investor">مستثمر</option>
                        {{-- <option value="Contractor">مقاول</option> --}}
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>اسم الكيان (ID) <span class="text-danger">*</span></label>
                    <select name="payable_id" id="payable_id" class="form-control" required>
                        <option value="">اختر الكيان</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>نوع الحركة <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="in">قبض (إيراد)</option>
                        <option value="out">صرف (مصروف)</option>
                    </select>
                </div>
            </div>

            {{-- عرض بيانات الكيان والمبلغ المتبقي --}}
            <div id="payable-info" class="alert alert-info d-none">
                <p><strong>الاسم:</strong> <span id="info-name"></span></p>
                <p><strong>المبلغ المتبقي (افتراضي):</strong> <span id="info-remaining">0.00 ILS</span></p>
            </div>

            <hr class="my-10">

            {{-- 2. تفاصيل المبلغ والعملة --}}
            <h4 class="mb-5 text-primary">2. تفاصيل المبلغ والعملة</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="amount">المبلغ <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0.01" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="currency">العملة <span class="text-danger">*</span></label>
                    <select name="currency" id="currency" class="form-control" required>
                        <option value="ILS">شيكل (ILS)</option>
                        <option value="USD">دولار (USD)</option>
                        <option value="JOD">دينار (JOD)</option>
                    </select>
                </div>
                <div class="col-md-4 form-group exchange-rate-box d-none" id="exchange-rate-group">
                    <label for="exchange_rate">سعر الصرف مقابل الشيكل <span class="text-danger">*</span></label>
                    <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.0001" value="1">
                    <small class="form-text text-muted">القيمة بالشيكل: <strong id="amount-ils-display">0.00 ILS</strong></small>
                </div>
            </div>

            <hr class="my-10">

            {{-- 3. طريقة الدفع وتفاصيلها --}}
            <h4 class="mb-5 text-primary">3. طريقة الدفع</h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="method">طريقة الدفع <span class="text-danger">*</span></label>
                    <select name="method" id="method" class="form-control" required>
                        <option value="cash">نقدي</option>
                        <option value="bank_transfer">تحويل بنكي</option>
                        <option value="check">شيك</option>
                    </select>
                </div>
            </div>

            <div id="payment-details-container" class="payment-details-box">
                {{-- تفاصيل طريقة الدفع ستظهر هنا ديناميكياً --}}
            </div>

            <div class="form-group mt-5">
                <label for="notes">ملاحظات على القيد</label>
                <textarea name="notes" id="notes" class="form-control" rows="2"></textarea>
            </div>

        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">تسجيل الدفعة</button>
            <a href="{{ route('dashboard.payments.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document ).ready(function() {
        const clients = @json($clients);
        const investors = @json($investors);
        const banks = @json($banks);
        const bankAccounts = @json($bankAccounts);

        // ====================================================================
        // 1. منطق تحديد الكيان (Client/Investor)
        // ====================================================================

        $('#payable_type').on('change', function() {
            const type = $(this).val();
            const payableIdSelect = $('#payable_id');
            payableIdSelect.empty().append('<option value="">اختر الكيان</option>');
            $('#payable-info').addClass('d-none');

            let data = [];
            if (type === 'Client') {
                data = clients;
            } else if (type === 'Investor') {
                data = investors;
            }

            data.forEach(item => {
                payableIdSelect.append(`<option value="${item.id}" data-name="${item.name}" data-unique-id="${item.unique_id}">${item.name} (${item.unique_id})</option>`);
            });
        });

        $('#payable_id').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            if (selectedOption.val()) {
                const name = selectedOption.data('name');
                // المبلغ المتبقي يجب أن يتم جلبه عبر AJAX في تطبيق حقيقي
                const remaining = '15,000.00 ILS'; // قيمة افتراضية

                $('#info-name').text(name);
                $('#info-remaining').text(remaining);
                $('#payable-info').removeClass('d-none');
            } else {
                $('#payable-info').addClass('d-none');
            }
        });

        // ====================================================================
        // 2. منطق معالجة العملات
        // ====================================================================

        function calculateILS() {
            const amount = parseFloat($('#amount').val()) || 0;
            const currency = $('#currency').val();
            let exchangeRate = parseFloat($('#exchange_rate').val()) || 1;

            if (currency === 'ILS') {
                $('#exchange-rate-group').addClass('d-none');
                $('#exchange_rate').val(1);
                exchangeRate = 1;
            } else {
                $('#exchange-rate-group').removeClass('d-none');
            }

            const amountILS = (amount * exchangeRate).toFixed(2);
            $('#amount-ils-display').text(amountILS + ' ILS');
        }

        $('#amount, #currency, #exchange_rate').on('input change', calculateILS);
        calculateILS(); // تشغيل عند التحميل

        // ====================================================================
        // 3. منطق تفاصيل طريقة الدفع
        // ====================================================================

        function renderPaymentDetails(method) {
            const container = $('#payment-details-container');
            container.empty();

            let html = '';

            if (method === 'cash') {
                html = `
                    <h5 class="text-success">تفاصيل الدفع النقدي</h5>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>من سلم المبلغ <span class="text-danger">*</span></label>
                            <input type="text" name="delivered_by" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>من استلم المبلغ <span class="text-danger">*</span></label>
                            <input type="text" name="received_by" class="form-control" required>
                        </div>
                    </div>
                `;
            } else if (method === 'check') {
                html = `
                    <h5 class="text-warning">تفاصيل الشيك</h5>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>رقم الشيك <span class="text-danger">*</span></label>
                            <input type="text" name="check_number" class="form-control" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>تاريخ الاستحقاق <span class="text-danger">*</span></label>
                            <input type="date" name="due_date" class="form-control" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>نوع الشيك</label>
                            <select name="check_type" class="form-control">
                                <option value="personal">شخصي</option>
                                <option value="certified">مصرفي/مصدق</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>اسم مالك الشيك <span class="text-danger">*</span></label>
                        <input type="text" name="check_owner" class="form-control" required>
                    </div>
                `;
            } else if (method === 'bank_transfer') {
                let accountOptions = '<option value="">اختر حساب بنكي</option>';
                bankAccounts.forEach(acc => {
                    accountOptions += `<option value="${acc.id}">${acc.account_number} - ${acc.bank.name}</option>`;
                });

                html = `
                    <h5 class="text-info">تفاصيل التحويل البنكي</h5>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>الحساب المرسل <span class="text-danger">*</span></label>
                            <select name="sender_bank_account_id" class="form-control" required>
                                ${accountOptions}
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>الحساب المستقبل <span class="text-danger">*</span></label>
                            <select name="receiver_bank_account_id" class="form-control" required>
                                ${accountOptions}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>مرجع التحويل</label>
                        <input type="text" name="transaction_reference" class="form-control">
                    </div>
                `;
            }

            container.html(html);
        }

        $('#method').on('change', function() {
            renderPaymentDetails($(this).val());
        });

        // تشغيل عند التحميل الافتراضي (نقدي)
        renderPaymentDetails($('#method').val());
    });
</script>
@endpush
