<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Models\BankAccount;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * عرض قائمة الموظفين مع البحث والترتيب.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        // القيم الافتراضية للترتيب والبحث
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $search = $request->get('search', '');

        // تطبيق البحث إذا كان موجودًا
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('position', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // تطبيق الترتيب مع التحقق من أن العمود مسموح به
        $allowedSortBy = ['name', 'position', 'salary', 'created_at'];
        if (in_array($sortBy, $allowedSortBy)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $employees = $query->paginate(15);

        // إرسال كل المتغيرات اللازمة إلى الـ view
        return view('dashboard.employees.index', compact('employees', 'sortBy', 'sortOrder', 'search'));
    }

    public function create()
    {
        // جلب الحسابات البنكية لإرسالها إلى الواجهة
        $bankAccounts = BankAccount::with('bank')->get();
        return view('dashboard.employees.create', compact('bankAccounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'salary' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'bank_account_id' => 'nullable|exists:bank_accounts,id', // <-- قاعدة التحقق الجديدة
        ]);

        Employee::create($validated);
        return redirect()->route('dashboard.employees.index')->with('success', 'تم إضافة الموظف بنجاح.');
    }

    /**
     * عرض تفاصيل موظف محدد.
     */
   public function show(Employee $employee)
    {
        // تحميل العلاقة لعرضها في الواجهة
        $employee->load('bankAccount.bank');
        return view('dashboard.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        // جلب الحسابات البنكية لإرسالها إلى الواجهة
        $bankAccounts = BankAccount::with('bank')->get();
        return view('dashboard.employees.edit', compact('employee', 'bankAccounts'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'salary' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'bank_account_id' => 'nullable|exists:bank_accounts,id',
        ]);

        $employee->update($validated);
        return redirect()->route('dashboard.employees.index')->with('success', 'تم تحديث بيانات الموظف بنجاح.');
    }
    /**
     * نقل الموظف إلى سلة المحذوفات (حذف ناعم).
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('dashboard.employees.index')->with('success', 'تم نقل الموظف إلى سلة المحذوفات بنجاح.');
    }

    // --- دوال سلة المحذوفات ---

    public function trash()
    {
        $trashedEmployees = Employee::onlyTrashed()->latest('deleted_at')->paginate(15);
        return view('dashboard.employees.trash', ['employees' => $trashedEmployees]);
    }

    public function restore($id)
    {
        $employee = Employee::withTrashed()->findOrFail($id);
        $employee->restore();
        return back()->with('success', 'تم استعادة الموظف بنجاح!');
    }

    public function forceDelete($id)
    {
        $employee = Employee::withTrashed()->findOrFail($id);
        $employee->forceDelete();
        return back()->with('success', 'تم حذف الموظف نهائياً!');
    }

    // --- دالة التصدير ---

    public function exportExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    /**
     * دالة مركزية للتحقق من صحة البيانات (للاستخدام في store و update).
     */
    private function validateEmployee(Request $request, $employeeId = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email,' . $employeeId,
            'phone' => 'nullable|string|max:25',
            'salary' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'iban' => 'nullable|string|max:34',
            'wallet_name' => 'nullable|string|max:100',
            'bank_name' => 'nullable|string|max:100',
            'bank_branch' => 'nullable|string|max:100',
        ];

        return $request->validate($rules);
    }
}
