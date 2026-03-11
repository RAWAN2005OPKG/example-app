@extends('layouts.container')
@section('title', 'سلة محذوفات القيود')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">سلة محذوفات القيود اليومية</h3>
        <div class="card-toolbar"><a href="{{ route('dashboard.payments.index') }}" class="btn btn-primary">العودة للقيود</a></div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr><th>ID</th><th>الكيان</th><th>المبلغ</th><th>تاريخ الحذف</th><th>تحكم</th></tr>
            </thead>
            <tbody>
                @forelse($trashedPayments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->payable->name ?? 'كيان محذوف' }}</td>
                    <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                    <td>{{ $payment->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('dashboard.payments.restore', $payment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">استعادة</button>
                        </form>
                        <form action="{{ route('dashboard.payments.forceDelete', $payment->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف نهائي</button>
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
@endsection
