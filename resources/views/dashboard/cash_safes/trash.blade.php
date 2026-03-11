@extends('layouts.container')
@section('title', 'سلة محذوفات الخزائن')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title">سلة المحذوفات (الخزائن النقدية)</h4>
            <a href="{{ route('dashboard.cash-safes.index') }}" class="btn btn-secondary">العودة لقائمة الخزائن</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الخزينة</th>
                    <th>تاريخ الحذف</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($safes as $safe)
                <tr>
                    <td>{{ $safe->id }}</td>
                    <td>{{ $safe->name }}</td>
                    <td>{{ $safe->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('dashboard.cash-safes.restore', $safe->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                        </form>
                        <form action="{{ route('dashboard.cash-safes.forceDelete', $safe->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">سلة المحذوفات فارغة.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $safes->links() }}</div>
    </div>
</div>
@endsection
