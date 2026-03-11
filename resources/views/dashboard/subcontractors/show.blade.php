@extends('layouts.container')
@section('title', 'ملف المورد: ' . $subcontractor->name)

@push('styles')
<style>
    .kpi-card {
        background-color: #f3f6f9;
        border: 1px solid #e5e5e5;
        padding: 1.5rem;
        border-radius: 0.75rem;
        text-align: center;
        margin-bottom: 1rem;
    }
    .kpi-card .label {
        color: #6c757d;
        font-weight: 500;
        font-size: 1rem;
    }
    .kpi-card .value {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.2;
    }
    .header-actions .btn {
        margin-left: 0.5rem;
    }
    .contract-card {
        border-right: 4px solid #3699FF;
        background-color: #f8f9fa;
    }
</style>
@endpush

@section('content')
{{-- =================================================================== --}}
{{-- 1. رأس الصفحة (اسم المورد وأزرار الإجراءات) --}}
{{-- =================================================================== --}}
<div class="d-flex justify-content-between align-items-center mb-5 flex-wrap">
    <div>
        <h1 class="h2 mb-0">ملف المورد: {{ $subcontractor->name }}</h1>
        <span class="text-muted h5">({{ $subcontractor->specialization }})</span>
    </div>
    <div class="header-actions mt-3 mt-md-0">
        <a href="{{ route('dashboard.subcontractors.index') }}" class="btn btn-secondary btn-sm"><i class="la la-list"></i> العودة للقائمة</a>
        <a href="{{ route('dashboard.subcontractors.edit', $subcontractor->id) }}" class="btn btn-warning btn-sm"><i class="la la-edit"></i> تعديل</a>
    </div>
</div>

{{-- =================================================================== --}}
{{-- 2. بطاقات الملخص المالي (KPIs) --}}
{{-- =================================================================== --}}
<div class="row mb-5">
    <div class="col-md-4">
        <div class="kpi-card">
            <div class="label">إجمالي قيمة العقود</div>
            <div class="value text-primary">{{ number_format($subcontractor->total_contracts_value, 2) }} ILS</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="kpi-card">
            <div class="label">إجمالي المدفوع</div>
            <div class="value text-success">{{ number_format($subcontractor->total_paid, 2) }} ILS</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="kpi-card">
            <div class="label">الرصيد المتبقي</div>
            <div class="value text-danger">{{ number_format($subcontractor->remaining_balance, 2) }} ILS</div>
        </div>
    </div>
</div>

{{-- =================================================================== --}}
{{-- 3. التبويبات (البيانات، العقود، الدفعات) --}}
{{-- =================================================================== --}}
<div class="card card-custom gutter-b">
    <div class="card-header card-header-tabs-line">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details_tab">البيانات الأساسية</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contracts_tab">العقود ({{ $subcontractor->contracts->count() }})</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payments_tab">كشف الحساب / الدفعات ({{ $subcontractor->payments->count() }})</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            {{-- تبويب البيانات الأساسية --}}
            <div class="tab-pane active" id="details_tab">
                <p><strong>الرقم التعريفي (ID):</strong> {{ $subcontractor->unique_id }}</p>
                <p><strong>رقم الهوية/الشركة:</strong> {{ $subcontractor->id_number ?? '-' }}</p>
                <p><strong>رقم الجوال:</strong> {{ $subcontractor->phone ?? '-' }}</p>
                <hr>
                <p><strong>ملاحظات:</strong></p>
                <p>{{ $subcontractor->notes ?? 'لا توجد ملاحظات.' }}</p>
            </div>

            {{-- تبويب العقود --}}
            <div class="tab-pane" id="contracts_tab">
                @forelse($subcontractor->contracts as $contract)
                    <div class="mb-4 p-4 border rounded contract-card">
                        <h5 class="font-weight-bold">عقد لمشروع: <a href="#">{{ $contract->project->name ?? 'غير محدد' }}</a></h5>
                        <div class="row">
                            <div class="col-md-4"><p class="mb-1"><strong>قيمة العقد:</strong> {{ number_format($contract->contract_value, 2) }} {{ $contract->currency }}</p></div>
                            <div class="col-md-4"><p class="mb-1"><strong>سعر الصرف:</strong> {{ $contract->exchange_rate }}</p></div>
                            <div class="col-md-4"><p class="mb-1"><strong>القيمة بالشيكل:</strong> {{ number_format($contract->contract_value * $contract->exchange_rate, 2) }} ILS</p></div>
                        </div>
                        <p class="mb-1"><strong>تاريخ العقد:</strong> {{ $contract->contract_date->format('Y-m-d') }}</p>
                        <p class="mb-0 mt-2"><strong>التفاصيل:</strong> {{ $contract->contract_details ?? 'لا يوجد' }}</p>
                    </div>
                @empty
                    <div class="alert alert-secondary text-center">لا توجد عقود مسجلة لهذا المورد.</div>
                @endforelse
            </div>

            {{-- تبويب الدفعات (كشف الحساب) --}}
            <div class="tab-pane" id="payments_tab">
                <a href="{{ route('dashboard.supplier_expenses.create') }}" class="btn btn-success btn-sm mb-4"><i class="la la-plus"></i> إضافة دفعة جديدة لهذا المورد</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>تاريخ الدفعة</th>
                                <th class="text-right">المبلغ (ILS)</th>
                                <th>البيان (ملاحظات)</th>
                                <th>القائم بالعملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- تم التغيير إلى subcontractor->payments --}}
                            @forelse($subcontractor->payments as $payment)
                            <tr>
                                <td>{{ $payment->expense_date->format('Y-m-d') }}</td>
                                <td class="text-right font-weight-bold text-danger">{{ number_format($payment->amount, 2) }}</td>
                                <td>{{ $payment->notes ?? '-' }}</td>
                                <td>{{ $payment->paid_by ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5">لا توجد دفعات مسجلة لهذا المورد.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
