@extends('layouts.container')
@section('title', 'سلة محذوفات سندات وليد')
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-trash-alt text-danger mr-2"></i>سلة محذوفات سندات وليد</h3>
        <div class="card-toolbar"><a href="{{ route('dashboard.wali.index') }}" class="btn btn-primary font-weight-bolder"><i class="la la-arrow-right"></i>العودة إلى قائمة السندات</a></div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr><th>#</th><th>تاريخ الحذف</th><th>البيان</th><th>المبلغ</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($trashed as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->deleted_at->format('Y-m-d H:i A') }}</td>
                        <td>{{ Str::limit($voucher->description, 50) }}</td>
                        <td class="font-weight-bold">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</td>
                        <td>
                            <form action="{{ route('dashboard.wali.restore', $voucher->id) }}" method="POST" style="display:inline;"><button type="submit" class="btn btn-sm btn-success font-weight-bold"><i class="la la-history"></i> استعادة</button></form>
                            <form action="{{ route('dashboard.wali.forceDelete', $voucher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد؟ سيتم حذف السند نهائياً.');"><button type="submit" class="btn btn-sm btn-danger font-weight-bold"><i class="la la-trash-alt"></i> حذف نهائي</button></form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-5"><i class="fas fa-box-open fa-3x text-muted mb-3"></i><p class="font-weight-bold">سلة المحذوفات فارغة.</p></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">{{ $trashed->links() }}</div>
    </div>
</div>
@endsection
