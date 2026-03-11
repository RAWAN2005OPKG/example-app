
@extends('layouts.container')
@section('title', 'قائمة المشاريع العقارية')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                <i class="fas fa-list-alt text-primary mr-2"></i>
                قائمة المشاريع العقارية
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> إضافة مشروع جديد
            </a>
        </div>
    </div>
    <div class="card-body">

        {{-- رسائل التنبيه --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المشروع</th>
                        <th>الموقع</th>
                        <th>تاريخ البدء</th>
                        <th>التكلفة المتوقعة ($)</th>
                        <th>الحالة</th>
                        <th>نسبة الإنجاز</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->location ?? '-' }}</td>
                        <td>{{ $project->start_date->format('Y-m-d') }}</td>
                        <td>${{ number_format($project->estimated_cost_usd, 2) }}</td>
                        <td>
                            <span class="badge badge-light-{{ $project->status == 'in_progress' ? 'warning' : ($project->status == 'completed' ? 'success' : 'info') }}">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td>
                            <div class="progress" style="height: 15px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $project->completion_percentage }}%;" aria-valuenow="{{ $project->completion_percentage }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $project->completion_percentage }}%
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.projects.show', $project->id) }}" class="btn btn-sm btn-icon btn-info" title="عرض التفاصيل">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-sm btn-icon btn-warning" title="تعديل">
                                <i class="la la-edit"></i>
                            </a>
                            {{-- زر الحذف (يتطلب نموذج Form للحذف) --}}
                            <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-danger" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                    <i class="la la-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">لا توجد مشاريع مسجلة حالياً.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- روابط التنقل بين الصفحات --}}
        <div class="d-flex justify-content-center">
            {{ $projects->links() }}
        </div>

    </div>
</div>
@endsection
