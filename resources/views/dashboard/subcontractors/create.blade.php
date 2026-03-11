@extends('layouts.container')
@section('title', 'إضافة مقاول/مورد جديد')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-hard-hat text-primary mr-2"></i> إضافة مقاول/مورد جديد</h3>
    </div>
    <form action="{{ route('dashboard.subcontractors.store') }}" method="POST" id="subcontractor-form">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>حدث خطأ!</strong>
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <h4 class="mb-5 text-dark">1. بيانات المقاول/المورد الأساسية</h4>
            <div class="row">
                <div class="col-md-6 form-group"><label>الاسم <span class="text-danger">*</span></label><input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="اسم الشركة أو الشخص" required></div>
                <div class="col-md-6 form-group"><label>التخصص <span class="text-danger">*</span></label><input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}" placeholder="مثال: بناء، كهرباء، توريد أسمنت" required></div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group"><label>رقم الهوية/الشركة</label><input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}"></div>
                <div class="col-md-6 form-group"><label>رقم الجوال</label><input type="text" name="phone" class="form-control" value="{{ old('phone') }}"></div>
            </div>
            <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea></div>

            <hr class="my-10">

            <h4 class="mb-5 text-dark">2. العقودات المرتبطة بالمشاريع (إن وجدت)</h4>
            <div id="contracts-container"></div>
            <button type="button" id="add-contract-btn" class="btn btn-primary btn-sm mt-3"><i class="fas fa-plus"></i> إضافة عقد جديد</button>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">حفظ المورد</button>
            <a href="{{ route('dashboard.subcontractors.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- إضافة مكتبة Swal --}}

<script>
$(document ).ready(function() {
    let contractIndex = 0;
    const projectsList = @json($projects);
    const exchangeRates = {'USD': 3.75, 'JOD': 5.20, 'ILS': 1};
    let cleaveInstances = {};

    function applyCleave(selector) {
        return new Cleave(selector, { numeral: true, numeralThousandsGroupStyle: 'thousand' });
    }

    function calculateILS(index) {
        const cleave = cleaveInstances[index];
        if (!cleave) return;

        const rawValue = parseFloat(cleave.getRawValue()) || 0;
        const currency = $(`#currency_${index}`).val();
        const exchangeRateInput = $(`#exchange_rate_${index}`);
        const exchangeRateGroup = exchangeRateInput.closest('.form-group');

        if (currency === 'ILS') {
            exchangeRateInput.val(1);
            exchangeRateGroup.hide();
        } else {
            exchangeRateGroup.show();
            if (parseFloat(exchangeRateInput.val()) === 1 || exchangeRateInput.val() === '') {
                exchangeRateInput.val(exchangeRates[currency] || 1);
            }
        }
        const rate = parseFloat(exchangeRateInput.val()) || 1;
        const amountILS = rawValue * rate;
        const formattedILS = new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(amountILS);
        $(`#amount_ils_display_${index}`).val(formattedILS + ' ILS');
    }

    function addContractField() {
        const currentIndex = contractIndex;
        let projectOptions = '<option value="">اختر مشروع...</option>';
        projectsList.forEach(p => { projectOptions += `<option value="${p.id}">${p.name}</option>`; });

        const contractHtml = `
            <div class="border p-4 mb-4 rounded shadow-sm contract-item" style="background-color: #f3f6f9;" data-index="${currentIndex}">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-primary">تفاصيل العقد #${currentIndex + 1}</h5>
                    <button type="button" class="btn btn-icon btn-sm btn-light-danger remove-contract-btn"><i class="fas fa-trash"></i></button>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group"><label>المشروع <span class="text-danger">*</span></label><select name="contracts[${currentIndex}][project_id]" class="form-control" required>${projectOptions}</select></div>
                    <div class="col-md-6 form-group"><label>تاريخ العقد <span class="text-danger">*</span></label><input type="date" name="contracts[${currentIndex}][contract_date]" class="form-control" value="{{ now()->toDateString() }}" required></div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label>قيمة العقد <span class="text-danger">*</span></label>
                        <input type="text" id="contract_value_formatted_${currentIndex}" class="form-control contract-value-input" required>
                        {{-- ======================================================== --}}
                        {{-- ===== هذا هو الحقل المخفي الذي سيحمل القيمة الصحيحة ===== --}}
                        {{-- ======================================================== --}}
                        <input type="hidden" name="contracts[${currentIndex}][contract_value]" id="contract_value_raw_${currentIndex}">
                    </div>
                    <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label>
                        <select name="contracts[${currentIndex}][currency]" id="currency_${currentIndex}" class="form-control currency-select" required>
                            <option value="ILS">شيكل (ILS)</option><option value="USD">دولار (USD)</option><option value="JOD">دينار (JOD)</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group"><label>سعر الصرف</label><input type="number" name="contracts[${currentIndex}][exchange_rate]" id="exchange_rate_${currentIndex}" class="form-control exchange-rate" step="0.0001" value="1"></div>
                    <div class="col-md-3 form-group"><label>القيمة بالشيكل (محسوبة)</label><input type="text" id="amount_ils_display_${currentIndex}" class="form-control text-success font-weight-bold" readonly style="background-color: #e9ecef;"></div>
                </div>
                <div class="form-group"><label>تفاصيل العقد</label><textarea name="contracts[${currentIndex}][contract_details]" class="form-control" rows="1" placeholder="اكتب تفاصيل العمل المطلوب..."></textarea></div>
            </div>`;
        $('#contracts-container').append(contractHtml);

        cleaveInstances[currentIndex] = applyCleave($(`#contract_value_formatted_${currentIndex}`)[0]);
        calculateILS(currentIndex);
        contractIndex++;
    }

    $('#add-contract-btn').on('click', addContractField);

    $(document).on('click', '.remove-contract-btn', function() {
        const button = $(this);
        Swal.fire({
            title: 'هل أنت متأكد؟', text: "سيتم حذف هذا العقد من النموذج الحالي.", icon: 'warning',
            showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذفه!', cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                const item = button.closest('.contract-item');
                const indexToRemove = item.data('index');
                delete cleaveInstances[indexToRemove];
                item.remove();
            }
        });
    });

    $(document).on('input change', '.contract-value-input, .currency-select, .exchange-rate', function() {
        const index = $(this).closest('.contract-item').data('index');
        calculateILS(index);
    });

    $('#subcontractor-form').on('submit', function(e) {
        // قبل إرسال النموذج
        $('.contract-item').each(function() {
            const index = $(this).data('index');
            const cleave = cleaveInstances[index];
            if (cleave) {
                const rawValue = cleave.getRawValue();
                // قم بتحديث قيمة الحقل المخفي الموجود مسبقاً
                $(`#contract_value_raw_${index}`).val(rawValue);
            }
        });
        return true; // اسمح للنموذج بالإرسال
    });

    addContractField(); // إضافة حقل عقد واحد عند تحميل الصفحة
});
</script>
@endpush
