@extends('layouts.container')
@section('title', 'لوحة التحكم الرئيسية')

@push('styles')
<style>
    /* تصميم بطاقة المبلغ الرئيسي */
    .main-capital-card {
        background: linear-gradient(45deg, #4e73df 0%, #36b9cc 100%);
        color: white;
        text-align: center;
        padding: 2.5rem;
        border-radius: 1rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
    }
    .main-capital-card h1 {
        font-size: 1.75rem;
        font-weight: 300;
        margin-bottom: 0.5rem;
        letter-spacing: 1px;
    }
    .main-capital-card .display-4 {
        font-size: 4rem;
        font-weight: 700;
    }

    /* تصميم بطاقات الملخصات الفرعية */
    .sub-stat-card {
        text-align: center;
        padding: 1.5rem;
        border-radius: 0.75rem;
        background-color: #fff;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
        transition: transform 0.3s ease;
    }
    .sub-stat-card:hover {
        transform: translateY(-5px);
    }
    .sub-stat-card .icon { font-size: 2.5rem; margin-bottom: 1rem; }
    .sub-stat-card .title { font-weight: 700; color: #5a5c69; }
    .sub-stat-card .value { font-size: 1.75rem; font-weight: 700; }
    .text-success { color: #1cc88a !important; }
    .text-info { color: #36b9cc !important; }
    .text-warning { color: #f6c23e !important; }

    /* تصميم قسم أزرار الوصول السريع */
    .quick-actions-card {
        background-color: #fff;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
    .quick-actions-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #5a5c69;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .quick-action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        border-radius: 0.75rem;
        text-decoration: none !important;
        color: #fff;
        transition: all 0.3s ease;
        height: 120px;
    }
    .quick-action-btn:hover {
        transform: scale(1.05);
        color: #fff;
    }
    .quick-action-btn i { font-size: 2rem; margin-bottom: 0.5rem; }
    .quick-action-btn span { font-weight: 600; }
    .bg-primary-light { background-color: #4e73df; }
    .bg-success-light { background-color: #1cc88a; }
    .bg-info-light { background-color: #36b9cc; }
    .bg-warning-light { background-color: #f6c23e; }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <!-- ================================================== -->
    <!-- == القسم الأول: المبلغ الرئيسي (كما طلبت تماماً) == -->
    <!-- ================================================== -->
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="main-capital-card" style="background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);">
                <h1>الإيرادات الإجمالية</h1>
                <div class="display-4" style="font-size: 2.5rem;">{{ number_format($totalRevenue, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="main-capital-card" style="background: linear-gradient(45deg, #1cc88a 0%, #13855c 100%);">
                <h1>صافي الربح</h1>
                <div class="display-4" style="font-size: 2.5rem;">{{ number_format($totalProfit, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="main-capital-card">
                <h1>الرقم الأساسي</h1>
                <div class="display-4" style="font-size: 2.5rem;">{{ number_format($openingBalance, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="main-capital-card">
                <h1>الإجمالي الحالي</h1>
                <div class="display-4" style="font-size: 2.5rem;">{{ number_format($totalCapital, 2) }} ILS</div>
            </div>
        </div>
    </div>

    <!-- ملخصات فرعية تحت المبلغ الرئيسي -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="sub-stat-card">
                <div class="icon text-success"><i class="fas fa-cash-register"></i></div>
                <div class="title">رصيد الخزينة (الكاش)</div>
                <div class="value text-dark">{{ number_format($totalCashBalance, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="sub-stat-card">
                <div class="icon text-info"><i class="fas fa-university"></i></div>
                <div class="title">إجمالي أرصدة البنوك</div>
                <div class="value text-dark">{{ number_format($totalBankBalance, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="sub-stat-card">
                <div class="icon text-warning"><i class="fas fa-money-check-alt"></i></div>
                <div class="title">إجمالي الشيكات</div>
                <div class="value text-dark">{{ number_format($checksBalance, 2) }} ILS</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="sub-stat-card">
                <div class="icon text-warning"><i class="fas fa-project-diagram"></i></div>
                <div class="title">المشاريع النشطة</div>
                <div class="value text-dark">{{ $activeProjectsCount }} / {{ $projectsCount }}</div>
            </div>
        </div>
    </div>

    <!-- ================================================== -->
    <!-- == القسم الجديد: أزرار الوصول السريع             == -->
    <!-- ================================================== -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="quick-actions-card">
                <h5 class="quick-actions-title">العمليات السريعة</h5>
                <div class="row">
                    <div class="col-lg-3 col-6 mb-3">
                        <a href="{{ route('dashboard.expenses.create') }}" class="quick-action-btn bg-danger text-white">
                            <i class="fas fa-minus-circle"></i>
                            <span>إضافة مصروف</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-3">
                        <a href="{{ route('dashboard.payments.create') }}" class="quick-action-btn bg-success-light text-white">
                            <i class="fas fa-plus-circle"></i>
                            <span>إضافة قيد يومي</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-3">
                        <a href="{{ route('dashboard.clients.create') }}" class="quick-action-btn bg-primary-light text-white">
                            <i class="fas fa-user-plus"></i>
                            <span>إضافة عميل</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-3">
                        <a href="{{ route('dashboard.projects.create') }}" class="quick-action-btn bg-warning-light text-white">
                            <i class="fas fa-building"></i>
                            <span>إضافة مشروع</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ================================================== -->
    <!-- == القسم الثاني: الرسوم البيانية                  == -->
    <!-- ================================================== -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">نظرة عامة على التدفقات المالية (آخر 6 أشهر)</h6></div>
                <div class="card-body">
                    <div class="chart-area" style="height: 320px;"><canvas id="monthlyFlowChart"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">توزيع السيولة الحالية</h6></div>
                <div class="card-body">
                    <div class="chart-pie pt-4" style="height: 320px;"><canvas id="liquidityPieChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>


    <!-- ================================================== -->
    <!-- == القسم الثالث: آخر الحركات                      == -->
    <!-- ================================================== -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-success">آخر حركات الخزينة</h6></div>
                <div class="card-body">
                    @forelse($latestCash as $tx)
                        <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                            <span>{{ $tx->source }}</span>
                            <span class="font-weight-bold {{ $tx->type == 'in' ? 'text-success' : 'text-danger' }}">
                                {{ $tx->type == 'in' ? '+' : '-' }} {{ number_format($tx->amount_ils, 2) }} ILS
                            </span>
                        </div>
                    @empty
                        <p class="text-center text-muted">لا توجد حركات نقدية بعد.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-info">آخر حركات البنوك</h6></div>
                <div class="card-body">
                     @forelse($latestBank as $tx)
                        <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                            <span>{{ $tx->details }}</span>
                            <span class="font-weight-bold {{ $tx->type == 'deposit' ? 'text-success' : 'text-danger' }}">
                                {{ $tx->type == 'deposit' ? '+' : '-' }} {{ number_format($tx->amount, 2) }} {{ $tx->currency }}
                            </span>
                        </div>
                    @empty
                        <p class="text-center text-muted">لا توجد حركات بنكية بعد.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
{{-- مكتبة الرسوم البيانية --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function( ) {
    // بيانات من المتحكم
    const liquidityData = JSON.parse('{!! $liquidityData !!}');
    const monthlyFlowData = JSON.parse('{!! $monthlyFlowData !!}');

    // 1. إعداد الرسم البياني الدائري
    new Chart(document.getElementById('liquidityPieChart'), {
        type: 'doughnut',
        data: {
            labels: liquidityData.labels,
            datasets: [{
                data: liquidityData.data,
                backgroundColor: ['#f6c23e', '#1cc88a', '#36b9cc', '#858796'],
                hoverBackgroundColor: ['#dda20a', '#17a673', '#2c9faf', '#60616f'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: { backgroundColor: "rgb(255,255,255)", bodyFontColor: "#858796", borderColor: '#dddfeb', borderWidth: 1, xPadding: 15, yPadding: 15, displayColors: false, caretPadding: 10, },
            legend: { display: true, position: 'bottom' },
            cutoutPercentage: 80,
        },
    });

    // 2. إعداد الرسم البياني الخطي
    new Chart(document.getElementById('monthlyFlowChart'), {
        type: 'line',
        data: {
            labels: monthlyFlowData.labels,
            datasets: [{
                label: "الإيرادات",
                lineTension: 0.3,
                backgroundColor: "rgba(28, 200, 138, 0.05)",
                borderColor: "#1cc88a",
                pointRadius: 3,
                pointBackgroundColor: "#1cc88a",
                pointBorderColor: "#1cc88a",
                data: monthlyFlowData.income,
            }, {
                label: "المصروفات",
                lineTension: 0.3,
                backgroundColor: "rgba(231, 74, 59, 0.05)",
                borderColor: "#e74a3b",
                pointRadius: 3,
                pointBackgroundColor: "#e74a3b",
                pointBorderColor: "#e74a3b",
                data: monthlyFlowData.expenses,
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: { xAxes: [{ gridLines: { display: false, drawBorder: false } }], yAxes: [{ ticks: { maxTicksLimit: 5, padding: 10 } }], },
            legend: { display: true },
            tooltips: { mode: 'index', intersect: false },
            hover: { mode: 'nearest', intersect: true }
        }
    });
});
</script>
@endpush
