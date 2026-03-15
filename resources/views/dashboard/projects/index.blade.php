
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
            <a href="{{ route('dashboard.project-transfers.index') }}" class="btn btn-info mr-2">
                <i class="la la-exchange-alt"></i> تحويل أموال بين المشاريع
            </a>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> إضافة مشروع جديد
            </a>
        </div>
    </div>
    <div class="card-body">
        
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="bg-light-primary p-5 rounded">
                    <h5 class="text-primary"><i class="fas fa-dollar-sign mr-2"></i> إجمالي التكلفة التقديرية (USD)</h5>
                    <h3 class="font-weight-bold">${{ number_format($total_estimated_cost_usd, 2) }}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light-success p-5 rounded">
                    <h5 class="text-success"><i class="fas fa-coins mr-2"></i> إجمالي التكلفة التقديرية (ILS)</h5>
                    <h3 class="font-weight-bold">{{ number_format($total_estimated_cost_ils, 2) }} ILS</h3>
                </div>
            </div>
        </div>

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
                        <th>الرصيد الحالي (ILS)</th>
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
                        <td class="font-weight-bold text-{{ $project->balance >= 0 ? 'success' : 'danger' }}">
                            {{ number_format($project->balance, 2) }} ILS
                        </td>
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
