@extends('layouts.container')
@section('title', 'تقارير المشاريع')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">قائمة تقارير المشاريع</h3>
        <div class="card-toolbar">
           <a href="{{ route('dashboard.reportproject.create') }}" class="btn btn-primary">إضافة تقرير جديد</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        <!-- نموذج البحث -->
        <form method="GET" action="{{ route('dashboard.reportproject.index') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث بالاسم، العنوان، أو المالك..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">بحث</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr><th>اسم التقرير</th><th>عنوان المشروع</th><th>المالك</th><th>الحالة</th><th>الإجراءات</th></tr>
                </thead>
                <tbody>
                    @forelse($reportProjects as $report)
                    <tr>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->project_title }}</td>
                        <td>{{ $report->owner_name }}</td>
                        <td><span class="badge badge-info">{{ $report->project_status }}</span></td>
                        <td>
                            <a href="{{ route('dashboard.reportproject.edit', $report->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.reportproject.destroy', $report->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من رغبتك في نقل هذا التقرير إلى سلة المهملات؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center p-5">لا توجد تقارير لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">{{ $reportProjects->links() }}</div>
    </div>
</div>
@endsection
