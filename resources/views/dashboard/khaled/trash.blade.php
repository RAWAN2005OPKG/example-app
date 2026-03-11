@extends('layouts.container')
@section('title', 'سلة محذوفات سندات خالد')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-trash text-danger mr-2"></i> سلة المحذوفات</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.khaled.index') }}" class="btn btn-primary">العودة إلى السندات</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>تاريخ الحذف</th>
                        <th>البيان</th>
                        <th>المبلغ</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trashed as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>{{ Str::limit($voucher->description, 50) }}</td>
                        <td class="font-weight-bold">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</td>
                        <td>
                            <form action="{{ route('dashboard.khaled.restore', $voucher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                            </form>
                            <form action="{{ route('dashboard.khaled.forceDelete', $voucher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد؟ سيتم حذف السند نهائياً ولن يمكن استعادته.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">سلة المحذوفات فارغة.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $trashed->links() }}
        </div>
    </div>
</div>
@endsection
