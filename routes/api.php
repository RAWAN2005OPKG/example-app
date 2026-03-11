<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// مسار لجلب كل جهات الاتصال (عملاء وموظفين)
Route::get('/contacts', function () {
    $customers = Customer::select('id', 'name', 'phone', 'id_number')->get()->map(function ($item) {
        $item->type = 'عميل';
        return $item;
    });

    $employees = Employee::select('id', 'name', 'phone', 'id_number')->get()->map(function ($item) {
        $item->type = 'موظف';
        return $item;
    });

    // دمج القائمتين في قائمة واحدة
    $contacts = $customers->concat($employees);

    return response()->json($contacts);
})->name('api.contacts');


// مسار لجلب المشاريع النشطة
Route::get('/projects', function () {
    // تأكدي من وجود عمود 'status' في جدول المشاريع
    return response()->json(Project::select('id', 'name')->where('status', 'active')->get());
})->name('api.projects');
