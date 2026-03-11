@extends('layouts.container')
@section('title', 'إدارة المصروفات')

@push('styles')
<style>
    /* هذا الكلاس يخفي العناصر عند الطباعة */
    @media print {
        .no-print {
            display: none !important;
        }
        body, .card, .table {
            background: #fff !important;
            box-shadow: none !important;
        }
        .card-header, .card-body {
            border: none !important;
        }
    }
</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">قائمة المصروفات</h3>
        <div class="card-toolbar no-print">
            <button onclick="window.print();" class="btn btn-info mr-2">
                <i class="la la-print"></i> طباعة
            </button>
            <a href="{{ route('dashboard.expenses.exportExcel') }}" class="btn btn-success mr-2">
                <i class="la la-file-excel"></i> تصدير Excel
            </a>
            <a href="{{ route('dashboard.expenses.trash') }}" class="btn btn-danger mr-2">
                <i class="la la-trash"></i> سلة المحذوفات
            </a>
            <a href="{{ route('dashboard.expenses.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> إضافة مصروف جديد
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success no-print">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger no-print">{{ session('error') }}</div>@endif

        <!-- نموذج البحث -->
        <form method="GET" action="{{ route('dashboard.expenses.index') }}" class="mb-5 no-print">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث بالاسم، التفاصيل، أو اسم المشروع..." value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">بحث</button>
                    @if($search)
                        <a href="{{ route('dashboard.expenses.index') }}" class="btn btn-outline-danger">إلغاء البحث</a>
                    @endif
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#ID</th>
                        <th>التاريخ</th>
                        <th>المستفيد</th>
                        <th>المبلغ الأصلي</th>
                        <th>القيمة (شيكل)</th>
                        <th>المشروع</th>
                        <th>مصدر الدفع</th>
                        <th class="no-print">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>{{ $expense->date->format('Y-m-d') }}</td>
                        <td>{{ $expense->payee }}</td>
                        <td class="font-weight-bold">{{ number_format($expense->amount, 2) }} <span class="text-muted">{{ $expense->currency }}</span></td>
                        <td class="font-weight-bolder">{{ number_format($expense->amount_ils, 2) }} ILS</td>
                        <td>{{ $expense->project->project_name ?? 'مصروف عام' }}</td>
                        <td>{{ $expense->payment_source }}</td>
                        <td class="no-print">
                            <a href="{{ route('dashboard.expenses.show', $expense->id) }}" class="btn btn-sm btn-icon btn-light-info" title="عرض"><i class="la la-eye"></i></a>
                            <a href="{{ route('dashboard.expenses.edit', $expense->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">لا توجد مصروفات تطابق البحث.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4 no-print">
            {{ $expenses->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection
