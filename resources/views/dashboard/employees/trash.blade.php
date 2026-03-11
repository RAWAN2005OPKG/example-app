@extends('layouts.container')
@section('title', 'سلة محذوفات الموظفين')
@section('content')
<main class="main-content">
    <div class="page-header"><h1><i class="fas fa-trash-alt"></i> سلة محذوفات الموظفين</h1></div>
    <div class="card card-custom">
        <div class="card-header"><div class="card-title"><h3 class="card-label">الموظفون المحذوفون</h3></div><div class="card-toolbar"><a href="{{ route('dashboard.employees.index') }}" class="btn btn-secondary">العودة لقائمة الموظفين</a></div></div>
        <div class="card-body">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead><tr><th>الاسم</th><th>المنصب</th><th>تاريخ الحذف</th><th>تحكم</th></tr></thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->deleted_at->format('Y-m-d H:i') }}</td>
                                <td nowrap="nowrap">
                                    <form action="{{ route('dashboard.employees.trash.restore', $employee->id) }}" method="POST" style="display:inline;"> @csrf @method('PUT') <button type="submit" class="btn btn-success btn-sm">استعادة</button></form>
                                    <form action="{{ route('dashboard.employees.trash.forceDelete', $employee->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟');"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm">حذف نهائي</button></form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">سلة المحذوفات فارغة.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $employees->links() }}</div>
        </div>
    </div>
</main>
@endsection
