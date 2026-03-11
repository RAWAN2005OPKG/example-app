<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        {{-- يمكنك وضع شعار الشركة هنا --}}
        <a href="{{ route('dashboard.home') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('path/to/your/logo.png') }}"/>
        </a>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon-xl"><!-- SVG icon --></span>
        </button>
    </div>
    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{ request()->routeIs('dashboard.home') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('dashboard.home') }}" class="menu-link">
                        <span class="svg-icon menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="menu-text">لوحة التحكم</span>
                    </a>
                </li>

                <li class="menu-section"><h4 class="menu-text">الإدارة</h4><i class="menu-icon ki ki-bold-more-hor icon-md"></i></li>

                {{-- قائمة الخزينة العامة --}}
                <li class="menu-item menu-item-submenu {{ request()->is('dashboard/payments*') || request()->is('dashboard/cash*') || request()->is('dashboard/banks*') || request()->is('dashboard/bank-accounts*') || request()->is('dashboard/bank-transactions*') || request()->is('dashboard/fund-transfers*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><i class="fas fa-wallet"></i></span><span class="menu-text">الخزينة العامة</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu">
                        <ul class="menu-subnav">
                            <li class="menu-item"><a href="{{ route('dashboard.payments.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">سجل القيود (الدفعات)</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.cash.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">المحفظة النقدية</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.banks.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">دليل البنوك</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.bank-accounts.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">الحسابات البنكية</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.bank-transactions.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">الحركات البنكية</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.fund-transfers.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">تحويل الأموال</span></a></li>
<li class="menu-item {{ request()->routeIs('dashboard.checks.index') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('dashboard.checks.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                    <span class="menu-text">قائمة الشيكات</span>
                </a>
            </li>

                            <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard.expenses.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">دراسة تحليل المشروع</span>
                    </a>
                </li>

<li class="menu-item" aria-haspopup="true">
                <a href="{{ route('dashboard.supplier_expenses.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                    <span class="menu-text">مصروفات المورّدين</span>
                </a>
            </li>

                        </ul>
                    </div>
                </li>

                {{-- قائمة السندات الخارجية --}}
                <li class="menu-item menu-item-submenu {{ request()->is('dashboard/khaled*') || request()->is('dashboard/mohammed*') || request()->is('dashboard/wali*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><i class="fas fa-receipt"></i></span><span class="menu-text">السندات الخارجية</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu">
                        <ul class="menu-subnav">
                            <li class="menu-item"><a href="{{ route('dashboard.khaled.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">سندات خالد</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.mohammed.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">سندات محمد</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.wali.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">سندات وليد</span></a></li>
                        </ul>
                    </div>
                </li>

                {{-- قائمة المشاريع --}}
                <li class="menu-item menu-item-submenu {{ request()->is('dashboard/projects*') || request()->is('dashboard/reportproject*') || request()->is('dashboard/project-transfers*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><i class="fas fa-project-diagram"></i></span><span class="menu-text">المشاريع</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu">
                        <ul class="menu-subnav">
                            <li class="menu-item"><a href="{{ url('dashboard/projects') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">جميع المشاريع</span></a></li>
                            <li class="menu-item"><a href="{{ url('dashboard/reportproject') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">تحليل جميع المشاريع</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.project-transfers.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">تحويل المشاريع</span></a></li>
                        </ul>
                    </div>
                </li>

                {{-- قائمة دائرة العمل --}}
                <li class="menu-item menu-item-submenu {{ request()->is('dashboard/clients*') || request()->is('dashboard/investors*') || request()->is('dashboard/subcontractors*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle"><i class="menu-icon fas fa-users"></i><span class="menu-text">دائرة العمل</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu">
                        <ul class="menu-subnav">
                            <li class="menu-item"><a href="{{ route('dashboard.clients.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">العملاء</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.investors.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">المستثمرون</span></a></li>
                            <li class="menu-item"><a href="{{ route('dashboard.subcontractors.index') }}" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">المقاولون والموردون</span></a></li>
                        </ul>
                    </div>
                </li>

                {{-- التقارير والإحصائيات الشاملة --}}
                <li class="menu-section"><h4 class="menu-text">التقارير والمقادير</h4><i class="menu-icon ki ki-bold-more-hor icon-md"></i></li>
                
                {{-- صفحة إجمالي كافة الحسابات --}}
                <li class="menu-item {{ request()->routeIs('dashboard.financial-accounts.index') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('dashboard.financial-accounts.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon"><i class="fas fa-coins"></i></span>
                        <span class="menu-text">إجمالي كافة الحسابات</span>
                    </a>
                </li>

                {{-- صفحة التحليل المالي والميزانية --}}
                <li class="menu-item {{ request()->routeIs('dashboard.financial.summary') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('dashboard.financial.summary') }}" class="menu-link">
                        <span class="svg-icon menu-icon"><i class="fas fa-chart-pie"></i></span>
                        <span class="menu-text">التحليل المالي</span>
                    </a>
                </li>

                {{-- الربح السنوي --}}
                <li class="menu-item"><a href="{{ route('dashboard.annual-profit.index') }}" class="menu-link"><span class="svg-icon menu-icon"><i class="fas fa-chart-line"></i></span><span class="menu-text">الربح السنوي</span></a></li>

                {{-- باقي القوائم --}}
                <li class="menu-section"><h4 class="menu-text">الإعدادات والمستخدمين</h4><i class="menu-icon ki ki-bold-more-hor icon-md"></i></li>
                <li class="menu-item"><a href="{{ route('dashboard.contracts.index') }}" class="menu-link"><span class="svg-icon menu-icon"><i class="fas fa-file-signature"></i></span><span class="menu-text">العقود</span></a></li>
                <li class="menu-item"><a href="{{ url('dashboard/employees') }}" class="menu-link"><span class="svg-icon menu-icon"><i class="fas fa-users-cog"></i></span><span class="menu-text">المستخدمون</span></a></li>
                <li class="menu-item"><a href="{{ route('dashboard.alerts.index') }}" class="menu-link"><span class="svg-icon menu-icon"><i class="fas fa-bell"></i></span><span class="menu-text">التنبيهات</span></a></li>
                <li class="menu-item"><a href="{{ route('dashboard.settings.index') }}" class="menu-link"><i class="menu-icon fas fa-cogs"></i><span class="menu-text">الإعدادات</span></a></li>

                <li class="menu-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();" class="menu-link">
                        <span class="svg-icon menu-icon"><i class="fas fa-sign-out-alt"></i></span><span class="menu-text">تسجيل الخروج</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end::Aside-->

<!-- الفورم المخفي ضروري لعملية تسجيل الخروج -->
<form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
