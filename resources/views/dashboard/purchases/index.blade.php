@extends('layouts.container')
@section('title', 'فواتير الشراء')
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title"><h3 class="card-label">فواتير الشراء</h3></div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.purchases.create') }}" class="btn btn-primary font-weight-bolder"><i class="fas fa-plus"></i> إضافة فاتورة شراء</a>
        </div>
    </div>
    <div class="card-body">
        {{-- جدول عرض فواتير الشراء --}}
        <div class="table-responsive">
            <table class="table table-head-custom table-hover">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>المورد</th>
                        <th>التاريخ</th>
                        <th>الإجمالي</th>
                        <th>المدفوع</th>
                        <th>المتبقي</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- هنا يتم عرض البيانات من الكنترولر --}}
                    <tr><td colspan="7" class="text-center p-5 text-muted">لا توجد فواتير شراء لعرضها.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
