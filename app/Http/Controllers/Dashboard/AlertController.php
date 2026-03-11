<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Check;
use Carbon\Carbon;

class AlertController extends Controller
{
    public function index()
    {
        // 1. تنبيهات الشيكات المستحقة خلال 7 أيام قادمة
        $upcomingChecks = Check::where('status', 'in_wallet') // الشيكات التي لم تُصرف بعد
                               ->whereBetween('due_date', [Carbon::now(), Carbon::now()->addDays(7)])
                               ->orderBy('due_date', 'asc')
                               ->get();

        // 2. تنبيهات الشيكات المرتجعة التي لم يتم التعامل معها
        $returnedChecks = Check::where('status', 'returned')
                               // يمكنك إضافة شرط آخر هنا إذا كان هناك حقل يدل على أنه تم التعامل معها
                               ->get();

        // يمكنك إضافة المزيد من التنبيهات هنا بنفس الطريقة
        // مثال: تنبيهات المنتجات التي وصلت لحد الطلب
        // $lowStockProducts = Product::whereColumn('stock', '<=', 'reorder_level')->get();

        return view('dashboard.alerts.index', compact(
            'upcomingChecks',
            'returnedChecks'
            // 'lowStockProducts'
        ));
    }
}
