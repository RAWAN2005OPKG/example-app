 <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','منصة الراية للعقارات - نظام الإدارة المالية ')</title>
    <link rel="stylesheet" href="{{asset('dashboard/css/index.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body>
    <!-- الشريط الجانبي -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <img src="تنزيل.png" alt="شعار منصة الراية" class="logo">
                <h2>منصة الراية للعقارات</h2>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <div class="search-container">
            <input type="text" placeholder="البحث..." class="search-input">
            <i class="fas fa-search search-icon"></i>
        </div>
        
        <nav class="sidebar-nav">
            <ul>
                <li><a href="index1.html" class="active"><i class="fas fa-home"></i><span>الرئيسية</span></a></li>
                <li><a href="treasury.html"><i class="fas fa-vault"></i><span>الخزينة العامة</span></a></li>
                <li><a href="expenses.html"><i class="fas fa-receipt"></i><span>المصاريف</span></a></li>
                <li><a href="investors.html"><i class="fas fa-users"></i><span>المستثمرين</span></a></li>
                <li><a href="add-project.html"><i class="fas fa-chart-line"></i><span>تحليل المشاريع</span></a></li>
                <li><a href="projects.html"><i class="fas fa-building"></i><span>المشاريع</span></a></li>
                <li><a href="active-contracts.html"><i class="fas fa-file-contract"></i><span>العقود</span></a></li>
                <li><a href="customers.html"><i class="fas fa-user-friends"></i><span>العملاء</span></a></li>
                <li><a href="employees.html"><i class="fas fa-user-cog"></i><span>المستخدمين</span></a></li>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="dark-mode-toggle">
                <button id="darkModeToggle">
                    <i class="fas fa-moon"></i>
                    <span>الوضع الليلي</span>
                </button>
            </div>
        </div>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content" id="mainContent">
        <!-- الشريط العلوي -->
        <header class="top-header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>لوحة التحكم</h1>
                <p>مرحباً بك في نظام الإدارة المالية المشاريع العقارية</p>
            </div>
            <div class="header-right">
                <div class="date-display">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="notifications">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                </div>
                <div class="user-profile">
                    <img src="rawan.jpg" alt="صورة المستخدم" class="user-avatar">
                    <div class="user-info">
                        <span class="user-name">Rawan AL-tayyan</span>
                        <span class="user-role">إشراف </span>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

    </div>

    
    <script src="control.js"></script>
</body>
</html>

