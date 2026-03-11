<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting; // تأكد من استيراد موديل الإعدادات

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // هذا هو الجزء الأهم
        // نحن نربط الـ Composer بواجهة لوحة التحكم الرئيسية
        // غيّر 'dashboard.index' إلى اسم الواجهة الصحيح عندك
        View::composer('dashboard.index', function ($view) {
            // ابحث عن الإعداد الذي يحتوي على المبلغ الكلي
            // افترض أن اسم الحقل في جدول الإعدادات هو 'total_budget'
            $totalBudgetSetting = Setting::where('key', 'total_budget')->first();

            // قم بتمرير القيمة إلى الواجهة، مع قيمة افتراضية (0) إذا لم يتم العثور عليها
            $totalBudget = $totalBudgetSetting ? $totalBudgetSetting->value : 0;

            // الآن، المتغير $totalBudget سيكون متاحاً دائماً في واجهة dashboard.index
            $view->with('totalBudget', $totalBudget);
        });

        // يمكنك إضافة المزيد من الـ Composers هنا لصفحات أخرى
        // مثال:
        // View::composer('dashboard.reports.financial', function ($view) { ... });
    }
}
