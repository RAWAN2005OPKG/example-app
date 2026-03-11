@extends('layouts.container')
@section('title', 'إضافة عميل جديد')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    .unit-sale-item { border-right: 4px solid #1BC5BD; padding: 1.5rem; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 1.5rem; }
    .select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; }
    .details-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; background-color: #ffffff; padding: 1rem; border-radius: 8px; margin-top: 1rem; border: 1px solid #e9ecef; }
</style>
@endpush
@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header"><h3 class="card-title">إضافة عميل جديد وعقود البيع</h3></div>
    <form action="{{ route('dashboard.clients.store') }}" method="POST" id="client-form">
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

            <h4 class="mb-5 text-primary">1. بيانات العميل</h4>
            <div class="row">
                <div class="col-md-6 form-group"><label>اسم العميل <span class="text-danger">*</span></label><input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
                <div class="col-md-6 form-group"><label>رقم الجوال</label><input type="text" name="phone" class="form-control" value="{{ old('phone') }}"></div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group"><label>رقم الهوية</label><input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}"></div>
                <div class="col-md-6 form-group"><label>العنوان</label><input type="text" name="address" class="form-control" value="{{ old('address') }}"></div>
            </div>

            <hr class="my-10">

            <h4 class="mb-5 text-primary">2. الوحدات المشتراة</h4>
            <div id="contracts-container"></div>
            <button type="button" id="add-contract-btn" class="btn btn-success btn-sm mt-3"><i class="fas fa-plus"></i> إضافة عقد بيع</button>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary mr-2">حفظ البيانات</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document ).ready(function() {
        let contractIndex = 0;
        const availableUnits = @json($availableUnits);
        let cleaveInstances = {};

        function applyCleave(selector, index) {
            cleaveInstances[index] = new Cleave(selector, { numeral: true, numeralThousandsGroupStyle: 'thousand' });
        }

        function calculateILS(index) {
            const cleave = cleaveInstances[index];
            if (!cleave) return;
            const amount = parseFloat(cleave.getRawValue()) || 0;
            const currency = $(`#currency_${index}`).val();
            const exchangeRateInput = $(`#exchange_rate_${index}`);
            let exchangeRate = parseFloat(exchangeRateInput.val()) || 1;
            if (currency === 'ILS') {
                exchangeRateInput.val(1).closest('.form-group').hide();
                exchangeRate = 1;
            } else {
                exchangeRateInput.closest('.form-group').show();
            }
            const amountILS = amount * exchangeRate;
            $(`#total_amount_ils_display_${index}`).val(new Intl.NumberFormat('en-US').format(amountILS.toFixed(2)));
            $(`#total_amount_ils_${index}`).val(amountILS.toFixed(2));
        }

        function showUnitDetails(selectElement) {
            const unitId = $(selectElement).val();
            const detailsContainer = $(selectElement).closest('.unit-sale-item').find('.unit-details-display');
            if (unitId) {
                const unit = availableUnits.find(u => u.id == unitId);
                if (unit) {
                    detailsContainer.html(`
                        <div><strong>الطابق:</strong> ${unit.floor || 'N/A'}</div>
                        <div><strong>موقف:</strong> ${unit.has_parking ? 'نعم' : 'لا'}</div>
                        <div><strong>التشطيب:</strong> ${unit.finish_type === 'finished' ? 'مشطب' : 'عظم'}</div>
                    `).show();
                }
            } else {
                detailsContainer.hide().empty();
            }
        }

        function addContractField(contract = {}) {
            const currentIndex = contractIndex;
            let unitOptions = '<option value="">اختر وحدة...</option>';
            availableUnits.forEach(unit => {
                unitOptions += `<option value="${unit.id}" ${contract.unit_id == unit.id ? 'selected' : ''}>[${unit.project.name}] - ${unit.unit_number}</option>`;
            });

            const contractHtml = `
                <div class="unit-sale-item" data-index="${currentIndex}">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>تفاصيل العقد #${currentIndex + 1}</h5>
                        <button type="button" class="btn btn-danger btn-sm remove-item-btn"><i class="fas fa-trash"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group"><label>الوحدة المشتراة <span class="text-danger">*</span></label><select name="contracts[${currentIndex}][unit_id]" class="form-control unit-select" required>${unitOptions}</select></div>
                        <div class="col-md-6 form-group"><label>تاريخ البيع <span class="text-danger">*</span></label><input type="date" name="contracts[${currentIndex}][sale_date]" class="form-control" value="${contract.sale_date || new Date().toISOString().slice(0, 10)}" required></div>
                    </div>
                    <div class="details-grid unit-details-display" style="display: none;"></div>
                    <div class="row mt-3">
                        <div class="col-md-3 form-group"><label>مبلغ البيع <span class="text-danger">*</span></label><input type="text" id="total_amount_formatted_${currentIndex}" class="form-control" value="${contract.total_amount || ''}" required><input type="hidden" name="contracts[${currentIndex}][total_amount]" id="total_amount_${currentIndex}"></div>
                        <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="contracts[${currentIndex}][currency]" id="currency_${currentIndex}" class="form-control currency-select" data-index="${currentIndex}" required><option value="USD" ${contract.currency === 'USD' ? 'selected' : ''}>USD</option><option value="JOD" ${contract.currency === 'JOD' ? 'selected' : ''}>JOD</option><option value="ILS" ${contract.currency === 'ILS' ? 'selected' : ''}>ILS</option></select></div>
                        <div class="col-md-3 form-group"><label>سعر الصرف</label><input type="number" name="contracts[${currentIndex}][exchange_rate]" id="exchange_rate_${currentIndex}" class="form-control exchange-rate" data-index="${currentIndex}" step="0.0001" value="${contract.exchange_rate || '3.75'}"></div>
                        <div class="col-md-3 form-group"><label>القيمة بالشيكل</label><input type="text" id="total_amount_ils_display_${currentIndex}" class="form-control" readonly><input type="hidden" name="contracts[${currentIndex}][total_amount_ils]" id="total_amount_ils_${currentIndex}"></div>
                    </div>
                    <div class="row"><div class="col-md-4 form-group"><label>دفعة مقدمة (بنفس العملة)</label><input type="number" name="contracts[${currentIndex}][down_payment]" class="form-control" value="${contract.down_payment || '0'}" step="0.01"></div></div>
                </div>`;
            $('#contracts-container').append(contractHtml);
            const newSelect = $(`select[name="contracts[${currentIndex}][unit_id]"]`);
            newSelect.select2({ placeholder: "ابحث عن وحدة..." });
            applyCleave($(`#total_amount_formatted_${currentIndex}`)[0], currentIndex);
            calculateILS(currentIndex);
            showUnitDetails(newSelect[0]);
            contractIndex++;
        }

        $('#add-contract-btn').on('click', () => addContractField());
        $(document).on('click', '.remove-item-btn', function() { if (confirm('هل أنت متأكد؟')) $(this).closest('.unit-sale-item').remove(); });
        $(document).on('input change', '.currency-select, .exchange-rate', function() { calculateILS($(this).closest('.unit-sale-item').data('index')); });
        $(document).on('input', 'input[id^="total_amount_formatted_"]', function() { calculateILS($(this).closest('.unit-sale-item').data('index')); });
        $(document).on('change', '.unit-select', function() { showUnitDetails(this); });

        const oldContracts = @json(old('contracts')) || [];
        oldContracts.length > 0 ? oldContracts.forEach(c => addContractField(c)) : addContractField();

        $('#client-form').on('submit', function() {
            $('.unit-sale-item').each(function() {
                const index = $(this).data('index');
                if (cleaveInstances[index]) $(`#total_amount_${index}`).val(cleaveInstances[index].getRawValue());
                calculateILS(index);
            });
            return true;
        });
    });
</script>
@endpush
