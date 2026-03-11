@extends('layouts.container')
@section('title', 'المنتجات والخدمات')
 
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-boxes"></i> المنتجات والخدمات</h1>
        <div class="header-actions">

            <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> إضافة منتج
            </a>

            <a href="{{ route('dashboard.products.trash.index') }}" class="btn btn-danger">
                <i class="fas fa-trash"></i> سلة المحذوفات
            </a>
        </div>
    </div>

    {{-- رسالة النجاح --}}
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>اسم المنتج</th>
                        <th>رمز SKU</th>
                        <th>الفئة</th>
                        <th>سعر البيع</th>
                        <th>الكمية</th>
                        <th class="no-print">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->sku ?? '-' }}</td>
                            <td>{{ $product->category ?? '-' }}</td>
                            <td>{{ number_format($product->sale_price, 2) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('dashboard.products.edit', $product->id) }}" title="تعديل"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من نقل المنتج إلى سلة المحذوفات؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center" style="padding: 2rem;">لا توجد منتجات لعرضها. ابدأ بإضافة منتج جديد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal لإضافة منتج جديد -->
<div id="addProductModal" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>إضافة منتج جديد</h2>
            <span class="close-btn">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.products.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="name">اسم المنتج/الخدمة</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="sku">رمز SKU</label>
                        <input type="text" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="category">الفئة</label>
                        <input type="text" name="category">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">سعر البيع</label>
                        <input type="number" step="0.01" name="sale_price" required>
                    </div>
                    <div class="form-group">
                        <label for="purchase_price">سعر الشراء</label>
                        <input type="number" step="0.01" name="purchase_price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">الكمية المتاحة</label>
                        <input type="number" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="weight">الوزن (كجم)</label>
                        <input type="text" name="weight">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // كود JavaScript لفتح وإغلاق النافذة المنبثقة
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('addProductModal');
        const addBtn = document.getElementById('addProductBtn');
        const closeBtns = document.querySelectorAll('.close-btn');

        addBtn.onclick = function() {
            modal.style.display = "block";
        }

        closeBtns.forEach(btn => {
            btn.onclick = function() {
                modal.style.display = "none";
            }
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
@endpush
@endsection
