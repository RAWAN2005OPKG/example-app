@extends('layouts.container')
@section('title', 'إدارة الجرد')
  @section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared-styles.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-clipboard-check"></i> إدارة الجرد</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.stocktakes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة جرد جديد</a>
        </div>
    </div>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>الرقم المرجعي</th>
                    <th>المستودع</th>
                    <th>التاريخ</th>
                    <th>عدد الأصناف</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stocktakes as $stocktake)
                <tr>
                    <td><strong>{{ $stocktake->reference_no }}</strong></td>
                    <td>{{ $stocktake->warehouse->name }}</td>
                    <td>{{ $stocktake->date->format('Y-m-d') }}</td>
                    <td>{{ $stocktake->items->count() }}</td>
                    <td><span class="badge badge-{{ $stocktake->status == 'draft' ? 'warning' : 'success' }}">{{ $stocktake->status == 'draft' ? 'مسودة' : 'مكتمل' }}</span></td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center" style="padding: 2rem;">لا توجد عمليات جرد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
