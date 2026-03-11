@extends('layouts.container')
@section('title', 'تحويلات المشاريع')
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title"><h3 class="card-label"><i class="fas fa-exchange-alt text-primary mr-2"></i>سجل تحويلات المشاريع</h3></div>
        <div class="card-toolbar"><a href="{{ route('dashboard.project-transfers.create') }}" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i>تحويل جديد</a></div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        <form method="GET" action="{{ route('dashboard.project-transfers.index') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث بالمبلغ أو الملاحظات..." value="{{ request('search') }}">
                <div class="input-group-append"><button type="submit" class="btn btn-primary">بحث</button></div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr><th>#</th><th>التاريخ</th><th>من مشروع</th><th>إلى مشروع</th><th>المبلغ</th><th>ملاحظات</th><th>بواسطة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($transfers as $transfer)
                    <tr>
                        <td>{{ $transfer->id }}</td>
                        <td>{{ $transfer->transfer_date->format('Y-m-d') }}</td>
                        <td>{{ $transfer->fromProject->name ?? 'N/A' }}</td>
                        <td>{{ $transfer->toProject->name ?? 'N/A' }}</td>
                        <td class="font-weight-bold text-danger">{{ number_format($transfer->amount, 2) }}</td>
                        <td>{{ Str::limit($transfer->notes, 30) }}</td>
                        <td>{{ $transfer->user->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('dashboard.project-transfers.edit', $transfer->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.project-transfers.destroy', $transfer->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد؟ سيتم حذف التحويل وعكس أثره المالي على أرصدة المشاريع.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center py-5">لا توجد تحويلات لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">{{ $transfers->links() }}</div>
    </div>
</div>
@endsection
