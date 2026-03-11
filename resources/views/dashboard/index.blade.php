@extends('layouts.container')
@section('title', 'لوحة التحكم الرئيسية')

@push('styles')
<style>
    .kpi-card { background-color: #ffffff; border-radius: 0.75rem; padding: 25px; text-align: center; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15); transition: all 0.3s ease; height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .kpi-card:hover { transform: translateY(-5px); box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.1); }
    .kpi-card .kpi-title { font-size: 1rem; color: #858796; margin-bottom: 10px; font-weight: 600; }
    .kpi-card .kpi-value { font-size: 2.2rem; font-weight: 700; color: #3a3b45; }
    .kpi-value.positive { color: #1cc88a; }
    .kpi-value.negative { color: #e74a3b; }
    .quick-actions .btn { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 110px; font-size: 1rem; font-weight: 600; gap: 8px; border-radius: 0.75rem; }
    .quick-actions .btn i { font-size: 1.8rem; }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="kpi-title">الرصيد الافتتاحي</div>
                <div class="kpi-value">{{ number_format($openingBalance, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="kpi-title">إجمالي الإيرادات</div>
                <div class="kpi-value positive">+ {{ number_format($totalRevenue, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="kpi-title">إجمالي المصروفات</div>
                <div class="kpi-value negative">- {{ number_format($totalExpenses, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="kpi-card" style="border: 2px solid #4e73df;">
                <div class="kpi-title">السيولة الحالية</div>
                <div class="kpi-value {{ $currentCash >= 0 ? 'positive' : 'negative' }}">{{ number_format($currentCash, 2) }} ILS</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card card-custom h-100">
                <div class="card-header"><h3 class="card-title">نظرة عامة (مثال)</h3></div>
                <div class="card-body"><canvas id="revenueExpenseChart"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card card-custom h-100">
                <div class="card-header"><h3 class="card-title">إجراءات سريعة</h3></div>
                <div class="card-body">
                    <div class="row quick-actions">
                        <div class="col-6 mb-3"><a href="{{ route('dashboard.contracts.create') }}" class="btn btn-light-primary w-100"><i class="fas fa-file-signature"></i> عقد جديد</a></div>
                        <div class="col-6 mb-3"><a href="{{ route('dashboard.supplier-expenses.create') }}" class="btn btn-light-danger w-100"><i class="fas fa-hand-holding-usd"></i> مصروف مورد</a></div>
                        <div class="col-6"><a href="{{ route('dashboard.projects.create') }}" class="btn btn-light-success w-100"><i class="fas fa-building"></i> مشروع جديد</a></div>
                        <div class="col-6"><a href="{{ route('dashboard.clients.create') }}" class="btn btn-light-info w-100"><i class="fas fa-user-plus"></i> عميل جديد</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function( ) {
        const ctx = document.getElementById('revenueExpenseChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'الإيرادات', data: @json($revenueData), backgroundColor: 'rgba(28, 200, 138, 0.5)', borderColor: 'rgba(28, 200, 138, 1)', borderWidth: 1
                }, {
                    label: 'المصروفات', data: @json($expenseData), backgroundColor: 'rgba(231, 74, 59, 0.5)', borderColor: 'rgba(231, 74, 59, 1)', borderWidth: 1
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
        });
    });
</script>
@endpush
