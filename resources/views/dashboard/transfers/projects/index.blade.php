@extends('layouts.container')
@section('title', 'تحويل المصاريف بين المشاريع')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-project-diagram"></i> تحويل المصاريف بين المشاريع</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    {{-- نموذج التحويل --}}
    <div class="form-container">
        <h2 class="container-title">عملية تحويل جديدة</h2>
        <form action="{{ route('dashboard.project-transfers.store') }}" method="POST" class="form-grid">
            @csrf
            <div class="form-group">
                <label for="date">تاريخ التحويل</label>
                <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="expense_id">رقم المصروف</label>
                <input type="number" id="expense_id" name="expense_id" placeholder="أدخل ID المصروف" required>
            </div>
            <div class="form-group">
                <label for="amount">المبلغ المراد تحويله</label>
                <input type="number" id="amount" name="amount" step="0.01" placeholder="0.00" required>
            </div>
            <div class="form-group">
                <label for="to_project_id">تحويل إلى مشروع</label>
                <select id="to_project_id" name="to_project_id" required>
                    <option value="">-- اختر المشروع الهدف --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="reason">سبب التحويل</label>
                <textarea id="reason" name="reason" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn-submit">تنفيذ التحويل</button>
        </form>
    </div>

    {{-- جدول التحويلات السابقة --}}
    <div class="table-container">
        <h2 class="container-title">سجل التحويلات</h2>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>رقم المصروف</th>
                        <th>المبلغ</th>
                        <th>من مشروع</th>
                        <th>إلى مشروع</th>
                        <th>السبب</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transfers as $transfer)
                        <tr>
                            <td>{{ $transfer->date }}</td>
                            <td>#{{ $transfer->expense_id }}</td>
                            <td>{{ number_format($transfer->amount, 2) }}</td>
                            <td>#{{ $transfer->from_project_id }}</td>
                            <td>#{{ $transfer->to_project_id }}</td>
                            <td>{{ $transfer->reason }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">لا توجد عمليات تحويل سابقة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
