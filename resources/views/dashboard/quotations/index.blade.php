@extends('layouts.container')
@section('title', 'عروض الأسعار')
  @section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared-styles.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-file-invoice"></i> عروض الأسعار</h1>
        <div class="header-actions">
            <a href="{{-- route('dashboard.quotations.create') --}}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة عرض سعر</a>
        </div>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card"><div class="label">قيمة العروض النشطة</div><div class="value text-info">ج.م 0.00</div></div>
        <div class="kpi-card"><div class="label">عروض مرسلة</div><div class="value">0</div></div>
        <div class="kpi-card"><div class="label">عروض مقبولة</div><div class="value text-success">0</div></div>
        <div class="kpi-card"><div class="label">مسودات</div><div class="value">0</div></div>
    </div>

    <div class="table-container">
        <div class="table-controls">
            <form action="#" method="GET" class="search-form">
                <input type="text" name="search" class="form-control" placeholder="ابحث برقم العرض أو اسم العميل...">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
            <div class="status-filters">
                <a href="#" class="btn btn-sm btn-info">الكل</a>
                <a href="#" class="btn btn-sm btn-light">مسودة</a>
                <a href="#" class="btn btn-sm btn-light">مرسلة</a>
                <a href="#" class="btn btn-sm btn-light">مقبولة</a>
                <a href="#" class="btn btn-sm btn-light">مرفوضة</a>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>رقم العرض</th>
                        <th>العميل</th>
                        <th>تاريخ الإصدار</th>
                        <th>تاريخ الانتهاء</th>
                        <th>الإجمالي</th>
                        <th>الحالة</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="7" class="text-center" style="padding: 2rem;">لا توجد عروض أسعار لعرضها.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
