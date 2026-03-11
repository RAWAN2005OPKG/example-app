@extends('layouts.container')
@section('title', 'تعديل المورد: ' . $supplier->name)
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="card card-custom" style="max-width: 600px; margin: auto;">
        <div class="card-header"><h3 class="card-title">تعديل المورد</h3></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
            @endif

            <form action="{{ route('dashboard.suppliers.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- ⬅️ مهم جداً --}}

                <div class="form-group mb-3">
                    <label for="name">اسم المورد *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $supplier->name) }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $supplier->email) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $supplier->phone) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="address">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $supplier->address) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="notes">ملاحظات</label>
                    <textarea name="notes" id="notes" class="form-control">{{ old('notes', $supplier->notes) }}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">تحديث</button>
                    <a href="{{ route('dashboard.suppliers.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
