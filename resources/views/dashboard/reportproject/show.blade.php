@extends('layouts.container')
@section('title', 'عرض المشروع: ' . $project->name)
@section('content')
<main class="main-content">
    <div class="card card-custom" style="max-width: 1100px; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">تفاصيل المشروع: {{ $project->name }}</h3>
        </div>
        <div class="card-body">
            <div class="form-section">
                <div class="section-header">
                    <i class="fas fa-info-circle"></i>
                    <h3>معلومات المشروع</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>اسم المشروع</label>
                        <p>{{ $project->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>عنوان المشروع</label>
                        <p>{{ $project->project_title }}</p>
                    </div>
                    <div class="form-group">
                        <label>اسم المالك</label>
                        <p>{{ $project->owner_name }}</p>
                    </div>
                    <div class="form-group">
                        <label>حالة المشروع</label>
                        <p><span class="badge badge-info">{{ $project->project_status }}</span></p>
                    </div>
                    <div class="form-group">
                        <label>الميزانية الإجمالية</label>
                        <p>{{ number_format($project->total_budget, 2) }} {{ $project->currency }}</p>
                    </div>
                    <div class="form-group full-width">
                        <label>الوصف</label>
                        <p>{{ $project->description ?? 'لا يوجد وصف' }}</p>
                    </div>
                    <div class="form-group full-width">
                        <label>معلومات إضافية</label>
                        <p>{{ $project->additional_info ?? 'لا توجد معلومات إضافية' }}</p>
                    </div>
                    <div class="form-group full-width">
                        <label>الملفات</label>
                        @if($project->files && count(json_decode($project->files, true)) > 0)
                            @foreach(json_decode($project->files, true) as $file)
                                <p><a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a></p>
                            @endforeach
                        @else
                            <p>لا توجد ملفات مرفقة</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-actions mt-4">
                <a href="{{ route('dashboard.reportproject.edit', $project->id) }}" class="btn btn-primary">تعديل</a>
                <a href="{{ route('dashboard.reportproject.index') }}" class="btn btn-secondary">العودة للقائمة</a>
            </div>
        </div>
    </div>
</main>
@endsection
