<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProjectTransfer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProjectTransferController extends Controller
{
    public function index(Request $request) {
        $query = ProjectTransfer::with(['fromProject', 'toProject', 'user'])->latest();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('notes', 'like', '%' . $request->search . '%')
                  ->orWhere('amount', 'like', '%' . $request->search . '%');
            });
        }

        $transfers = $query->paginate(15);
        return view('dashboard.project_transfers.index', compact('transfers'));
    }

    public function create() {
        $projects = Project::where('status', '!=', 'completed')->get();
        return view('dashboard.project_transfers.create', compact('projects'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'from_project_id' => ['required', 'exists:projects,id', 'different:to_project_id'],
            'to_project_id' => ['required', 'exists:projects,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'transfer_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ], [
            'from_project_id.different' => 'لا يمكن التحويل إلى نفس المشروع.'
        ]);

        DB::beginTransaction();
        try {
            $fromProject = Project::findOrFail($validated['from_project_id']);
            $toProject = Project::findOrFail($validated['to_project_id']);

            // تحقق من توفر الرصيد الكافي
            if ($fromProject->balance < $validated['amount']) {
                return back()->with('error', 'الرصيد في المشروع المصدر غير كافٍ. الرصيد الحالي: ' . number_format($fromProject->balance, 2))->withInput();
            }

            // إنشاء سجل التحويل
            ProjectTransfer::create($validated + ['user_id' => Auth::id()]);

            // تحديث أرصدة المشاريع
            $fromProject->decrement('balance', $validated['amount']);
            $toProject->increment('balance', $validated['amount']);

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم تحويل المبلغ بين المشاريع بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(ProjectTransfer $projectTransfer) {
        $projects = Project::where('status', '!=', 'completed')->get();
        return view('dashboard.project_transfers.edit', compact('projectTransfer', 'projects'));
    }

    public function update(Request $request, ProjectTransfer $projectTransfer) {
        $validated = $request->validate([
            'from_project_id' => ['required', 'exists:projects,id', 'different:to_project_id'],
            'to_project_id' => ['required', 'exists:projects,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'transfer_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::beginTransaction();
        try {
            // 1. عكس العملية القديمة
            $oldFromProject = Project::find($projectTransfer->from_project_id);
            $oldToProject = Project::find($projectTransfer->to_project_id);
            $oldFromProject->increment('balance', $projectTransfer->amount);
            $oldToProject->decrement('balance', $projectTransfer->amount);

            // 2. تطبيق العملية الجديدة
            $newFromProject = Project::find($validated['from_project_id']);
            $newToProject = Project::find($validated['to_project_id']);
            $newFromProject->decrement('balance', $validated['amount']);
            $newToProject->increment('balance', $validated['amount']);

            // 3. تحديث سجل التحويل نفسه
            $projectTransfer->update($validated);

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم تحديث التحويل بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(ProjectTransfer $projectTransfer) {
        DB::beginTransaction();
        try {
            // عكس أثر التحويل على أرصدة المشاريع قبل الحذف
            $fromProject = Project::find($projectTransfer->from_project_id);
            $toProject = Project::find($projectTransfer->to_project_id);
            $fromProject->increment('balance', $projectTransfer->amount);
            $toProject->decrement('balance', $projectTransfer->amount);

            // حذف سجل التحويل
            $projectTransfer->delete();

            DB::commit();
            return redirect()->route('dashboard.project-transfers.index')->with('success', 'تم حذف التحويل وعكس أثره المالي بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }
}
