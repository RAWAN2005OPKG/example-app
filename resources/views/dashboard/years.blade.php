@extends('layouts.container')
@section('title', 'تقرير الربح السنوي')

@section('styles')
<style>
    /* --- نظام التصميم الفاتح والاحترافي - نسخة نهائية --- */
    :root {
        --bg-primary: #f8f9fa;      /* خلفية رئيسية (أبيض مائل للرمادي) */
        --bg-secondary: #ffffff;    /* خلفية البطاقات والجداول (أبيض نقي) */
        --border-color: #dee2e6;    /* لون الحدود (رمادي فاتح) */
        --text-primary: #212529;    /* لون النص الأساسي (أسود داكن) */
        --text-secondary: #6c757d;  /* لون النص الخافت (رمادي متوسط) */
        --accent-primary: #007bff;  /* لون التمييز الأساسي (أزرق قياسي) */
        --accent-success: #28a745;  /* لون الربح (أخضر قياسي) */
        --accent-danger: #dc3545;   /* لون الخسارة (أحمر قياسي) */
        --hover-bg: #f1f3f5;        /* خلفية عند مرور الماوس */
    }
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Cairo', 'Arial', sans-serif; }
    body { background-color: var(--bg-primary); color: var(--text-primary); direction: rtl; }
    .main-content { width: 100%; max-width: 1400px; margin: 0 auto; padding: 30px; }
    .page-header { display: flex; align-items: center; gap: 15px; margin-bottom: 30px; border-bottom: 1px solid var(--border-color); padding-bottom: 20px; }
    .page-header h1 { font-size: 2.2rem; color: var(--text-primary); }
    .page-header i { font-size: 2rem; color: var(--accent-primary); }
    .report-controls { display: flex; gap: 15px; align-items: center; background-color: var(--bg-secondary); padding: 15px; border-radius: 12px; margin-bottom: 30px; border: 1px solid var(--border-color); }
    .report-controls label { font-weight: 600; color: var(--text-secondary); }
    .report-controls select { padding: 10px; background-color: var(--bg-secondary); border: 1px solid var(--border-color); color: var(--text-primary); border-radius: 8px; cursor: pointer; transition: all 0.2s ease; }
    .report-controls select:focus { outline: none; border-color: var(--accent-primary); box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); }
    .kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 40px; }
    .kpi-card { background-color: var(--bg-secondary); padding: 25px; border-radius: 12px; text-align: center; border: 1px solid var(--border-color); box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .kpi-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .kpi-card .label { color: var(--text-secondary); margin-bottom: 15px; font-size: 1.1rem; }
    .kpi-card .value { font-size: 2.2rem; font-weight: 700; }
    .table-container { background-color: var(--bg-secondary); padding: 25px; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow-x: auto; }
    .container-title { font-size: 1.5rem; color: var(--accent-primary); margin-bottom: 20px; }
    .data-table { width: 100%; border-collapse: collapse; min-width: 600px; }
    .data-table th, .data-table td { padding: 15px; text-align: right; border-bottom: 1px solid var(--border-color); }
    .data-table th { background-color: var(--bg-primary); color: var(--text-secondary); font-weight: 600; }
    .data-table tbody tr { transition: background-color 0.2s ease; }
    .data-table tbody tr:hover { background-color: var(--hover-bg); }
    .profit { color: var(--accent-success); font-weight: 500; }
    .loss { color: var(--accent-danger); font-weight: 500; }
    .growth { color: var(--accent-success); }
    .decline { color: var(--accent-danger); }
    .total-row td { border-top: 2px solid var(--accent-primary); font-weight: bold; padding-top: 15px; color: var(--text-primary); font-size: 1.1rem; }
</style>
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <i class="fas fa-chart-line"></i>
        <h1>تقرير الربح السنوي المقارن</h1>
    </div>

    <div class="report-controls">
        <label for="yearSelector">عرض تقرير سنة:</label>
        <select id="yearSelector"></select>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="label" id="kpiCurrentYearLabel">صافي ربح السنة الحالية</div>
            <div class="value" id="kpiCurrentYearNetProfit">0</div>
        </div>
        <div class="kpi-card">
            <div class="label" id="kpiPreviousYearLabel">صافي ربح السنة السابقة</div>
            <div class="value" id="kpiPreviousYearNetProfit">0</div>
        </div>
        <div class="kpi-card">
            <div class="label">نسبة النمو السنوي</div>
            <div class="value" id="kpiAnnualGrowth">0%</div>
        </div>
    </div>

    <div class="table-container">
        <h2 class="container-title" id="tableTitle">مقارنة الأداء الشهري</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>الشهر</th>
                    <th>صافي ربح السنة الحالية</th>
                    <th>صافي ربح السنة السابقة</th>
                    <th>نسبة التغير</th>
                </tr>
            </thead>
            <tbody id="annualTableBody"></tbody>
            <tfoot>
                <tr class="total-row">
                    <td>الإجمالي السنوي</td>
                    <td id="totalCurrentYear">0</td>
                    <td id="totalPreviousYear">0</td>
                    <td id="totalChange">0%</td>
                </tr>
            </tfoot>
        </table>
    </div>
</main>
@endsection

@push('js')

<script>
    // --- البيانات المجهزة من الخادم ---
    const selectedYear = @json($selectedYear);
    const previousYear = @json($previousYear);
    const reportData = @json($reportData);


    // --- دوال مساعدة ---
    function formatCurrency(num) {
        const number = Number(num) || 0;
        return new Intl.NumberFormat('ar-SA', { style: 'currency', currency: 'ILS', minimumFractionDigits: 0 }).format(number);
    }

    function calculateChangePercentage(current, previous) {
        if (previous === 0) {
            if (current > 0) return 'نمو'; // نمو من صفر
            if (current < 0) return 'تراجع'; // تراجع من صفر
            return '---'; // لا تغيير
        }
        const percentage = ((current - previous) / Math.abs(previous)) * 100;
        return percentage.toFixed(1) + '%';
    }

    // --- دالة إنشاء التقرير الرئيسية (مُبسّطة) ---
    function generateAnnualReport() {
        document.getElementById('kpiCurrentYearLabel').textContent = `صافي ربح سنة ${selectedYear}`;
        document.getElementById('kpiPreviousYearLabel').textContent = `صافي ربح سنة ${previousYear}`;
        document.getElementById('tableTitle').textContent = `مقارنة الأداء الشهري بين ${selectedYear} و ${previousYear}`;

        const tableBody = document.getElementById('annualTableBody');
        tableBody.innerHTML = '';

        let totalNetCurrentYear = 0;
        let totalNetPreviousYear = 0;

        // المرور على البيانات الجاهزة القادمة من الخادم
        reportData.forEach(monthData => {
            const netCurrentYear = monthData.net_profit_current;
            const netPreviousYear = monthData.net_profit_previous;
            totalNetCurrentYear += netCurrentYear;
            totalNetPreviousYear += netPreviousYear;

            const change = calculateChangePercentage(netCurrentYear, netPreviousYear);
            const changeClass = change.includes('%') ? (parseFloat(change) >= 0 ? 'growth' : 'decline') : '';

            const row = `<tr>
                            <td>${monthData.month_name}</td>
                            <td class="${netCurrentYear >= 0 ? 'profit' : 'loss'}">${formatCurrency(netCurrentYear)}</td>
                            <td class="${netPreviousYear >= 0 ? 'profit' : 'loss'}">${formatCurrency(netPreviousYear)}</td>
                            <td class="${changeClass}">${change}</td>
                         </tr>`;
            tableBody.innerHTML += row;
        });

        // تحديث بطاقات الأداء (KPIs)
        const kpiCurrentYearEl = document.getElementById('kpiCurrentYearNetProfit');
        kpiCurrentYearEl.textContent = formatCurrency(totalNetCurrentYear);
        kpiCurrentYearEl.className = `value ${totalNetCurrentYear >= 0 ? 'profit' : 'loss'}`;

        const kpiPreviousYearEl = document.getElementById('kpiPreviousYearNetProfit');
        kpiPreviousYearEl.textContent = formatCurrency(totalNetPreviousYear);
        kpiPreviousYearEl.className = `value ${totalNetPreviousYear >= 0 ? 'profit' : 'loss'}`;

        const annualGrowth = calculateChangePercentage(totalNetCurrentYear, totalNetPreviousYear);
        const kpiAnnualGrowthEl = document.getElementById('kpiAnnualGrowth');
        kpiAnnualGrowthEl.textContent = annualGrowth;
        kpiAnnualGrowthEl.className = 'value';
        if (annualGrowth.includes('%')) {
            kpiAnnualGrowthEl.classList.add(parseFloat(annualGrowth) >= 0 ? 'growth' : 'decline');
        }

        // تحديث ملخص الجدول
        document.getElementById('totalCurrentYear').textContent = formatCurrency(totalNetCurrentYear);
        document.getElementById('totalPreviousYear').textContent = formatCurrency(totalNetPreviousYear);
        const totalChangeEl = document.getElementById('totalChange');
        totalChangeEl.textContent = annualGrowth;
        totalChangeEl.className = '';
        if (annualGrowth.includes('%')) {
            totalChangeEl.classList.add(parseFloat(annualGrowth) >= 0 ? 'growth' : 'decline');
        }
    }

    // --- التهيئة عند تحميل الصفحة ---
    document.addEventListener('DOMContentLoaded', function() {
        const yearSelector = document.getElementById('yearSelector');
        const currentServerYear = selectedYear;

        // ملء قائمة السنوات
        for (let year = new Date().getFullYear() + 1; year >= 2020; year--) {
            const option = new Option(year, year);
            yearSelector.add(option);
        }

        // تحديد السنة المختارة حاليًا في القائمة
        yearSelector.value = currentServerYear;

        // إعادة تحميل الصفحة عند تغيير السنة
        yearSelector.addEventListener('change', function() {
            const newYear = this.value;
            // بناء الرابط الجديد مع السنة المختارة
        window.location.href = `{{ route('dashboard.report.annual') }}?year=${newYear}`;
        });

        // إنشاء التقرير بالبيانات التي تم تحميلها من الخادم
        generateAnnualReport();
    });
</script>
@endpush
