@extends('layouts.container')
@section('title', 'تعديل حركة نقدية')

@section('content')
<div class="card card-custom" style="max-width: 800px; margin: 40px auto;">
    <div class="card-header"><h3 class="card-title">تعديل حركة نقدية (سند رقم: {{ $transaction->voucher_id }})</h3></div>
    <form action="{{ route('dashboard.cash.update', $transaction->id) }}" method="POST" id="cash-form">
        @csrf
        @method('PUT')
        @include('dashboard.cash.form', ['transaction' => $transaction])
    </form>
</div>
@endsection
