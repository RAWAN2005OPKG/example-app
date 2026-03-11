{{-- هذا الكود سيعرض أي رسالة خطأ عامة من المتحكم --}}
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h4 class="form-section-title">1. تفاصيل الحركة الأساسية</h4>

<div class="form-group row">
    <div class="col-lg-6">
        <label>نوع الحركة <span class="text-danger">*</span></label>
        <select name="type" id="transaction_type" class="form-control" required>
            <option value="">-- اختر النوع --</option>
            <option value="deposit" @selected(old('type', $transaction->type ?? '') == 'deposit')>إيداع</option>
            <option value="withdrawal" @selected(old('type', $transaction->type ?? '') == 'withdrawal')>سحب</option>
            <option value="transfer" @selected(old('type', $transaction->type ?? '') == 'transfer')>حوالة بنكية</option>
        </select>
    </div>
    <div class="col-lg-6">
        <label>تاريخ الحركة <span class="text-danger">*</span></label>
        <input type="date" name="transaction_date" class="form-control" value="{{ old('transaction_date', optional($transaction->transaction_date)->format('Y-m-d') ?? date('Y-m-d')) }}" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-6">
        <label>المبلغ <span class="text-danger">*</span></label>
        <input type="number" name="amount" class="form-control" placeholder="0.00" step="0.01" value="{{ old('amount', $transaction->amount ?? '') }}" required>
    </div>
    <div class="col-lg-6">
        <label>العملة</label>
        {{-- سيتم تحديث هذا الحقل تلقائياً، لذلك نجعله للقراءة فقط --}}
        <input type="text" id="currency_field" class="form-control" value="{{ old('currency', $transaction->currency ?? '') }}" readonly>
    </div>
</div>

<hr>

{{-- هذا القسم سيتم ملؤه ديناميكياً بواسطة JavaScript --}}
<div id="accounts_section">
    {{-- المحتوى الديناميكي سيظهر هنا --}}
</div>

<hr>

<h4 class="form-section-title mt-5">2. تفاصيل إضافية (اختياري)</h4>
<div class="form-group">
    <label>الوصف / التفاصيل</label>
    <textarea name="details" class="form-control" rows="3">{{ old('details', $transaction->details ?? '') }}</textarea>
</div>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const transactionTypeSelect = document.getElementById('transaction_type');
    const accountsSection = document.getElementById('accounts_section');
    const currencyField = document.getElementById('currency_field');

    // قوالب HTML لكل نوع
    const templates = {
        deposit: `
            <h4 class="form-section-title">إلى حساب (المستقبل)</h4>
            <div class="form-group">
                <label>الحساب البنكي الذي تم الإيداع فيه <span class="text-danger">*</span></label>
                <select name="bank_account_id" class="form-control form-control-select2 dynamic-account-select" required data-placeholder="اختر الحساب">
                    <option></option>
                    @foreach($bankAccounts as $account)
                        <option value="{{ $account->id }}" data-currency="{{ $account->currency }}" @selected(old('bank_account_id', $transaction->bank_account_id ?? '') == $account->id)>
                            {{ $account->account_name }} ({{ $account->bank->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>`,
        withdrawal: `
            <h4 class="form-section-title">من حساب (المرسل)</h4>
            <div class="form-group">
                <label>الحساب البنكي الذي تم السحب منه <span class="text-danger">*</span></label>
                <select name="bank_account_id" class="form-control form-control-select2 dynamic-account-select" required data-placeholder="اختر الحساب">
                    <option></option>
                    @foreach($bankAccounts as $account)
                        <option value="{{ $account->id }}" data-currency="{{ $account->currency }}" @selected(old('bank_account_id', $transaction->bank_account_id ?? '') == $account->id)>
                            {{ $account->account_name }} ({{ $account->bank->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>`,
        transfer: `
            <h4 class="form-section-title">تفاصيل الحوالة</h4>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>من حساب (المرسل) <span class="text-danger">*</span></label>
                    <select name="from_account_id" class="form-control form-control-select2 dynamic-account-select" required data-placeholder="اختر الحساب المرسل">
                        <option></option>
                        @foreach($bankAccounts as $account)
                            <option value="{{ $account->id }}" data-currency="{{ $account->currency }}" @selected(old('from_account_id', $transaction->from_account_id ?? '') == $account->id)>
                                {{ $account->account_name }} ({{ $account->bank->name ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>إلى حساب (المستقبل) <span class="text-danger">*</span></label>
                    <select name="to_account_id" class="form-control form-control-select2" required data-placeholder="اختر الحساب المستقبل">
                        <option></option>
                        @foreach($bankAccounts as $account)
                            <option value="{{ $account->id }}" @selected(old('to_account_id', $transaction->to_account_id ?? '') == $account->id)>
                                {{ $account->account_name }} ({{ $account->bank->name ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>`
    };

    function updateForm() {
        const selectedType = transactionTypeSelect.value;
        accountsSection.innerHTML = templates[selectedType] || '';
        // إعادة تهيئة مكتبة Select2 على الحقول الجديدة
        $('.form-control-select2').select2({ width: '100%' });

        // تحديث العملة فوراً إذا كان هناك قيمة قديمة
        const mainSelect = accountsSection.querySelector('.dynamic-account-select');
        if (mainSelect && mainSelect.value) {
            const selectedOption = mainSelect.options[mainSelect.selectedIndex];
            if (selectedOption.dataset.currency) {
                currencyField.value = selectedOption.dataset.currency;
            }
        }
    }

    function updateCurrency(event) {
        const selectedOption = event.target.options[event.target.selectedIndex];
        currencyField.value = selectedOption.dataset.currency || '';
    }

    // ربط الأحداث
    transactionTypeSelect.addEventListener('change', updateForm);
    $(document).on('change', '.dynamic-account-select', updateCurrency);

    // التشغيل الأولي عند تحميل الصفحة
    updateForm();
});
</script>
@endpush
