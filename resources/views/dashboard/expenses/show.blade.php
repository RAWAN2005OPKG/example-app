@extends('layouts.container')
@section('title', 'تفاصيل المصروف رقم ' . $expense->id)
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">تفاصيل المصروف رقم: {{ $expense->id }}</h3>
    </div>
    <div class="card-body">
        {{-- عرض كل تفاصيل المصروف هنا --}}
        <p><strong>المستفيد:</strong> {{ $expense->payee }}</p>
        <p><strong>المبلغ:</strong> {{ number_format($expense->amount, 2) }} {{ $expense->currency }}</p>
        <p><strong>التاريخ:</strong> {{ $expense->date->format('d-m-Y') }}</p>
        <p><strong>المشروع:</strong> {{ $expense->project->project_name ?? 'مصروف عام' }}</p>
        <hr>
        <h4>تفاصيل إضافية:</h4>
        <pre>{{ json_encode($expense->payment_details, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>
</div>
@endsection
