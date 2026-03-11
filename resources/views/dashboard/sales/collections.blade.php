@extends('layouts.container')
@section('title', 'تحصيل الفواتير')
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush


@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-hand-holding-usd"></i> تحصيل الفواتير</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> فاتورة جديدة</a>
        </div>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card"><div class="label">إجمالي المبالغ المستحقة</div><div class="value text-danger">{{ number_format($totalDue ?? 0, 2) }}</div></div>
        <div class="kpi-card"><div class="label">فواتير غير مدفوعة</div><div class="value">{{ $unpaidCount ?? 0 }}</div></div>
        <div class="kpi-card"><div class="label">فواتير متأخرة</div><div class="value text-warning">{{ $overdueCount ?? 0 }}</div></div>
    </div>

    <div class="table-container">
        <div class="table-controls">
            <form action="{{ route('dashboard.collections') }}" method="GET" class="search-form">
                <input type="text" name="search" class="form-control" placeholder="ابحث برقم الفاتورة أو العميل..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
            <div class="status-filters">
                <a href="{{ route('dashboard.collections') }}" class="btn btn-sm {{ !request('status') ? 'btn-info' : 'btn-light' }}">الكل</a>
                <a href="{{ route('dashboard.collections', ['status' => 'unpaid']) }}" class="btn btn-sm {{ request('status') == 'unpaid' ? 'btn-danger' : 'btn-light' }}">غير مدفوعة</a>
                <a href="{{ route('dashboard.collections', ['status' => 'partial']) }}" class="btn btn-sm {{ request('status') == 'partial' ? 'btn-warning' : 'btn-light' }}">مدفوعة جزئياً</a>
                <a href="{{ route('dashboard.collections', ['status' => 'overdue']) }}" class="btn btn-sm {{ request('status') == 'overdue' ? 'btn-danger' : 'btn-light' }}">متأخرة</a>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>العميل</th>
                        <th>تاريخ الاستحقاق</th>
                        <th>الإجمالي</th>
                        <th>المدفوع</th>
                        <th>المستحق</th>
                        <th>الحالة</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td><strong>{{ $invoice->number }}</strong></td>
                            <td>{{ $invoice->customer->name ?? 'N/A' }}</td>
                            <td>{{ $invoice->due_date->format('Y-m-d') }}</td>
                            <td>{{ number_format($invoice->total_amount, 2) }}</td>
                            <td>{{ number_format($invoice->paid_amount, 2) }}</td>
                            <td class="font-weight-bold text-danger">{{ number_format($invoice->total_amount - $invoice->paid_amount, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ $invoice->status_class ?? 'light' }}">
                                    {{ $invoice->status_name ?? $invoice->status }}
                                </span>
                            </td>
                            <td class="action-buttons no-print">
                                <button class="btn-icon" title="تسجيل دفعة"><i class="fas fa-dollar-sign"></i></button>
                                <a href="{{ route('dashboard.sales.show', $invoice->id) }}" class="btn-icon" title="عرض الفاتورة"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center" style="padding: 2rem;">لا توجد فواتير مستحقة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($invoices) && $invoices->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $invoices->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</main>
@endsection
