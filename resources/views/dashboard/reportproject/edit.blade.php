@extends('layouts.container')
@section('title', 'تعديل المشروع: ' . $project->name)
@section('content')
<main class="main-content">
    <div class="card card-custom" style="max-width: 1100px; margin: auto;">
        <div class="card-header"><h3 class="card-title">تعديل المشروع: {{ $project->name }}</h3></div>
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form action="{{ route('dashboard.reportproject.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- نفترض أن لديك ملف form-fields.blade.php --}}
                @include('dashboard.reportproject.form-fields')
                <div class="form-actions mt-4">
                    <button type="submit" class="btn btn-primary">تحديث المشروع</button>
                    <a href="{{ route('dashboard.reportproject.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
