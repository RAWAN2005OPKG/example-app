@extends('layouts.container')

@section('title', 'تفاصيل العقد رقم: ' . ($contract->contract_id ?? $contract->id))

@push('styles')
<style>
    .main-content { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 15px; }
    .page-header h1 { font-size: 2.2rem; font-weight: 700; color: #1f2937; }
    .kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .kpi-card { background-color: #ffffff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1); }
    .kpi-card .label { color: #6b7280; margin-bottom: 10px; font-size: 1rem; }
    .kpi-card .value { font-size: 2rem; font-weight: 700; }
    .card-custom { border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.05); }
    .card-header-custom { background-color: #f9fafb; padding: 15px 20px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; }
    .card-header-custom h4 { margin: 0; font-weight: 600; color: #111827; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th, .data-table td { padding: 12px 15px; text-align: right; border-bottom: 1px solid #e5e7eb; }
    .data-table th { font-weight: 600; color: #6b7280; background-color: #f9fafb; font-size: 0.85rem; text-transform: uppercase; }
    .data-table tbody tr:last-child td { border-bottom: none; }
    .badge-custom { padding: 0.4em 0.8em; border-radius: 20px; font-weight: 600; font-size: 0.8rem; }
</style>
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-file-contract text-primary"></i> تفاصيل العقد</h1>
    </div>

    @php
        // ===== الكود المصحح والنهائي =====
        $payable = $contract->contractable;
        $payments = collect(); // إنشاء مجموعة فارغة كقيمة افتراضية

        if ($payable) {
            // إذا كان صاحب العقد موجوداً، جلب دفعاته
            $payments = $payable->payments()->latest('payment_date')->get();
        } else {
            // إذا كان صاحب العقد غير موجود (null)، نستخدم كائناً وهمياً
            $payable = new class {
                public $total_due = 0;
                public $total_paid = 0;
                public $remaining_balance = 0;
                public $name = 'صاحب العقد محذوف أو غير موجود';
                public $id_number = '-';
                public $id = 0;
                // هذه الدالة ستحل المشكلة مباشرة
                public function getMorphClass() { return 'غير معروف'; }
            };
        }
    @endphp

    {{-- ملخص المبالغ المالية --}}
    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="label">إجمالي المستحق</div>
            <div class="value text-info">{{ number_format($payable->total_due ?? 0, 2) }} ILS</div>
        </div>
        <div class="kpi-card">
            <div class="label">إجمالي المدفوع</div>
            <div class="value text-success">{{ number_format($payable->total_paid ?? 0, 2) }} ILS</div>
        </div>
        <div class="kpi-card">
            <div class="label">الرصيد المتبقي</div>
            <div class="value text-danger">{{ number_format($payable->remaining_balance ?? 0, 2) }} ILS</div>
        </div>
    </div>

    {{-- تفاصيل العقد الأساسية --}}
    <div class="card card-custom mb-4">
        <div class="card-header-custom"><h4>معلومات العقد الأساسية</h4></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3"><strong>صاحب العقد:</strong> {{ $payable->name }} ({{ str_replace('App\\Models\\', '', $payable->getMorphClass()) }})</div>
                <div class="col-md-6 mb-3"><strong>رقم الهوية:</strong> {{ $payable->id_number }}</div>
                <div class="col-md-6 mb-3"><strong>المشروع المرتبط:</strong> {{ $contract->project->name ?? '-' }}</div>
                <div class="col-md-6 mb-3"><strong>تاريخ العقد:</strong> {{ $contract->contract_date ? $contract->contract_date->format('Y-m-d') : '-' }}</div>
            </div>
            @if($contract->contract_details)
                <hr><p><strong>تفاصيل العقد:</strong> {{ $contract->contract_details }}</p>
            @endif
        </div>
    </div>

    {{-- جدول الدفعات --}}
    <div class="card card-custom">
        <div class="card-header-custom">
            <h4 class="m-0">كشف حساب الكيان</h4>
            @if($payable->id > 0)
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> إضافة قيد جديد
                </a>
            @endif
        </div>
        <div class="card-body p-0">
            @if ($payments->isEmpty())
                <p class="text-center text-muted py-5">لم يتم تسجيل أي دفعات لهذا الكيان بعد.</p>
            @else
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>تاريخ القيد</th>
                                <th>النوع</th>
                                <th>المبلغ الأصلي</th>
                                <th>القيمة (ILS)</th>
                                <th>الطريقة</th>
                                <th>ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                                    <td>
                                        @if($payment->type == 'in')
                                            <span class="badge badge-light-success badge-custom">قبض</span>
                                        @else
                                            <span class="badge badge-light-danger badge-custom">صرف</span>
                                        @endif
                                    </td>
                                    <td><strong>{{ number_format($payment->amount, 2) }}</strong> {{ $payment->currency }}</td>
                                    <td class="font-weight-bolder">{{ number_format($payment->amount_ils, 2) }}</td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->notes ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
