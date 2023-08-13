<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MineController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.authentication.login');
});

// Route::get('register', [RegistrationController::class, 'index']);
// Route::post('register', [RegistrationController::class, 'store'])->name('register');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('home', [DashboardController::class, 'dashboard']);
        Route::get('/monitor/waiting', [MonitorController::class, 'index']);
        Route::get('/monitor/edit/{id}', [MonitorController::class, 'edit']);
        Route::put('/monitor/update/headOffice/{id}', [MonitorController::class, 'updateHeadOffice']);
        Route::put('/monitor/update/headMine/{id}', [MonitorController::class, 'updateHeadMine']);
        Route::get('/monitor/approved', [MonitorController::class, 'approved']);
        Route::get('/monitor/exports', [MonitorController::class, 'exportAllReport']);
        Route::get('/monitor/exportyear', [MonitorController::class, 'exportByYear']);
    });
});
