@extends('layouts.container')
@section('title', 'سلة مهملات تقارير المشاريع')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">سلة المهملات</h3>
        <div class="card-toolbar"><a href="{{ route('dashboard.reportproject.index') }}" class="btn btn-secondary">العودة للقائمة</a></div>
    </div>
    <div class="card-body">
        @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>اسم التقرير</th><th>تاريخ الحذف</th><th>إجراءات</th></tr></thead>
                <tbody>
                    @forelse($trashedReports as $report)
                    <tr>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->deleted_at->format('Y-m-d H:i A') }}</td>
                        <td>
                            <form action="{{ route('dashboard.reportproject.restore', $report->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                            </form>
                            <form action="{{ route('dashboard.reportproject.force-delete', $report->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center p-5">سلة المهملات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{ $trashedReports->links() }}</div>
    </div>
</div>
@endsection
