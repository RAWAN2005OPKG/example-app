@extends('layouts.container')
@section('title', 'الخزائن النقدية')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title">قائمة الخزائن النقدية</h4>
            <div>
                <a href="{{ route('dashboard.cash-safes.create') }}" class="btn btn-success">إنشاء خزينة جديدة</a>
                <a href="{{ route('dashboard.cash-safes.trash') }}" class="btn btn-dark">سلة المحذوفات</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الخزينة</th>
                    <th>العملة</th>
                    <th>الرصيد الحالي</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($safes as $safe)
                <tr>
                    <td>{{ $safe->id }}</td>
                    <td>{{ $safe->name }}</td>
                    <td>{{ $safe->currency }}</td>
                    <td><strong>{{ number_format($safe->balance, 2) }}</strong></td>
                    <td>
                        @if($safe->is_active)
                            <span class="badge badge-success">نشطة</span>
                        @else
                            <span class="badge badge-danger">غير نشطة</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dashboard.cash-safes.edit', $safe->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                        <form action="{{ route('dashboard.cash-safes.destroy', $safe->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد خزائن لعرضها.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $safes->links() }}</div>
    </div>
</div>
@endsection
