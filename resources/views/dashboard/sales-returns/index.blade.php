@extends('layouts.container')
@section('title', 'مردودات المبيعات')


  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush
@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-undo"></i> مردودات المبيعات</h1>
        <div class="header-actions">
            <button class="btn btn-primary"><i class="fas fa-plus"></i> إضافة مردود مبيعات</button>
        </div>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card"><div class="label">إجمالي قيمة المردودات</div><div class="value text-warning">ج.م 0.00</div></div>
        <div class="kpi-card"><div class="label">عدد المردودات</div><div class="value">0</div></div>
    </div>

    <div class="table-container">
        <div class="table-controls">
            <form action="#" method="GET" class="search-form">
                <input type="text" name="search" class="form-control" placeholder="ابحث برقم الإشعار أو العميل...">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>رقم المردود</th>
                        <th>العميل</th>
                        <th>التاريخ</th>
                        <th>الإجمالي</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($returns as $return)
                        <tr>
                            <td><strong>{{ $return->number }}</strong></td>
                            <td>{{ $return->customer->name ?? 'N/A' }}</td>
                            <td>{{ $return->return_date->format('Y-m-d') }}</td>
                            <td>{{ number_format($return->total_amount, 2) }} ج.م</td>
                            <td class="action-buttons no-print">
                                <a href="#" class="btn-icon" title="عرض"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn-icon" title="طباعة"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                    @empty --}}
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 2rem;">لا توجد مردودات مبيعات لعرضها.</td>
                        </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
