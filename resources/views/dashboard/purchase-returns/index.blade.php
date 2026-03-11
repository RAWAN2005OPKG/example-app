
@extends('layouts.container')
@section('title', 'مرتجعات المشتريات')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">قائمة مرتجعات المشتريات</h3>
        <a href="{{ route('dashboard.purchase-returns.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة مرجوع جديد
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>اسم المورد</th>
                        <th>تاريخ الإرجاع</th>
                        <th>الإجمالي الكلي</th>
                        <th>طريقة الاسترداد</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($purchaseReturns as $return)
                        <tr>
                            <td>{{ $return->id }}</td>
                            <td>{{ $return->supplier->name ?? 'مورد محذوف' }}</td>
                            <td>{{ $return->return_date }}</td>
                            <td>{{ number_format($return->total_amount, 2) }}</td>
                            <td>{{ $return->payment_method == 'cash' ? 'نقداً' : 'تحويل بنكي' }}</td>
                            <td>{{ $return->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('dashboard.purchase-returns.destroy', $return->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا السجل؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">لا توجد مرتجعات لعرضها.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $purchaseReturns->links() }}
        </div>
    </div>
</div>
@endsection
