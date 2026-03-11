@extends('layouts.container')
@section('title', 'فواتير المبيعات')
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-receipt"></i> فواتير المبيعات</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> فاتورة جديدة</a>
        </div>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card"><div class="label">إجمالي الفواتير</div><div class="value">ج.م 0.00</div></div>
        <div class="kpi-card"><div class="label">المبالغ المدفوعة</div><div class="value text-success">ج.م 0.00</div></div>
        <div class="kpi-card"><div class="label">المبالغ المستحقة</div><div class="value text-danger">ج.م 0.00</div></div>
    </div>

    <div class="table-container">
        <div class="table-controls">
            <form action="#" method="GET" class="search-form">
                <input type="text" name="search" class="form-control" placeholder="ابحث برقم الفاتورة أو العميل...">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
            <div class="status-filters">
                <a href="#" class="btn btn-sm btn-info">الكل</a>
                <a href="#" class="btn btn-sm btn-light">مدفوعة</a>
                <a href="#" class="btn btn-sm btn-light">غير مدفوعة</a>
                <a href="#" class="btn btn-sm btn-light">مدفوعة جزئياً</a>
                <a href="#" class="btn btn-sm btn-light">متأخرة</a>
                <a href="#" class="btn btn-sm btn-light">مسودة</a>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>العميل</th>
                        <th>تاريخ الإصدار</th>
                        <th>تاريخ الاستحقاق</th>
                        <th>الإجمالي</th>
                        <th>المدفوع</th>
                        <th>المستحق</th>
                        <th>الحالة</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="9" class="text-center" style="padding: 2rem;">لا توجد فواتير لعرضها.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
