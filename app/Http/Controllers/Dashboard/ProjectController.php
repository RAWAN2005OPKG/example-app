<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProjectController extends Controller
{
    /**
     * عرض قائمة المشاريع.
     */
    public function index()
    {
        $projects = Project::withCount('units')->latest()->paginate(10);
        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * عرض نموذج إنشاء مشروع جديد.
     */
    public function create()
    {
        // لم نعد بحاجة لإرسال أي بيانات إلى هذه الصفحة
        return view('dashboard.projects.create');
    }

    /**
     * حفظ مشروع جديد في قاعدة البيانات (نسخة مبسطة).
     */
    public function store(Request $request)
    {
        // 1. قواعد التحقق المبسطة (تم حذف قسم المستثمرين)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
            'start_date' => 'required|date',
            'estimated_end_date' => 'nullable|date|after_or_equal:start_date',
            'duration_months' => 'nullable|integer|min:0',
            'main_contractor' => 'nullable|string|max:255',
            'architect' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120', // 5MB max per file
            'estimated_cost_usd' => 'nullable|numeric|min:0',
            'estimated_cost_ils' => 'nullable|numeric|min:0',
            'exchange_rate' => 'required|numeric|min:0',
            'units' => 'nullable|array',
            'units.*.unit_number' => 'required|string|max:255',
            'units.*.unit_type' => 'required|string|max:255',
            'units.*.area' => 'required|numeric|min:1',
            'units.*.floor' => 'nullable|integer',
            'units.*.finish_type' => 'required|in:finished,unfinished',
            'units.*.has_parking' => 'required|boolean',
            'units.*.price_usd' => 'nullable|numeric|min:0',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $request) {
                // 2. معالجة المرفقات
                $attachmentsPaths = [];
                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $file) {
                        $attachmentsPaths[] = $file->store('projects/attachments', 'public');
                    }
                }

                // 3. إنشاء المشروع
                $projectData = collect($validatedData)->except(['units'])->toArray();
                $projectData['attachments'] = $attachmentsPaths;
                $project = Project::create($projectData);

                // 4. إضافة الوحدات (إن وجدت)
                if (!empty($validatedData['units'])) {
                    $exchangeRate = $validatedData['exchange_rate'];
                    foreach ($validatedData['units'] as $unitData) {
                        $priceUSD = $unitData['price_usd'] ?? 0;
                        $priceILS = $priceUSD * $exchangeRate;
                        $project->units()->create(array_merge($unitData, [
                            'price_ils' => $priceILS
                        ]));
                    }
                }
            });

            return redirect()->route('dashboard.projects.index')->with('success', 'تم حفظ المشروع بنجاح.');

        } catch (Throwable $e) {
            return back()->withInput()->with('error', 'حدث خطأ أثناء حفظ المشروع: ' . $e->getMessage());
        }
    }

    /**
     * عرض تفاصيل مشروع محدد.
     */
    public function show(Project $project)
    {
        // تحميل العلاقات المطلوبة بكفاءة
        $project->load(['units', 'investors']);

        // حساب الإحصائيات الشاملة
        $total_units = $project->units->count();
        $units_sold = $project->units->where('status', 'sold')->count();
        $units_reserved = $project->units->where('status', 'reserved')->count();
        $units_available = $total_units - $units_sold - $units_reserved;

        $estimated_cost_usd = $project->estimated_cost_usd ?? 0;
        $total_units_value_usd = $project->units->sum('price_usd');
        $sold_units_value_usd = $project->units->where('status', 'sold')->sum('price_usd');
        $expected_profit_usd = $total_units_value_usd - $estimated_cost_usd;

        $stats = [
            'total_units' => $total_units,
            'units_sold' => $units_sold,
            'units_reserved' => $units_reserved,
            'units_available' => $units_available,
            'estimated_cost_usd' => $estimated_cost_usd,
            'total_units_value_usd' => $total_units_value_usd,
            'sold_units_value_usd' => $sold_units_value_usd,
            'expected_profit_usd' => $expected_profit_usd > 0 ? $expected_profit_usd : 0,
        ];

        return view('dashboard.projects.show', compact('project', 'stats'));
    }

    /**
     * عرض نموذج تعديل مشروع محدد.
     */
    public function edit(Project $project)
    {
        $project->load(['units']);
        // لم نعد بحاجة لإرسال المستثمرين أو تحميلهم هنا
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * تحديث مشروع محدد في قاعدة البيانات (نسخة مبسطة).
     */
    public function update(Request $request, Project $project)
    {
        // 1. قواعد التحقق مطابقة لدالة store المبسطة
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
            'start_date' => 'required|date',
            'estimated_end_date' => 'nullable|date|after_or_equal:start_date',
            'duration_months' => 'nullable|integer|min:0',
            'main_contractor' => 'nullable|string|max:255',
            'architect' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'exchange_rate' => 'required|numeric|min:0',
            'units' => 'nullable|array',
            'units.*.unit_number' => 'required|string|max:255',
            'units.*.unit_type' => 'required|string|max:255',
            'units.*.area' => 'required|numeric|min:1',
            'units.*.floor' => 'nullable|integer',
            'units.*.finish_type' => 'required|in:finished,unfinished',
            'units.*.has_parking' => 'required|boolean',
            'units.*.price_usd' => 'nullable|numeric|min:0',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $request, $project) {
                // 2. تحديث بيانات المشروع الأساسية
                $projectData = collect($validatedData)->except(['units', 'attachments'])->toArray();
                $project->update($projectData);

                // 3. تحديث الوحدات (حذف القديم وإضافة الجديد لضمان التزامن)
                $project->units()->delete();
                if (!empty($validatedData['units'])) {
                    $exchangeRate = $validatedData['exchange_rate'];
                    foreach ($validatedData['units'] as $unitData) {
                        $priceUSD = $unitData['price_usd'] ?? 0;
                        $priceILS = $priceUSD * $exchangeRate;
                        $project->units()->create(array_merge($unitData, ['price_ils' => $priceILS]));
                    }
                }
            });

            return redirect()->route('dashboard.projects.show', $project->id)->with('success', 'تم تحديث المشروع بنجاح.');

        } catch (Throwable $e) {
            return back()->withInput()->with('error', 'حدث خطأ أثناء تحديث المشروع: ' . $e->getMessage());
        }
    }

    /**
     * حذف مشروع.
     */
    public function destroy(Project $project)
    {
        try {
            // حذف المرفقات من الـ storage قبل حذف سجل المشروع
            if ($project->attachments) {
                foreach ($project->attachments as $path) {
                    Storage::disk('public')->delete($path);
                }
            }
            $project->delete();
            return redirect()->route('dashboard.projects.index')->with('success', 'تم حذف المشروع بنجاح.');
        } catch (Throwable $e) {
            return back()->with('error', 'لا يمكن حذف المشروع: ' . $e->getMessage());
        }
    }
}
