@extends('layouts.container')
@section('title', 'سجل مصروفات الموردين')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-money-bill-wave text-success mr-2"></i> سجل مصروفات الموردين والمقاولين</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.supplier_expenses.trash') }}" class="btn btn-danger mr-2">
                <i class="fas fa-trash"></i> سلة المحذوفات
            </a>
            <a href="{{ route('dashboard.supplier_expenses.create') }}" class="btn btn-success">
                <i class="la la-plus"></i> تسجيل مصروف جديد
            </a>
        </div>
    </div>
    <div class="card-body">
        {{-- الفلترة والبحث --}}
        <form method="GET" action="{{ route('dashboard.supplier_expenses.index') }}" class="mb-5">
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="search" class="form-control" placeholder="بحث باسم المورد..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">بحث</button>
                    <a href="{{ route('dashboard.supplier_expenses.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </div>
        </form>

        {{-- بطاقة الإجمالي --}}
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card bg-light-info">
                    <div class="card-body text-center py-4">
                        <div class="text-info font-size-sm font-weight-bold text-uppercase mb-1">إجمالي المدفوعات للموردين</div>
                        <div class="font-size-h4 font-weight-bolder text-info">{{ number_format($totalAmount ?? 0, 2) }} <small>شيكل</small></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>التاريخ</th>
                        <th>المبلغ</th>
                        <th>المورد/المقاول</th>
                        <th>مصدر التمويل</th>
                        <th>دافع المبلغ</th>
                        <th>ملاحظات</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $expense->date ? $expense->date->format('Y-m-d') : 'N/A' }}</td>
                            <td class="font-weight-bold text-dark">{{ number_format($expense->amount, 2) }}</td>
                            <td>
                                @if($expense->payable)
                                    <span class="font-weight-bold">{{ $expense->payable->name }}</span>
                                    <br><small class="text-muted">{{ $expense->payable->specialization }}</small>
                                @else
                                    <span class="text-danger">مورد محذوف</span>
                                @endif
                            </td>
                            <td>{{ $expense->source_of_funds }}</td>
                            <td>{{ $expense->paid_by }}</td>
                            <td>{{ Str::limit($expense->notes, 30) }}</td>
                            <td>
                                <a href="{{ route('dashboard.supplier_expenses.edit', $expense->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit text-primary"></i></a>
                                <form action="{{ route('dashboard.supplier_expenses.destroy', $expense->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا السجل؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-5">لا توجد سجلات لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $expenses->links() }}
        </div>
    </div>
</div>
@endsection
