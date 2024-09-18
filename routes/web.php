<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CashBankController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/form-login', [LoginController::class, 'showLoginForm'])->name('auth.form-login');

Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::resource('/candidate', CandidateController::class);

Route::resource('/employee', EmployeeController::class);

Route::resource('/location', LocationController::class);

Route::resource('/department', DepartmentController::class);

Route::resource('/title', TitleController::class);

Route::get('/savings/create/{id}', [SavingController::class, 'create'])->name('savings.create');

Route::resource('/savings', SavingController::class);

Route::get('/loan/create/{id}', [LoanController::class, 'create'])->name('loan.create');

Route::resource('/loan', LoanController::class);

Route::get('/installment-loan/index', [InstallmentController::class, 'index'])->name('installment.index');

Route::get('/installment-loan/payment/{installment}', [InstallmentController::class, 'loanPaymentForm'])->name('installment.payment');

Route::post('/installment-loan/payment/store/{installment}', [InstallmentController::class, 'loanPayment'])->name('installment.payment.store');

Route::get('/presence/boutique', [PresenceController::class, 'boutiquePresence'])->name('boutique.presence');

Route::get('/presence/headoffice', [PresenceController::class, 'headofficePresence'])->name('headoffice.presence');

Route::post('headoffice/presence/store', [PresenceController::class, 'checkHeadofficePresence'])->name('headoffice.presence.store');

Route::post('boutique/presence/store', [PresenceController::class, 'checkBoutiquePresence'])->name('boutique.presence.store');

Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::get('/upload-excel', [ExcelController::class, 'showUploadForm'])->name('upload.excel');

Route::post('/import-excel', [ExcelController::class, 'importExcel'])->name('import.excel');

Route::get('/export-candidate', [ExcelController::class, 'export'])->name('candidate.export');

Route::get('/location-data', [ChartController::class, 'getDataLocation']);

Route::get('/department-data', [ChartController::class, 'getDataDepartment']);

Route::get('/gender-data', [ChartController::class, 'getGenderData']);

Route::get('/education-data', [ChartController::class, 'getDataEducation']);

Route::get('/title-data', [ChartController::class, 'getDataTitle']);

Route::get('/employees/education/{education}', [FilterController::class, 'employeesByEducation'])->name('employees.byEducation');

Route::get('/employees/gender/{gender}', [FilterController::class, 'employeesByGender'])->name('employees.byGender');

Route::get('/employees/department/{department}', [FilterController::class, 'employeesByDepartment'])->name('employees.byDepartment');

Route::get('/employees/location/{location}', [FilterController::class, 'employeesByLocation'])->name('employees.byLocation');

Route::get('/employee/birthday-today', [FilterController::class, 'employeeBirthdayToday'])->name('employee.birthdayToday');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/employees/resign', [FilterController::class, 'employeesResign'])->name('employee.resign');
});

Route::group(['middleware' => ['role:employee']], function () {
    Route::get('/employee-dashboard', function () {
        return view('employee.index');
    });
});

Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/loan/{id}/receipt/import', [CashBankController::class, 'importReceipt'])->name('loan.receipt.import');

Route::get('/loan/{id}/receipt', [CashBankController::class, 'generateReceipt'])->name('loan.receipt');

Route::get('/loan/employee-select', [LoanController::class, 'selectEmployee'])->name('loan.select-employee');

Route::post('/approve-loan', [LoanController::class, 'approveLoan'])->name('loan.approve');
