@extends('layouts.container')
@section('title', 'تعديل المنتج')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-edit"></i> تعديل المنتج: {{ $product->name }}</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للقائمة</a>
        </div>
    </div>

    <div class="form-container">
        <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group full-width">
                    <label for="name">اسم المنتج/الخدمة</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="sku">رمز SKU</label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}">
                </div>
                <div class="form-group">
                    <label for="category">الفئة</label>
                    <input type="text" name="category" value="{{ old('category', $product->category) }}">
                </div>
                <div class="form-group">
                    <label for="sale_price">سعر البيع</label>
                    <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" required>
                </div>
                <div class="form-group">
                    <label for="purchase_price">سعر الشراء</label>
                    <input type="number" step="0.01" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}">
                </div>
                <div class="form-group">
                    <label for="quantity">الكمية المتاحة</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                </div>
                <div class="form-group">
                    <label for="weight">الوزن (كجم)</label>
                    <input type="text" name="weight" value="{{ old('weight', $product->weight) }}">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</main>
@endsection
