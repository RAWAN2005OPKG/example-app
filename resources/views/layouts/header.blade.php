<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!-- يمكنك إضافة عناصر قائمة علوية هنا إذا أردت -->
            </div>
        </div>
        <!--end::Header Menu Wrapper-->

        <!--begin::Topbar-->
        <div class="topbar">

            {{-- =================================================== --}}
            {{-- >>== قسم الإشعارات الجديد ==<< --}}
            {{-- =================================================== --}}
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <i class="far fa-bell"></i>
                        </span>
                        {{-- نقطة حمراء تظهر فقط إذا كانت هناك إشعارات غير مقروءة --}}
                        @if(Auth::user()->unreadNotifications->count() > 0)
                            <span class="label label-sm label-dot label-danger" style="position: absolute; top: 15px; right: 15px;"></span>
                        @endif
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('dashboard/assets/media/misc/bg-1.jpg') }})">
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">الإشعارات</span>
                                {{-- عرض عدد الإشعارات الجديدة --}}
                                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{ Auth::user()->unreadNotifications->count() }} جديدة</span>
                            </h4>
                        </div>
                        <!--end::Header-->

                        <!--begin::Content-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_quick_notifications_tabs_notifications" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                                    
                                    {{-- عرض آخر 5 إشعارات للمستخدم --}}
                                    @forelse(Auth::user()->notifications->take(5) as $notification)
                                        <a href="{{ $notification->data['link'] ?? '#' }}" class="navi-item">
                                            <div class="navi-link">
                                                <div class="navi-icon mr-2">
                                                    <i class="{{ $notification->data['icon'] ?? 'fas fa-info-circle' }} text-primary"></i>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold">{{ $notification->data['title'] }}</div>
                                                    <div class="text-muted">{{ $notification->created_at->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        {{-- رسالة في حالة عدم وجود إشعارات --}}
                                        <div class="d-flex flex-center text-center text-muted min-h-200px">
                                            لا توجد إشعارات لعرضها.
                                        </div>
                                    @endforelse

                                </div>
                                <!--end::Nav-->
                            </div>
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>


            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">مرحباً,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
