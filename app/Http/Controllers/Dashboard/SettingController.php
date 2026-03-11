<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // جلب كل الإعدادات وتحويلها إلى مصفوفة سهلة الاستخدام
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('dashboard.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'opening_balance' => 'nullable|numeric|min:0',
            // يمكنك إضافة إعدادات أخرى هنا في المستقبل
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? 0]
            );
        }

        return redirect()->route('dashboard.settings.index')->with('success', 'تم حفظ الإعدادات بنجاح.');
    }
}
