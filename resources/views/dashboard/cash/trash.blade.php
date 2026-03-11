@extends('layouts.container')
@section('title', 'سلة محذوفات النقدية')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">سلة محذوفات الحركات النقدية</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.cash.index') }}" class="btn btn-primary">العودة لكشف الحساب</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>البيان</th>
                        <th>القيمة (شيكل)</th>
                        <th>تاريخ الحذف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                        <td>{{ $transaction->source }}</td>
                        <td>{{ number_format($transaction->amount_ils, 2) }}</td>
                        <td>{{ $transaction->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('dashboard.cash.restore', $transaction->id) }}" method="POST" style="display: inline;">
                                @csrf @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                            </form>
                            <form action="{{ route('dashboard.cash.forceDelete', $transaction->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">سلة المحذوفات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
