

@extends('layouts.container')
@section('title', 'إضافة حركة بنكية')

@section('content')
<div class="card card-custom" style="max-width: 900px; margin: auto;">
    <div class="card-header">
        <h3 class="card-title">إضافة حركة بنكية جديدة</h3>
    </div>

    {{-- النموذج الخارجي الوحيد --}}
    <form class="form" action="{{ route('dashboard.bank-transactions.store') }}" method="POST">
        @csrf

        {{-- استدعاء ملف الحقول الداخلية --}}
        @include('dashboard.bank-transactions._form')


            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                <a href="{{ route('dashboard.bank-transactions.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>

    </form>
</div>
@endsection
