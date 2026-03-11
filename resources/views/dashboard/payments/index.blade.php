@extends('layouts.container')
@section('title', 'القيود اليومية (الدفعات)')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-file-invoice-dollar text-success mr-2"></i> القيود اليومية</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.payments.create') }}" class="btn btn-success mr-2"><i class="la la-plus"></i> تسجيل قيد جديد</a>
            <a href="{{ route('dashboard.payments.trash') }}" class="btn btn-danger"><i class="fas fa-trash"></i> سلة المحذوفات</a>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('dashboard.payments.index') }}" class="mb-8 p-4 bg-light rounded">
            <div class="row">
                <div class="col-md-3 form-group"><label>بحث بالاسم/ID</label><input type="text" name="search_payable" class="form-control" placeholder="اسم العميل/المستثمر..." value="{{ request('search_payable') }}"></div>
                <div class="col-md-3 form-group"><label>نوع الحركة</label><select name="payment_type" class="form-control"><option value="">الكل</option><option value="in" @selected(request('payment_type') == 'in')>قبض</option><option value="out" @selected(request('payment_type') == 'out')>صرف</option></select></div>
                <div class="col-md-2 form-group"><label>من تاريخ</label><input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}"></div>
                <div class="col-md-2 form-group"><label>إلى تاريخ</label><input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}"></div>
                <div class="col-md-2 align-self-end"><button type="submit" class="btn btn-primary">فلترة</button><a href="{{ route('dashboard.payments.index') }}" class="btn btn-secondary ml-2">إلغاء</a></div>
            </div>
        </form>
        {{-- بطاقات الإجماليات --}}
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card bg-light-success">
                    <div class="card-body text-center py-4">
                        <div class="text-success font-size-sm font-weight-bold text-uppercase mb-1">إجمالي القبض</div>
                        <div class="font-size-h4 font-weight-bolder text-success">{{ number_format($totalInIls, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light-danger">
                    <div class="card-body text-center py-4">
                        <div class="text-danger font-size-sm font-weight-bold text-uppercase mb-1">إجمالي الصرف</div>
                        <div class="font-size-h4 font-weight-bolder text-danger">{{ number_format($totalOutIls, 2) }} <small>شيكل</small></div>
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
                <thead>
                    <tr>
                        <th>ID</th><th>التاريخ</th><th>الكيان</th><th>النوع</th><th>المبلغ</th><th>الطريقة</th><th>تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                        <td>
                            @if($payment->payable)
                                <span class="font-weight-bold">{{ $payment->payable->name }}</span>

                                <small class="text-muted">{{ str_replace('App\\Models\\', '', $payment->payable_type) }}</small>
                            @else
                                <span class="text-danger">كيان محذوف</span>
                            @endif
                        </td>
                        <td>
                            @if($payment->type == 'in') <span class="badge badge-light-success">قبض</span> @else <span class="badge badge-light-danger">صرف</span> @endif
                        </td>
                        <td class="font-weight-bold">{{ number_format($payment->amount, 2) }} <span class="text-muted">{{ $payment->currency }}</span></td>
                        <td>{{ $payment->method }}</td>
                        <td nowrap="nowrap">
                            <a href="{{ route('dashboard.payments.show', $payment->id) }}" class="btn btn-sm btn-clean btn-icon" title="عرض"><i class="fas fa-eye text-info"></i></a>
                            <a href="{{ route('dashboard.payments.edit', $payment->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="fas fa-edit text-primary"></i></a>
                            <form id="delete-form-{{ $payment->id }}" action="{{ route('dashboard.payments.destroy', $payment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-clean btn-icon" title="حذف" onclick="confirmDelete('{{ $payment->id }}')">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-5">لا توجد قيود مسجلة تطابق البحث.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">{{ $payments->links() }}</div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id ) {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "سيتم نقل هذا القيد إلى سلة المحذوفات!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، انقله!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush
