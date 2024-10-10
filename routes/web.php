<?php

use App\Exports\ExportMotorized;
use App\Exports\ExportNonMotorized;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TupadController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\AppointedController;
use App\Http\Controllers\GearLicencingController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\MotorizedController;
use App\Http\Controllers\NonMotorizedController;
use App\Models\GearLicence;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clear', function () {
    Artisan::call('route:clear');
    return "Routes cache cleared!";
});
Route::get('/view', function () {
    Artisan::call('view:clear');
    return "view cache cleared!";
});
Route::get('/config', function () {
    Artisan::call('config:clear');
    return "config cache cleared!";
});
Auth::routes();

Route::get('/mpmis-dashboard', [HomeController::class, 'index'])->name('dashboard');

//Route for role = 0 (ADMIN)
Route::middleware(['role:0'])->group(function () {
    Route::resource('/accounts', UserController::class);
});

// Routes for role = 1 (TUPAD)
Route::middleware(['role:1'])->group(function () {
    Route::resource('/tupad-applicant', TupadController::class);
    Route::post('/tupad-applicant/remove', [TupadController::class, 'remove'])->name('tupad-applicant.remove');
    Route::get('/tupad/print', [TupadController::class, 'print'])->name('tupad-applicant.print');
    Route::resource('/barangay-officials', OfficialController::class);
    Route::resource('/appointed-officials', AppointedController::class);
    Route::resource('/manage', ManageController::class);
    Route::get('/emptyTupad', [ManageController::class, 'emptyTupad'])->name('empty-tupad');
    Route::get('/emptyElected', [ManageController::class, 'emptyElected'])->name('empty-elected');
    Route::get('/emptyAppointed', [ManageController::class, 'emptyAppointed'])->name('empty-appointed');
    Route::post('/import-officials', [ImportController::class, 'importElected'])->name('import-officials');
    Route::post('/import-appointed', [ImportController::class, 'importAppointed'])->name('import-appointed');
    Route::post('/import-applicant', [ImportController::class, 'importApplicant'])->name('import-applicant');
});

//Route for role = 2 (AGRICULTURE)
Route::middleware(['role:2'])->group(function () {
    Route::resource('/agriculture-motorized', MotorizedController::class);
    Route::post('/motorized-renew/{id}', [MotorizedController::class, 'renew'])->name('motorized-renew');
    Route::get('/motorized/print', [MotorizedController::class, 'print'])->name('motorized-print');
    Route::get('/export-motorized', function () {
        return Excel::download(new ExportMotorized, 'Masterlist of Motorized Boat Registration.xlsx');
    });
    Route::resource('/agriculture-non-motorized', NonMotorizedController::class);
    Route::post('/non-motorized-renew/{id}', [NonMotorizedController::class, 'renew'])->name('non-motorized-renew');
    Route::get('/non-motorized/print', [NonMotorizedController::class, 'print'])->name('non-motorized-print');
    Route::get('/export-non-motorized', function () {
        return Excel::download(new ExportNonMotorized, 'Masterlist of Non - motorized Boat Registration.xlsx');
    });
    Route::resource('/fishing-gear', GearLicencingController::class);
    Route::get('/print-registration/{id}', [GearLicencingController::class, 'print'])->name('print-registration');
    Route::resource('/agriculture-headings', HeadingController::class);
});

Route::get('/my-account/{id}', [ManageController::class, 'myAccount'])->name('my-account');
Route::put('/my-account/{id}', [ManageController::class, 'updateAccount'])->name('update-account');
Route::get('/my-account-change-password/{id}', [ManageController::class, 'showChangePasswordForm'])->name('show-change-password');
Route::put('/my-account/change-password/{id}', [ManageController::class, 'changePassword'])->name('my-account-change-password');
