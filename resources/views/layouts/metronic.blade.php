<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'لوحة التحكم')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- ========================================================= --}}
    {{--  هنا يجب وضع روابط ملفات CSS الخاصة بقالب Metronic --}}
    {{--  مثال: --}}
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- ========================================================= --}}

    @yield('styles') {{-- قسم إضافي لوضع ستايلات خاصة بكل صفحة --}}
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <div class="brand flex-column-auto" id="kt_brand">
                    {{-- يمكنك وضع اللوجو هنا --}}
                    <a href="{{ route('dashboard.home') }}" class="brand-logo">
                        <img alt="Logo" src="{{-- asset('path/to/your/logo.png') --}}" />
                    </a>
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999 ) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757185,8.26284586 L22.6757185,13.7628459 C23.0828375,14.1360383 23.1103404,14.7686056 22.737148,15.1757246 C22.3639556,15.5828436 21.7313882,15.6103465 21.3242692,15.2371541 L16.0300695,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                        {{-- =================================================== --}}
                        {{-- هنا تم وضع كود القائمة الجانبية بالكامل --}}
                        {{-- =================================================== --}}
                        <ul class="menu-nav">
                            <li class="menu-item {{ request()->routeIs('dashboard.home') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{ route('dashboard.home') }}" class="menu-link">
                                    <span class="svg-icon menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                                    <span class="menu-text">لوحة التحكم</span>
                                </a>
                            </li>

                            <li class="menu-section">
                                <h4 class="menu-text">الإدارة</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>

                            <li class="menu-item menu-item-submenu {{ request()->is('dashboard/financial-accounts*') || request()->is('dashboard/fund-transfers*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon"><i class="fas fa-wallet"></i></span>
                                    <span class="menu-text">الإدارة المالية</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <ul class="menu-subnav">
                                        {{-- الرابط الجديد للمركز المالي --}}
                                        <li class="menu-item {{ request()->routeIs('dashboard.financial-accounts.index') ? 'menu-item-active' : '' }}">
                                            <a href="{{ route('dashboard.financial-accounts.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                <span class="menu-text">المركز المالي</span>
                                            </a>
                                        </li>
                                        <li class="menu-item {{ request()->routeIs('dashboard.fund-transfers.*') ? 'menu-item-active' : '' }}">
                                            <a href="{{ route('dashboard.fund-transfers.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                <span class="menu-text">تحويل الأموال</span>
                                            </a>
                                        </li>
                                        {{-- يمكنك إضافة باقي الروابط المالية هنا --}}
                                    </ul>
                                </div>
                            </li>
                            {{-- يمكنك إضافة باقي قوائمك هنا بنفس الطريقة --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            {{-- يمكن وضع عناصر هنا إذا أردت --}}
                        </div>
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Languages-->
                            <div class="dropdown">
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                        <img class="h-20px w-20px rounded-sm" src="{{asset('dashboard/assets/media/svg/flags/226-united-states.svg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover py-4">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="symbol symbol-20 mr-3"><img src="{{asset('dashboard/assets/media/svg/flags/226-united-states.svg')}}" alt="" /></span>
                                                <span class="navi-text">English</span>
                                            </a>
                                        </li>
                                        <li class="navi-item active">
                                            <a href="#" class="navi-link">
                                                <span class="symbol symbol-20 mr-3"><img src="{{asset('dashboard/assets/media/svg/flags/128-spain.svg')}}" alt="" /></span>
                                                <span class="navi-text">Arabic</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Languages-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
                                    <span class="symbol symbol-35 symbol-light-success"><span class="symbol-label font-size-h5 font-weight-bold">S</span></span>
                                </div>
                            </div>
                            <!-- Logout Button -->
                            <div class="topbar-item ml-3">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-light-danger font-weight-bolder">تسجيل الخروج</button>
                                </form>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@yield('title')</h5>
                            </div>
                        </div>
                    </div>
                    <!--end::Subheader-->

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            {{-- =================================================== --}}
                            {{-- هنا سيتم عرض محتوى الصفحة المتغير --}}
                            {{-- =================================================== --}}
                            @yield('content')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    {{-- ========================================================= --}}
    {{--  هنا يجب وضع روابط ملفات JavaScript الخاصة بقالب Metronic --}}
    {{--  مثال: --}}
    <script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/scripts.bundle.js') }}"></script>
    {{-- ========================================================= --}}

    @stack('scripts') {{-- قسم إضافي لوضع سكربتات خاصة بكل صفحة --}}
</body>
</html>
