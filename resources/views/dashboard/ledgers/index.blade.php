@extends('layouts.container')
@section('title', $pageTitle)

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title"><h3>{{ $pageTitle }}</h3></div>
        <div class="card-toolbar"><a href="{{ route($routeName.'.create') }}" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i>إنشاء سند جديد</a></div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route($routeName.'.index') }}" class="mb-5">
            <div class="row align-items-center">
                <div class="col-md-3 my-2 my-md-0"><input type="text" name="search" class="form-control" placeholder="بحث بالبيان أو الرقم..." value="{{ request('search') }}"></div>
                <div class="col-md-2 my-2 my-md-0"><label class="font-size-sm">من تاريخ:</label><input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}"></div>
                <div class="col-md-2 my-2 my-md-0"><label class="font-size-sm">إلى تاريخ:</label><input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}"></div>
                <div class="col-md-2 my-2 my-md-0"><label class="font-size-sm">النوع:</label><select name="type" class="form-control"><option value="">الكل</option><option value="receipt" @selected(request('type') == 'receipt')>قبض</option><option value="payment" @selected(request('type') == 'payment')>صرف</option></select></div>
                <div class="col-md-3 my-2 my-md-0"><button type="submit" class="btn btn-primary">بحث</button> <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary">إلغاء</a></div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr class="text-uppercase"><th>#</th><th>التاريخ</th><th>البيان</th><th>النوع</th><th>طريقة الدفع</th><th>المبلغ</th><th>إجراءات</th></tr></thead>
                <tbody>
                    @forelse($vouchers as $voucher)
                    <tr>
                        <td><a href="{{ route($routeName.'.show', $voucher->id) }}">{{ $voucher->serial_number }}</a></td>
                        <td>{{ $voucher->voucher_date->format('Y-m-d') }}</td>
                        <td>{{ Str::limit($voucher->description, 50) }}</td>
                        <td><span class="label label-lg font-weight-bold label-light-{{ $voucher->type == 'receipt' ? 'success' : 'danger' }} label-inline">{{ $voucher->type == 'receipt' ? 'قبض' : 'صرف' }}</span></td>
                        <td>{{ $voucher->payment_method }}</td>
                        <td class="font-weight-bold">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</td>
                        <td>
                            <a href="{{ route($routeName.'.show', $voucher->id) }}" class="btn btn-sm btn-clean btn-icon" title="عرض"><i class="la la-eye"></i></a>
                            <a href="{{ route($routeName.'.edit', $voucher->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route($routeName.'.destroy', $voucher->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من نقل السند إلى سلة المهملات؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center p-5 text-muted">لا توجد سندات لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{ $vouchers->links() }}</div>
    </div>
</div>
@endsection
