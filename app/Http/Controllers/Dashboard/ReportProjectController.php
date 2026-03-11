<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReportProject;
use Illuminate\Http\Request;

class ReportProjectController extends Controller
{
    // 1. عرض القائمة الرئيسية مع البحث
    public function index(Request $request)
    {
        $query = ReportProject::latest();

        // منطق البحث
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('project_title', 'like', "%{$searchTerm}%")
                  ->orWhere('owner_name', 'like', "%{$searchTerm}%");
            });
        }

        $reportProjects = $query->paginate(10)->appends($request->query());
        return view('dashboard.reportproject.index', compact('reportProjects'));
    }

    // 2. عرض صفحة الإنشاء
    public function create()
    {
        return view('dashboard.reportproject.create');
    }

    // 3. حفظ التقرير الجديد
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'nullable|string',
            'owner_id' => 'nullable|string',
            'project_status' => 'required|string',
            'start_date' => 'nullable|date',
            'total_budget' => 'nullable|numeric',
            'currency' => 'required|string|size:3',
            'description' => 'nullable|string',
        ]);

        ReportProject::create($validatedData);

        return redirect()->route('dashboard.reportproject.index')->with('success', 'تم حفظ تقرير المشروع بنجاح.');
    }

    // 4. عرض صفحة التعديل
    public function edit(ReportProject $reportproject) // استخدام Route Model Binding
    {
        return view('dashboard.reportproject.edit', ['report' => $reportproject]);
    }

    // 5. تحديث التقرير
    public function update(Request $request, ReportProject $reportproject)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            // ... نفس قواعد التحقق في store
        ]);

        $reportproject->update($validatedData);

        return redirect()->route('dashboard.reportproject.index')->with('success', 'تم تحديث تقرير المشروع بنجاح.');
    }

    // 6. الحذف الناعم (نقل إلى سلة المهملات)
    public function destroy(ReportProject $reportproject)
    {
        $reportproject->delete();
        return redirect()->route('dashboard.reportproject.index')->with('success', 'تم نقل التقرير إلى سلة المهملات.');
    }

    // 7. عرض سلة المهملات
    public function trash()
    {
        $trashedReports = ReportProject::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.reportproject.trash', compact('trashedReports'));
    }

    // 8. استعادة من سلة المهملات
    public function restore($id)
    {
        $report = ReportProject::onlyTrashed()->findOrFail($id);
        $report->restore();
        return redirect()->route('dashboard.reportproject.trash')->with('success', 'تم استعادة التقرير بنجاح.');
    }

    // 9. الحذف النهائي
    public function forceDelete($id)
    {
        $report = ReportProject::onlyTrashed()->findOrFail($id);
        $report->forceDelete();
        return redirect()->route('dashboard.reportproject.trash')->with('success', 'تم حذف التقرير نهائياً.');
    }
}
