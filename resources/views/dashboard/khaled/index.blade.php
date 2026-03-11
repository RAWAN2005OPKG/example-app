@extends('layouts.container')
@section('title', 'سندات خالد')

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                <i class="fas fa-receipt text-primary mr-2"></i>
                عرض سندات خالد
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.khaled.trash') }}" class="btn btn-danger font-weight-bolder mr-2">
                <i class="fas fa-trash"></i> سلة المحذوفات
            </a>
            <a href="{{ route('dashboard.khaled.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i> إنشاء سند جديد
            </a>
        </div>
    </div>

    <div class="card-body">
        {{-- رسائل النجاح والخطأ --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

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
                <div class="card {{ $netBalance >= 0 ? 'bg-light-primary' : 'bg-light-warning' }}">
                    <div class="card-body text-center py-4">
                        <div class="{{ $netBalance >= 0 ? 'text-primary' : 'text-warning' }} font-size-sm font-weight-bold text-uppercase mb-1">الرصيد الصافي</div>
                        <div class="font-size-h4 font-weight-bolder {{ $netBalance >= 0 ? 'text-primary' : 'text-warning' }}">{{ number_format($netBalance, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>التاريخ</th>
                        <th>النوع</th>
                        <th>البيان</th>
                        <th>المبلغ</th>
                        <th>طريقة الدفع</th>
                        <th>أنشئ بواسطة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->voucher_date->format('Y-m-d') }}</td>
                        <td>
                            @if($voucher->type == 'receipt')
                                <span class="badge badge-light-success">قبض</span>
                            @else
                                <span class="badge badge-light-danger">صرف</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($voucher->description, 40) }}</td>
                        <td class="font-weight-bold">{{ number_format($voucher->amount, 2) }} <span class="text-muted">{{ $voucher->currency }}</span></td>
                        <td>{{ $voucher->payment_method }}</td>
                        <td>{{ $voucher->user->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('dashboard.khaled.show', $voucher->id) }}" class="btn btn-sm btn-clean btn-icon" title="عرض"><i class="la la-eye"></i></a>
                            <a href="{{ route('dashboard.khaled.edit', $voucher->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.khaled.destroy', $voucher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا السند؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">لا توجد سندات لعرضها.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $vouchers->links() }}
        </div>
    </div>
</div>
@endsection
