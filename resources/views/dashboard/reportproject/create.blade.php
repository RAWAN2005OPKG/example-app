@extends('layouts.container')
@section('title', 'إضافة تقرير مشروع جديد')

@section('content')
<div class="card card-custom" style="max-width: 900px; margin: auto;">
    <div class="card-header"><h3 class="card-title">نموذج إضافة مشروع جديد</h3></div>
    <div class="card-body">
        @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('dashboard.reportproject.store') }}" method="POST">
            @csrf
            @include('dashboard.reportproject.form-fields', ['report' => null])
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">حفظ المشروع</button>
                <a href="{{ route('dashboard.reportproject.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
