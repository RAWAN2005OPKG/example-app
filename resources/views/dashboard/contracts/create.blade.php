@extends('layouts.container')
@section('title', 'إضافة عقد جديد')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-section { background-color: #f8f9fa; padding: 20px; border-radius: 12px; margin-bottom: 25px; border: 1px solid #e9ecef; }
    .form-section-title { font-size: 1.3rem; color: #4f46e5; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb; }
    .select2-container .select2-selection--single { height: calc(1.5em + 1.3rem + 2px ) !important; display: flex; align-items: center; }
</style>
@endpush

@section('content')
<main class="main-content" style="padding-top: 40px;">
    <div class="card card-custom" style="max-width: 900px; margin: auto;">
        <div class="card-header"><h3 class="card-title">نموذج إضافة عقد جديد</h3></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
            @endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

            <form action="{{ route('dashboard.contracts.store') }}" method="POST" enctype="multipart/form-data" id="contract-form">
                @csrf
                <input type="hidden" name="contractable_type" id="contractable_type_hidden" value="{{ old('contractable_type') }}">

                <div class="form-section">
                    <h4 class="form-section-title">1. تحديد صاحب العقد</h4>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="entity_type_selector">نوع الكيان <span class="text-danger">*</span></label>
                            <select id="entity_type_selector" class="form-control" required>
                                <option value="">-- اختر نوع الكيان --</option>
                                <option value="Client" @selected(old('contractable_type') == 'Client')>عميل</option>
                                <option value="Investor" @selected(old('contractable_type') == 'Investor')>مستثمر</option>
                                <option value="Subcontractor" @selected(old('contractable_type') == 'Subcontractor')>مقاول / مورد</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="contractable_id">ابحث عن الكيان <span class="text-danger">*</span></label>
                            <select name="contractable_id" id="contractable_id" class="form-control" required disabled></select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h4 class="form-section-title">2. تفاصيل العقد</h4>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3"><label>تاريخ العقد <span class="text-danger">*</span></label><input type="date" name="contract_date" class="form-control" value="{{ old('contract_date', date('Y-m-d')) }}" required></div>
                        <div class="col-md-6 form-group mb-3"><label>المشروع المرتبط</label>
                            <select name="project_id" class="form-control">
                                <option value="">-- لا يوجد --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" @selected(old('project_id') == $project->id)>{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label>قيمة العقد <span class="text-danger">*</span></label>
                            <input type="text" id="contract_value_formatted" class="form-control" value="{{ old('contract_value') }}" required>
                            <input type="hidden" name="contract_value" id="contract_value" value="{{ old('contract_value') }}">
                        </div>
                        <div class="col-md-3 form-group mb-3"><label>العملة <span class="text-danger">*</span></label>
                            <select name="currency" id="currency" class="form-control" required>
                                <option value="ILS" @selected(old('currency') == 'ILS')>شيكل</option>
                                <option value="USD" @selected(old('currency') == 'USD')>دولار</option>
                                <option value="JOD" @selected(old('currency') == 'JOD')>دينار</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-3"><label>سعر الصرف <span class="text-danger">*</span></label>
                            <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" step="0.0001" value="{{ old('exchange_rate', 1) }}" required>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label>القيمة بالشيكل</label>
                            <input type="text" id="ils_value_display" class="form-control" readonly style="background-color: #e9ecef; text-align: left;">
                        </div>
                        <div class="col-12 form-group mb-3"><label>تفاصيل العقد</label><textarea name="contract_details" class="form-control" rows="3">{{ old('contract_details') }}</textarea></div>
                        <div class="col-12 form-group mb-3"><label>إرفاق ملف العقد</label><input type="file" name="attachment" class="form-control"></div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">حفظ العقد</button>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
$(document ).ready(function() {
    const entityTypeSelector = $('#entity_type_selector');
    const contractableTypeHidden = $('#contractable_type_hidden');
    const contractableIdSelect = $('#contractable_id');
    const exchangeRates = {'USD': 3.75, 'JOD': 5.20, 'ILS': 1};

    function setupSelect2(entityType) {
        contractableIdSelect.prop('disabled', false).select2({
            placeholder: `ابحث بالاسم أو ID...`,
            allowClear: true,
            ajax: {
                url: "{{ route('dashboard.contracts.getContractables') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) { return { q: params.term, type: entityType }; },
                processResults: function (data) { return { results: data.items }; },
                cache: true
            }
        });
    }

    entityTypeSelector.on('change', function() {
        const selectedType = $(this).val();
        contractableTypeHidden.val(selectedType);
        contractableIdSelect.empty().val(null).trigger('change');
        if (selectedType) { setupSelect2(selectedType); } else { contractableIdSelect.prop('disabled', true); }
    });

    var cleave = new Cleave('#contract_value_formatted', { numeral: true, numeralThousandsGroupStyle: 'thousand' });

    function calculateILS() {
        const rawValue = parseFloat(cleave.getRawValue()) || 0;
        const rate = parseFloat($('#exchange_rate').val()) || 1;
        const ilsValue = rawValue * rate;
        $('#ils_value_display').val(new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(ilsValue) + ' ILS');
    }

    $('#currency').on('change', function() {
        $('#exchange_rate').val(exchangeRates[$(this).val()] || 1);
        calculateILS();
    }).trigger('change');

    $('#contract_value_formatted, #exchange_rate').on('input', calculateILS);

    $('#contract-form').on('submit', function() {
        $('#contract_value').val(cleave.getRawValue());
        return true;
    });

    if (entityTypeSelector.val()) {
        entityTypeSelector.trigger('change');
        const oldId = "{{ old('contractable_id') }}";
        const oldType = "{{ old('contractable_type') }}";
        if (oldId && oldType) {
            $.ajax({
                type: 'GET',
                url: "{{ route('dashboard.contracts.getContractables') }}",
                data: { id: oldId, type: oldType }
            }).then(function (data) {
                if (data.items && data.items.length > 0) {
                    const option = new Option(data.items[0].text, data.items[0].id, true, true);
                    contractableIdSelect.append(option).trigger('change');
                }
            });
        }
    }

    calculateILS();
});
</script>
@endpush