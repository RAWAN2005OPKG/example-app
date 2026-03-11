@extends('layouts.container')
@section('title', 'تحويل جديد بين المشاريع')
@push('styles')<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />@endpush
@section('content' )
<div class="card card-custom">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle text-primary mr-2"></i>إنشاء تحويل جديد بين المشاريع</h3></div>
    <form action="{{ route('dashboard.project-transfers.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>من مشروع (المصدر) <span class="text-danger">*</span></label>
                    <select name="from_project_id" class="form-control select2" required>
                        <option value="">-- اختر المشروع المصدر --</option>
                        @foreach($projects as $project)<option value="{{ $project->id }}" {{ old('from_project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }} (الرصيد: {{ number_format($project->balance, 2) }})</option>@endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>إلى مشروع (الهدف) <span class="text-danger">*</span></label>
                    <select name="to_project_id" class="form-control select2" required>
                        <option value="">-- اختر المشروع الهدف --</option>
                        @foreach($projects as $project)<option value="{{ $project->id }}" {{ old('to_project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>@endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required></div>
                <div class="col-md-6 form-group"><label>تاريخ التحويل <span class="text-danger">*</span></label><input type="date" name="transfer_date" class="form-control" value="{{ old('transfer_date', date('Y-m-d')) }}" required></div>
            </div>
            <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea></div>
        </div>
        <div class="card-footer text-center"><button type="submit" class="btn btn-primary btn-lg px-8">تنفيذ التحويل</button></div>
    </form>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>$(document ).ready(function() { $('.select2').select2(); });</script>
@endpush
