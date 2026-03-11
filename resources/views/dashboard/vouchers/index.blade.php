@extends('layouts.container')
@section('title', 'السندات المالية')

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title"><h3>السندات المالية</h3></div>
        <div class="card-toolbar"><a href="{{ route('dashboard.vouchers.create') }}" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i>إنشاء سند جديد</a></div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-5">
            <div class="row">
                <div class="col-md-3"><input type="text" name="search" class="form-control" placeholder="بحث بالبيان أو الرقم" value="{{ request('search') }}"></div>
                <div class="col-md-2"><input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}"></div>
                <div class="col-md-2"><input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}"></div>
                <div class="col-md-2"><select name="type" class="form-control"><option value="">كل الأنواع</option><option value="receipt" @selected(request('type') == 'receipt')>قبض</option><option value="payment" @selected(request('type') == 'payment')>صرف</option></select></div>
                <div class="col-md-3"><button type="submit" class="btn btn-primary">بحث</button> <a href="{{ route('dashboard.vouchers.index') }}" class="btn btn-secondary">إلغاء</a></div>
            </div>
        </form>

        {{-- بطاقات الإجماليات --}}
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card bg-light-success">
                    <div class="card-body text-center py-4">
                        <div class="text-success font-size-sm font-weight-bold text-uppercase mb-1">إجمالي القبض</div>
                        <div class="font-size-h4 font-weight-bolder text-success">{{ number_format($totalReceipts, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light-danger">
                    <div class="card-body text-center py-4">
                        <div class="text-danger font-size-sm font-weight-bold text-uppercase mb-1">إجمالي الصرف</div>
                        <div class="font-size-h4 font-weight-bolder text-danger">{{ number_format($totalPayments, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card {{ ($netBalance ?? 0) >= 0 ? 'bg-light-primary' : 'bg-light-warning' }}">
                    <div class="card-body text-center py-4">
                        <div class="{{ ($netBalance ?? 0) >= 0 ? 'text-primary' : 'text-warning' }} font-size-sm font-weight-bold text-uppercase mb-1">الرصيد الصافي</div>
                        <div class="font-size-h4 font-weight-bolder {{ ($netBalance ?? 0) >= 0 ? 'text-primary' : 'text-warning' }}">{{ number_format($netBalance ?? 0, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div><a href="#" class="btn btn-success">تصدير Excel</a> <a href="{{ route('dashboard.vouchers.trash') }}" class="btn btn-danger">سلة المهملات</a></div>
            <form method="GET">
                <select name="per_page" class="form-control" onchange="this.form.submit()">
                    <option value="10" @selected(request('per_page') == '10')>عرض 10</option>
                    <option value="25" @selected(request('per_page') == '25')>عرض 25</option>
                    <option value="50" @selected(request('per_page') == '50')>عرض 50</option>
                    <option value="all" @selected(request('per_page') == 'all')>عرض الكل</option>
                </select>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>#</th><th>التاريخ</th><th>البيان</th><th>النوع</th><th>طريقة الدفع</th><th>المبلغ</th><th>إجراءات</th></tr></thead>
                <tbody>
                    @forelse($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->serial_number }}</td>
                        <td>{{ $voucher->voucher_date->format('Y-m-d') }}</td>
                        <td>{{ Str::limit($voucher->description, 50) }}</td>
                        <td><span class="badge badge-{{ $voucher->type == 'receipt' ? 'success' : 'danger' }}">{{ $voucher->type == 'receipt' ? 'قبض' : 'صرف' }}</span></td>
                        <td>{{ $voucher->payment_method }}</td>
                        <td class="font-weight-bold">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</td>
                        <td>
                            <a href="{{ route('dashboard.vouchers.edit', $voucher->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.vouchers.destroy', $voucher->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من نقل السند إلى سلة المهملات؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center p-5">لا توجد سندات لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{ $vouchers->appends(request()->query())->links() }}</div>
    </div>
</div>
@endsection
