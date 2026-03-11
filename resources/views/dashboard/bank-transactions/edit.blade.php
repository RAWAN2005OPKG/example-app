@extends('layouts.container')
@section('title', 'تعديل حركة بنكية')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            تعديل الحركة رقم: #{{ $bankTransaction->id }}
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.bank-transactions.index') }}" class="btn btn-secondary">
                <i class="la la-arrow-left"></i> العودة للقائمة
            </a>
        </div>
    </div>


    <form action="{{ route('dashboard.bank-transactions.update', $bankTransaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            @include('dashboard.bank-transactions._form', ['transaction' => $bankTransaction])
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">
                <i class="la la-save"></i> حفظ التعديلات
            </button>
            <a href="{{ route('dashboard.bank-transactions.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
