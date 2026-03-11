@extends('layouts.container')
@section('title', 'إدارة المستثمرين')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-users text-warning mr-2"></i> قائمة المستثمرين</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.investors.create') }}" class="fas fa-users text-warning mr-2" style="color: rgb(250, 186, 8)5, 217, 0)">إضافة مستثمر</a>
            <a href="{{ route('dashboard.investors.export.excel') }}" class="btn btn-success btn-sm mr-2">تصدير Excel</a>
            <a href="{{ route('dashboard.investors.trash') }}" class="btn btn-danger btn-sm">سلة المحذوفات</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.investors.index') }}" method="GET" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث بالاسم, ID, أو رقم الهوية..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">بحث</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>رقم الهوية</th>
                        <th>الجوال</th>
                        <th>المشاريع المستثمر بها</th>
                        <th>إجمالي الاستثمار (ILS)</th>
                        <th>المصروف له (ILS)</th>
                        <th>الرصيد (ILS)</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($investors as $investor)
                    <tr>
                        <td>{{ $investor->unique_id }}</td>
                        <td>
                            <a href="{{ route('dashboard.investors.show', $investor->id) }}" class="text-dark-75 font-weight-bolder">{{ $investor->name }}</a>
                        </td>
                        <td>{{ $investor->id_number ?? '-' }}</td>
                        <td>{{ $investor->phone ?? '-' }}</td>
                        <td>
                            @forelse($investor->projects as $project)
                                <span class="badge badge-light-info mb-1">{{ $project->name }}</span>
                            @empty
                                <span class="text-muted">-</span>
                            @endforelse
                        </td>
                        <td><span class="font-weight-bold text-primary">{{ number_format($investor->total_investment_ils, 2) }}</span></td>
                        <td><span class="font-weight-bold text-success">{{ number_format($investor->total_paid_out, 2) }}</span></td>
                        <td><span class="font-weight-bold text-danger">{{ number_format($investor->remaining_balance, 2) }}</span></td>
                        <td>
                            <a href="{{ route('dashboard.investors.edit', $investor->id) }}" class="btn btn-sm btn-icon btn-warning" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.investors.destroy', $investor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من نقل هذا المستثمر إلى سلة المحذوفات؟');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-danger" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center">لا يوجد مستثمرون لعرضهم.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $investors->links() }}</div>
    </div>
</div>
@endsection
