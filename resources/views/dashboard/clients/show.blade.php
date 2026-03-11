@extends('layouts.container')
@section('title', 'ملف العميل: ' . $client->name)

@push('styles')
<style>
    .kpi-card { background-color: #f3f6f9; padding: 1.5rem; border-radius: 0.75rem; text-align: center; }
    .kpi-card .label { color: #6c757d; font-weight: 500; }
    .kpi-card .value { font-size: 2rem; font-weight: 700; }
    .header-actions .btn { margin-left: 0.5rem; }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5 flex-wrap">
    <h1 class="h2">ملف العميل: {{ $client->name }}</h1>
    <div class="header-actions">

        <a href="{{ route('dashboard.clients.index') }}" class="btn btn-secondary btn-sm">
            <i class="la la-list"></i> العودة للقائمة
        </a>

        <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-warning btn-sm">
            <i class="la la-edit"></i> تعديل
        </a>
        <a href="{{ route('dashboard.clients.export.excel', ['client_id' => $client->id]) }}" class="btn btn-success btn-sm">
            <i class="la la-file-excel"></i> تصدير Excel
        </a>
        <a href="{{ route('dashboard.clients.export.word', $client->id) }}" class="btn btn-info btn-sm">
            <i class="la la-file-word"></i> تصدير Word
        </a>
        <button onclick="window.print()" class="btn btn-light-primary btn-sm">
            <i class="la la-print"></i> طباعة
        </button>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-4"><div class="kpi-card"><div class="label">إجمالي المستحق</div><div class="value text-primary">{{ number_format($client->total_due_ils, 2) }} ILS</div></div></div>
    <div class="col-md-4"><div class="kpi-card"><div class="label">إجمالي المدفوع</div><div class="value text-success">{{ number_format($client->total_paid_ils, 2) }} ILS</div></div></div>
    <div class="col-md-4"><div class="kpi-card"><div class="label">الرصيد المتبقي</div><div class="value text-danger">{{ number_format($client->remaining_balance, 2) }} ILS</div></div></div>
</div>

<div class="card card-custom gutter-b">
    <div class="card-header card-header-tabs-line">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details">البيانات الأساسية</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contracts">العقود</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payments">كشف الحساب (الدفعات)</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                <p><strong>ID:</strong> {{ $client->unique_id }}</p>
                <p><strong>رقم الهوية:</strong> {{ $client->id_number ?? '-' }}</p>
                <p><strong>الجوال:</strong> {{ $client->phone ?? '-' }}</p>
                <p><strong>العنوان:</strong> {{ $client->address ?? '-' }}</p>
            </div>
            <div class="tab-pane" id="contracts">
                @forelse($client->contracts as $contract)
                    <div class="mb-3 p-3 border rounded">
<h5>عقد الوحدة: {{ $contract->projectUnit?->unit_number ?? 'غير محددة' }} في مشروع ({{ $contract->projectUnit?->project?->name ?? 'غير محدد' }})</h5>
                        <p>قيمة العقد: {{ number_format($contract->total_amount, 2) }} {{ $contract->currency }}</p>
                    </div>
                @empty
                    <p>لا توجد عقود مسجلة لهذا العميل.</p>
                @endforelse
            </div>
            <div class="tab-pane" id="payments">
                <a href="{{ route('dashboard.payments.create', ['payable_type' => 'Client', 'payable_id' => $client->id]) }}" class="btn btn-success btn-sm mb-4">إضافة دفعة جديدة</a>
                <table class="table">
                    <thead><tr><th>التاريخ</th><th>النوع</th><th>المبلغ</th><th>الطريقة</th><th>ملاحظات</th></tr></thead>
                    <tbody>
                        @forelse($client->payments as $payment)
                        <tr>
                            <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                            <td><span class="badge badge-light-{{ $payment->type == 'in' ? 'success' : 'danger' }}">{{ $payment->type == 'in' ? 'قبض' : 'صرف' }}</span></td>
                            <td>{{ number_format($payment->amount_ils, 2) }} ILS</td>
                            <td>{{ $payment->method }}</td>
                            <td>{{ $payment->notes }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">لا توجد دفعات مسجلة.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
