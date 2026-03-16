<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Auth\LoginController;


Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // الصفحة الرئيسية للوحة التحكم
    Route::get('/home', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('home');

 Route::get('settings', [App\Http\Controllers\Dashboard\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [App\Http\Controllers\Dashboard\SettingController::class, 'store'])->name('settings.store');

   Route::prefix('cash')->name('cash.')->group(function () {
    Route::get('/export', [App\Http\Controllers\Dashboard\CashTransactionController::class, 'export'])->name('export');
    Route::get('/trash', [App\Http\Controllers\Dashboard\CashTransactionController::class, 'trash'])->name('trash');
    Route::put('/restore/{id}', [App\Http\Controllers\Dashboard\CashTransactionController::class, 'restore'])->name('restore');
    Route::delete('/force-delete/{id}', [App\Http\Controllers\Dashboard\CashTransactionController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('cash', App\Http\Controllers\Dashboard\CashTransactionController::class)->parameters(['cash' => 'cashTransaction']);
Route::prefix('/khaleed-mohamed')->name('khaleed-mohamed.')->group(function () {
    Route::get('/trash', [App\Http\Controllers\Dashboard\KhaleedMohamedController::class, 'trash'])->name('trash');
    Route::patch('/{id}/restore', [App\Http\Controllers\Dashboard\KhaleedMohamedController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\KhaleedMohamedController::class, 'forceDelete'])->name('force-delete');
});
Route::resource('/khaleed-mohamed', App\Http\Controllers\Dashboard\KhaleedMohamedController::class);

// --- الوحدات المالية ---
    Route::resource('accounts', App\Http\Controllers\Dashboard\AccountController::class);
    Route::resource('journal-entries', App\Http\Controllers\Dashboard\JournalEntryController::class);
    Route::resource('/bank-accounts', App\Http\Controllers\Dashboard\BankAccountController::class)->names('bank-accounts');
    Route::get('/financial-summary', [App\Http\Controllers\Dashboard\FinancialController::class, 'summary'])->name('financial.summary');

    // مسار المركز المالي
    Route::get('/financial-accounts', [App\Http\Controllers\Dashboard\FinancialAccountsController::class, 'index'])->name('financial-accounts.index');


// مسار الربح السنوي
Route::get('/annual-profit', [App\Http\Controllers\Dashboard\AnnualProfitController::class, 'index'])->name('annual-profit.index');

// مسار التنبيهات
Route::get('/alerts', [App\Http\Controllers\Dashboard\AlertController::class, 'index'])->name('alerts.index');
    // مسارات إدارة الحسابات البنكية (مع الحركات)
    Route::get('/bank-accounts/{bankAccount}', [App\Http\Controllers\Dashboard\BankAccountController::class, 'show'])->name('bank-accounts.show');
    Route::post('/bank-accounts/{bankAccount}/transactions', [App\Http\Controllers\Dashboard\BankAccountController::class, 'storeTransaction'])->name('bank-accounts.transactions.store');
    Route::resource('/bank-accounts', App\Http\Controllers\Dashboard\BankAccountController::class)->except(['show'])->names('bank-accounts');
 Route::get('bank-accounts/{bankAccount}/statement', [App\Http\Controllers\Dashboard\BankAccountStatementController::class, 'show'])->name('bank-accounts.statement.show');

    // مسار لتخزين الحركة الجديدة من صفحة كشف الحساب
    Route::post('bank-accounts/{bankAccount}/transactions', [App\Http\Controllers\Dashboard\BankAccountStatementController::class, 'store'])->name('bank-accounts.transactions.store');


    // مسارات دليل البنوك
    Route::resource('/banks', App\Http\Controllers\Dashboard\BankController::class);

// Bank Accounts Routes
Route::prefix('bank-accounts')->name('bank-accounts.')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\BankAccountController::class, 'index'])->name('index');
    Route::post('/', [App\Http\Controllers\Dashboard\BankAccountController::class, 'store'])->name('store');
    Route::put('/{bankAccount}', [App\Http\Controllers\Dashboard\BankAccountController::class, 'update'])->name('update');
    Route::delete('/{bankAccount}', [App\Http\Controllers\Dashboard\BankAccountController::class, 'destroy'])->name('destroy');

    // Trash Routes
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', [App\Http\Controllers\Dashboard\BankAccountController::class, 'trash'])->name('index');
        Route::patch('/{id}/restore', [App\Http\Controllers\Dashboard\BankAccountController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\BankAccountController::class, 'forceDelete'])->name('force-delete');
    });
});
// Fund Transfers Routes
Route::resource('fund-transfers', App\Http\Controllers\Dashboard\FundTransferController::class)->parameters(['fund-transfers' => 'fundTransfer']);
// Financial Accounts (Banks, Safes, Checks) Main Page
Route::get('/financial-accounts', [App\Http\Controllers\Dashboard\FinancialAccountsController::class, 'index'])->name('financial-accounts.index');
// Checks Management Routes
   Route::prefix('checks')->name('checks.')->group(function () {
        Route::get('/trash', [App\Http\Controllers\Dashboard\CheckController::class, 'trash'])->name('trash');
        Route::get('/{id}/restore', [App\Http\Controllers\Dashboard\CheckController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\CheckController::class, 'forceDelete'])->name('forceDelete');
        Route::get('/export', [App\Http\Controllers\Dashboard\CheckController::class, 'exportExcel'])->name('export');
    });
    Route::resource('checks', App\Http\Controllers\Dashboard\CheckController::class);

Route::prefix('bank-transactions')->name('bank-transactions.')->group(function () {
    Route::get('/trash', [App\Http\Controllers\Dashboard\BankTransactionController::class, 'trash'])->name('trash');
    Route::patch('/{id}/restore', [App\Http\Controllers\Dashboard\BankTransactionController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\BankTransactionController::class, 'forceDelete'])->name('force-delete');
});
Route::resource('bank-transactions', App\Http\Controllers\Dashboard\BankTransactionController::class);

    Route::prefix('khaled')->name('khaled.')->group(function () {
        Route::get('/trash', [App\Http\Controllers\Dashboard\KhaledVoucherController::class, 'trash'])->name('trash');
        Route::post('/{id}/restore', [App\Http\Controllers\Dashboard\KhaledVoucherController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\KhaledVoucherController::class, 'forceDelete'])->name('forceDelete');
    });
    Route::resource('khaled', App\Http\Controllers\Dashboard\KhaledVoucherController::class);

Route::prefix('dashboard/reportproject')->name('dashboard.reportproject.')->middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'store'])->name('store');
    Route::get('/{reportproject}/edit', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'edit'])->name('edit');
    Route::put('/{reportproject}', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'update'])->name('update');
    Route::delete('/{reportproject}', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'destroy'])->name('destroy');

    // مسارات سلة المهملات
    Route::get('/trash', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'trash'])->name('trash');
    Route::post('/trash/{id}/restore', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'restore'])->name('restore');
    Route::delete('/trash/{id}/force-delete', [App\Http\Controllers\Dashboard\ReportProjectController::class, 'forceDelete'])->name('force-delete');
});
    Route::resource('reportproject', App\Http\Controllers\Dashboard\ReportProjectController::class);
Route::prefix('dashboard/projects')->name('dashboard.projects.')->middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Dashboard\ProjectController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Dashboard\ProjectController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\Dashboard\ProjectController::class, 'store'])->name('store');
    Route::get('/{projects}/edit', [App\Http\Controllers\Dashboard\ProjectController::class, 'edit'])->name('edit');
    Route::put('/{projects}', [App\Http\Controllers\Dashboard\ProjectController::class, 'update'])->name('update');
    Route::delete('/{projects}', [App\Http\Controllers\Dashboard\ProjectController::class, 'destroy'])->name('destroy');

    // مسارات سلة المهملات
    Route::get('/trash', [App\Http\Controllers\Dashboard\ProjectController::class, 'trash'])->name('trash');
    Route::post('/trash/{id}/restore', [App\Http\Controllers\Dashboard\ProjectController::class, 'restore'])->name('restore');
    Route::delete('/trash/{id}/force-delete', [App\Http\Controllers\Dashboard\ProjectController::class, 'forceDelete'])->name('force-delete');
});
    Route::resource('projects', App\Http\Controllers\Dashboard\ProjectController::class);

    // --- وحدات التحويلات ---
    Route::resource('project-transfers', App\Http\Controllers\Dashboard\ProjectTransferController::class)->middleware('auth');

 Route::get('/purchases', [App\Http\Controllers\Dashboard\PurchaseController::class, 'index'])->name('purchases.index');

    Route::resource('purchases', App\Http\Controllers\Dashboard\PurchaseController::class);
 Route::get('purchase-returns', [App\Http\Controllers\Dashboard\PurchaseReturnController::class, 'index'])->name('purchase-returns.index');

    Route::get('purchase-returns/create', [App\Http\Controllers\Dashboard\PurchaseReturnController::class, 'create'])->name('purchase-returns.create');
    Route::post('purchase-returns', [App\Http\Controllers\Dashboard\PurchaseReturnController::class, 'store'])->name('purchase-returns.store');
    Route::delete('purchase-returns/{purchase_return}', [App\Http\Controllers\Dashboard\PurchaseReturnController::class, 'destroy'])->name('purchase-returns.destroy');

Route::resource('journal-entries', App\Http\Controllers\Dashboard\JournalEntryController::class);

Route::get('expenses/export/excel', [App\Http\Controllers\Dashboard\ExpenseController::class, 'exportExcel'])->name('expenses.exportExcel');

    Route::get('expenses/trash', [App\Http\Controllers\Dashboard\ExpenseController::class, 'trash'])->name('expenses.trash');
    Route::post('expenses/trash/{id}/restore', [App\Http\Controllers\Dashboard\ExpenseController::class, 'restore'])->name('expenses.restore');
    Route::delete('expenses/trash/{id}/force-delete', [App\Http\Controllers\Dashboard\ExpenseController::class, 'forceDelete'])->name('expenses.forceDelete');
    Route::resource('expenses', App\Http\Controllers\Dashboard\ExpenseController::class);
   // --- قسم المستثمرين (Investors) ---
    Route::get('investors/trash', [App\Http\Controllers\Dashboard\InvestorController::class, 'trash'])->name('investors.trash');
    Route::put('investors/trash/{id}/restore', [App\Http\Controllers\Dashboard\InvestorController::class, 'restore'])->name('investors.restore');
    Route::delete('investors/trash/{id}/force-delete', [App\Http\Controllers\Dashboard\InvestorController::class, 'forceDelete'])->name('investors.forceDelete');
    Route::get('investors/export/excel', [App\Http\Controllers\Dashboard\InvestorController::class, 'exportExcel'])->name('investors.export.excel');
    Route::get('investors/{investor}/export/word', [App\Http\Controllers\Dashboard\InvestorController::class, 'export.word'])->name('investors.export.word');
    Route::resource('investors', App\Http\Controllers\Dashboard\InvestorController::class);

Route::prefix('contracts')->name('contracts.')->middleware('auth')->group(function () {
    Route::get('/get-contractables', [App\Http\Controllers\Dashboard\ContractController::class, 'getContractables'])->name('getContractables');

    Route::get('/trash', [App\Http\Controllers\Dashboard\ContractController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [App\Http\Controllers\Dashboard\ContractController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\ContractController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('contracts', App\Http\Controllers\Dashboard\ContractController::class)->middleware('auth');

Route::prefix('mohammed')->name('mohammed.')->middleware('auth')->group(function () {
    Route::get('/trash', [App\Http\Controllers\Dashboard\MohammedVoucherController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [App\Http\Controllers\Dashboard\MohammedVoucherController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\MohammedVoucherController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('dashboard/mohammed', App\Http\Controllers\Dashboard\MohammedVoucherController::class)->middleware('auth');
// --- مجموعة سندات وليد ---
Route::prefix('wali')->name('wali.')->middleware('auth')->group(function () {
    Route::get('/trash', [App\Http\Controllers\Dashboard\WaliVoucherController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [App\Http\Controllers\Dashboard\WaliVoucherController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [App\Http\Controllers\Dashboard\WaliVoucherController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('dashboard/wali', App\Http\Controllers\Dashboard\WaliVoucherController::class)->middleware('auth');

 Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [App\Http\Controllers\Dashboard\PaymentController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Dashboard\PaymentController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Dashboard\PaymentController::class, 'store'])->name('store');
        Route::get('/{payment}', [App\Http\Controllers\Dashboard\PaymentController::class, 'show'])->name('show');
        Route::get('/{payment}/edit', [App\Http\Controllers\Dashboard\PaymentController::class, 'edit'])->name('edit');
        Route::put('/{payment}', [App\Http\Controllers\Dashboard\PaymentController::class, 'update'])->name('update');
        Route::delete('/{payment}', [App\Http\Controllers\Dashboard\PaymentController::class, 'destroy'])->name('destroy');

        Route::get('/trash', [App\Http\Controllers\Dashboard\PaymentController::class, 'trash'])->name('trash');
        Route::post('/trash/{id}/restore', [App\Http\Controllers\Dashboard\PaymentController::class, 'restore'])->name('restore');
        Route::delete('/trash/{id}/force-delete', [App\Http\Controllers\Dashboard\PaymentController::class, 'forceDelete'])->name('forceDelete');



    });
      Route::get('/get-payables', [App\Http\Controllers\Dashboard\PaymentController::class, 'getPayables'])->name('getPayables');
        Route::get('/get-payable-contracts', [App\Http\Controllers\Dashboard\PaymentController::class, 'getPayableContracts'])->name('getPayableContracts');
// ---  مصروفات الموردين (Supplier Expenses) ---
Route::prefix('supplier-expenses')->name('supplier_expenses.')->group(function () {
    Route::get('/trash', [\App\Http\Controllers\Dashboard\SupplierExpenseController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [\App\Http\Controllers\Dashboard\SupplierExpenseController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [\App\Http\Controllers\Dashboard\SupplierExpenseController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('supplier-expenses', \App\Http\Controllers\Dashboard\SupplierExpenseController::class)->names('supplier_expenses')->except(['show']);

  // --- 1. العملاء (Clients) ---
 Route::get('clients/trash', [App\Http\Controllers\Dashboard\ClientController::class, 'trash'])->name('clients.trash');
    Route::put('clients/{id}/restore', [App\Http\Controllers\Dashboard\ClientController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/force-delete', [App\Http\Controllers\Dashboard\ClientController::class, 'forceDelete'])->name('clients.forceDelete');
    Route::get('clients/export/excel', [App\Http\Controllers\Dashboard\ClientController::class, 'exportExcel'])->name('clients.export.excel');
    Route::get('clients/{client}/export/word', [App\Http\Controllers\Dashboard\ClientController::class, 'exportWord'])->name('clients.export.word');
    Route::resource('clients', App\Http\Controllers\Dashboard\ClientController::class);

    Route::get('/employees/export/excel', [ App\Http\Controllers\Dashboard\EmployeeController::class, 'exportExcel'])->name('employees.export.excel');
    Route::get('/employees/{employee}/pay', [ App\Http\Controllers\Dashboard\EmployeeController::class, 'showPayForm'])->name('employees.pay.form');
    Route::post('/employees/pay', [ App\Http\Controllers\Dashboard\EmployeeController::class, 'storePayment'])->name('employees.pay.store');
    Route::prefix('employees/trash')->name('employees.trash.')->controller(App\Http\Controllers\Dashboard\EmployeeController::class)->group(function () {
        Route::get('/', 'trash')->name('index');
        Route::put('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
    Route::resource('employees', App\Http\Controllers\Dashboard\EmployeeController::class);


    Route::get('/daily-report', [App\Http\Controllers\Dashboard\DailyReportController::class, 'index'])->name('daily.index');
    Route::post('/daily-report', [App\Http\Controllers\Dashboard\DailyReportController::class, 'store'])->name('daily.store');
    Route::get('cash-safes/trash', [App\Http\Controllers\Dashboard\CashSafeController::class, 'trash'])->name('cash-safes.trash');
    Route::post('cash-safes/restore/{id}', [App\Http\Controllers\Dashboard\CashSafeController::class, 'restore'])->name('cash-safes.restore');
    Route::delete('cash-safes/force-delete/{id}', [App\Http\Controllers\Dashboard\CashSafeController::class, 'forceDelete'])->name('cash-safes.forceDelete');
    Route::resource('cash-safes', App\Http\Controllers\Dashboard\CashSafeController::class);

    Route::resource('receipt-vouchers', App\Http\Controllers\Dashboard\ReceiptVoucherController::class)->except(['show']);
    Route::resource('alerts', App\Http\Controllers\Dashboard\AlertController::class);
// --- 5. المقاولون والموردون (Subcontractors) ---
Route::get('subcontractors/trash', [App\Http\Controllers\Dashboard\SubcontractorController::class, 'trash'])->name('subcontractors.trash');
Route::put('subcontractors/{subcontractor}/restore', [App\Http\Controllers\Dashboard\SubcontractorController::class, 'restore'])->name('subcontractors.restore');
Route::delete('subcontractors/{subcontractor}/force-delete', [App\Http\Controllers\Dashboard\SubcontractorController::class, 'forceDelete'])->name('subcontractors.forceDelete');
Route::resource('subcontractors', App\Http\Controllers\Dashboard\SubcontractorController::class);

Route::get('subcontractors/export/excel', [App\Http\Controllers\Dashboard\SubcontractorController::class, 'exportExcel'])->name('subcontractors.exportExcel');
//  المشتريات (Purchases)
Route::prefix('purchases')->as('purchases.')->group(function () {

    // فواتير المشتريات (Purchase Invoices)
    Route::get('invoices/trash', [App\Http\Controllers\Dashboard\PurchaseInvoiceController::class, 'trash'])->name('invoices.trash');
    Route::post('invoices/restore/{id}', [App\Http\Controllers\Dashboard\PurchaseInvoiceController::class, 'restore'])->name('invoices.restore');
    Route::delete('invoices/forceDelete/{id}', [App\Http\Controllers\Dashboard\PurchaseInvoiceController::class, 'forceDelete'])->name('invoices.forceDelete');
    Route::resource('invoices', App\Http\Controllers\Dashboard\PurchaseInvoiceController::class);

});
//  الموردون (Suppliers)
Route::prefix('suppliers')->as('suppliers.')->group(function () {
    // مسارات سلة المحذوفات
    Route::get('trash', [App\Http\Controllers\Dashboard\SupplierController::class, 'trash'])->name('trash');
    Route::post('restore/{id}', [App\Http\Controllers\Dashboard\SupplierController::class, 'restore'])->name('restore');
    Route::delete('forceDelete/{id}', [App\Http\Controllers\Dashboard\SupplierController::class, 'forceDelete'])->name('forceDelete');

    // مسارات CRUD الأساسية
    Route::resource('/', App\Http\Controllers\Dashboard\SupplierController::class)->parameters(['' => 'supplier']);
});
   Route::prefix('products/trash')->name('products.trash.')->controller(App\Http\Controllers\Dashboard\ProductController::class)->group(function () {
        Route::get('/', 'trash')->name('index');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
    Route::resource('products',App\Http\Controllers\Dashboard\ProductController::class);

    Route::prefix('warehouses/trash')->name('warehouses.trash.')->controller(App\Http\Controllers\Dashboard\WarehouseController::class)->group(function () {
    Route::get('/', 'trash')->name('index');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
});
Route::resource('warehouses', App\Http\Controllers\Dashboard\WarehouseController::class)->except(['show', 'create', 'edit']);

Route::resource('quotations', App\Http\Controllers\Dashboard\QuotationController::class);
Route::resource('sales', App\Http\Controllers\Dashboard\SaleInvoiceController::class);
Route::resource('sales-returns', App\Http\Controllers\Dashboard\SaleReturnController::class);
Route::resource('quotations', App\Http\Controllers\Dashboard\QuotationController::class);
Route::post('quotations/{quotation}/convert', [App\Http\Controllers\Dashboard\QuotationController::class, 'convertToInvoice'])->name('quotations.convert');

Route::resource('sales', App\Http\Controllers\Dashboard\SaleInvoiceController::class);
Route::get('collections', [App\Http\Controllers\Dashboard\SaleInvoiceController::class, 'collections'])->name('collections');

Route::resource('sales-returns', App\Http\Controllers\Dashboard\SaleReturnController::class);
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

    Route::get('collections', [App\Http\Controllers\Dashboard\SaleInvoiceController::class, 'collections'])->name('collections');

    Route::post('sales/{sale}/add-payment', [App\Http\Controllers\Dashboard\SaleInvoiceController::class, 'addPayment'])->name('sales.addPayment');

});
// الأذون المخزنية
Route::prefix('transfers/trash')->name('transfers.trash.')->controller(App\Http\Controllers\Dashboard\StockTransferController::class)->group(function () {
    Route::get('/', 'trash')->name('index');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
});
Route::resource('transfers', App\Http\Controllers\Dashboard\StockTransferController::class);
// قوائم الأسعار
Route::prefix('pricelists/trash')->name('pricelists.trash.')->controller(App\Http\Controllers\Dashboard\PriceListController::class)->group(function () {
    Route::get('/', 'trash')->name('index');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
});
Route::resource('pricelists', App\Http\Controllers\Dashboard\PriceListController::class);
// إدارة الجرد
Route::prefix('stocktakes/trash')->name('stocktakes.trash.')->controller(App\Http\Controllers\Dashboard\StocktakeController::class)->group(function () {
    Route::get('/', 'trash')->name('index');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::delete('/{id}/force-delete', 'forceDelete')->name('forceDelete');
});
Route::resource('stocktakes', App\Http\Controllers\Dashboard\StocktakeController::class);

    Route::get('/treasury', [App\Http\Controllers\Dashboard\GeneralLedgerController::class, 'index'])->name('treasury');
    Route::get('/general-ledger', [App\Http\Controllers\Dashboard\GeneralLedgerController::class, 'index'])->name('general-ledger.index');
    Route::get('/bank', [App\Http\Controllers\Dashboard\BankTransactionController::class, 'index'])->name('bank.index');
    Route::post('/bank', [App\Http\Controllers\Dashboard\BankTransactionController::class, 'store'])->name('bank.store');
    Route::post('/funds-transfers', [App\Http\Controllers\Dashboard\FundTransferController::class, 'store'])->name('funds-transfers.store');

});

