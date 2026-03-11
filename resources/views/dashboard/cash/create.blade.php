@extends('layouts.container')
@section('title', 'إضافة حركة نقدية')

@section('content')
<div class="card card-custom" style="max-width: 800px; margin: 40px auto;">
    <div class="card-header"><h3 class="card-title">إضافة حركة نقدية جديدة</h3></div>
    <form action="{{ route('dashboard.cash.store') }}" method="POST" id="cash-form">
        @csrf
        @include('dashboard.cash.form', ['transaction' => $transaction])
    </form>
</div>
@endsection
