@extends('layouts.container')
@section('title', 'سلة مهملات السندات')

@section('content')
<div class="card card-custom">
    <div class="card-header"><h3>سلة مهملات السندات</h3></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>#</th><th>التاريخ</th><th>البيان</th><th>تاريخ الحذف</th><th>إجراءات</th></tr></thead>
                <tbody>
                    @forelse($trashedVouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->serial_number }}</td>
                        <td>{{ $voucher->voucher_date->format('Y-m-d') }}</td>
                        <td>{{ Str::limit($voucher->description, 50) }}</td>
                        <td>{{ $voucher->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('dashboard.vouchers.restore', $voucher->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                            </form>
                            <form action="{{ route('dashboard.vouchers.force-delete', $voucher->id) }}" method="POST" class="d-inline" onsubmit="return confirm('تحذير! سيتم حذف السند نهائياً ولا يمكن التراجع عن هذا الإجراء. هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center p-5">سلة المهملات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{ $trashedVouchers->links() }}</div>
    </div>
</div>
@endsection
