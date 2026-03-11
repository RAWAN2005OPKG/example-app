@extends('layouts.container')
@section('title', 'إدارة النقدية (الخزنة)')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">كشف حساب الخزنة (الرصيد الحالي: <span class="text-primary font-weight-bolder">{{ number_format($currentBalance, 2) }} ILS</span>)</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.cash.trash') }}" class="btn btn-danger mr-2"><i class="la la-trash"></i> سلة المحذوفات</a>
            <a href="{{ route('dashboard.cash.export') }}" class="btn btn-success mr-2"><i class="la la-file-excel"></i> تصدير Excel</a>
            <a href="{{ route('dashboard.cash.create') }}" class="btn btn-primary"><i class="la la-plus"></i> إضافة حركة جديدة</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        <form method="GET" action="{{ route('dashboard.cash.index') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث برقم السند، البيان، أو التفاصيل..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">بحث</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>رقم السند</th>
                        <th>التاريخ</th>
                        <th>المصدر/البيان</th>
                        <th class="text-center">إيداع (شيكل)</th>
                        <th class="text-center">سحب (شيكل)</th>
                        <th>الرصيد (شيكل)</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactionsWithBalance as $transaction)
                        <tr class="{{ $transaction->type == 'in' ? 'table-success-light' : 'table-danger-light' }}">
                            <td class="font-weight-bold">{{ $transaction->voucher_id }}</td>
                            <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                            <td><a href="{{ route('dashboard.cash.show', $transaction->id) }}">{{ $transaction->source }}</a></td>
                            <td class="text-center">@if($transaction->type == 'in') <span class="font-weight-bold text-success">+ {{ number_format($transaction->amount_ils, 2) }}</span> @else - @endif</td>
                            <td class="text-center">@if($transaction->type == 'out') <span class="font-weight-bold text-danger">- {{ number_format($transaction->amount_ils, 2) }}</span> @else - @endif</td>
                            <td class="font-weight-bolder">{{ number_format($transaction->balance, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.cash.edit', $transaction->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="تعديل"><i class="la la-edit"></i></a>
                                <form action="{{ route('dashboard.cash.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من نقل الحركة إلى سلة المحذوفات؟');" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="حذف"><i class="la la-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center py-5">لا توجد حركات نقدية لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-success-light { background-color: #e8fff3 !important; }
    .table-danger-light { background-color: #fff5f8 !important; }
    .table-info-light { background-color: #f1faff !important; }
</style>
@endpush
