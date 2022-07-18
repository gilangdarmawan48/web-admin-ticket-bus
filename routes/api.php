<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookingBusController;
use App\Http\Controllers\ApiBusScheduleController;
use App\Http\Controllers\ApiCompanyLoginController;
use App\Http\Controllers\ApiCompanyRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->group(function(){
//     Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
//     Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//     Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/register', [AdminRegiserController::class, 'showAdminRegisterForm'])->name('admin.register');
//     Route::post('/register', [AdminRegiserController::class, 'createAdmin'])->name('admin.register.submit');
// });

// Route::get('/bus-list', [BusOfListController::class, 'index']);
// Route::get('/bus-list/create', [BusOfListController::class, 'create']);
// Route::post('/bus-list', [BusOfListController::class, 'store']);
// Route::get('/bus-list/{id}/edit', [BusOfListController::class, 'edit']);
// Route::put('/bus-list/{id}', [BusOfListController::class, 'update']);
// Route::delete('/bus-list/{id}', [BusOfListController::class, 'destroy']);

Route::get('/bus-schedule', [ApiBusScheduleController::class, 'index']);
// Route::get('/bus-schedule/create', [BusScheduleController::class, 'create']);
// Route::post('/bus-schedule', [BusScheduleController::class, 'store']);
// Route::get('/bus-schedule/{id}/edit', [BusScheduleController::class, 'edit']);
// Route::put('/bus-schedule/{id}', [BusScheduleController::class, 'update']);
// Route::delete('/bus-schedule/{id}', [BusScheduleController::class, 'destroy']);

Route::get('/bus-booking', [ApiBookingBusController::class, 'index']);
Route::get('/bus-booking/create', [ApiBookingBusController::class, 'create'])->name('bus-booking.create');
Route::post('/bus-booking', [ApiBookingBusController::class, 'store']);
Route::get('/bus-booking/{id}', [ApiBookingBusController::class, 'show']);
Route::put('/bus-booking/{id}', [ApiBookingBusController::class, 'update']);
Route::delete('/bus-booking/{id}', [ApiBookingBusController::class, 'destroy']);

// Route::prefix('company')->group(function(){
//     Route::get('/login', [ApiCompanyLoginController::class, 'showLoginForm'])->name('company.login');
//     Route::post('/login', [ApiCompanyLoginController::class, 'login'])->name('company.login.submit');
//     Route::get('/logout', [ApiCompanyLoginController::class, 'logout'])->name('company.logout');
//     // Route::get('/', [CompanyController::class, 'index'])->name('company.dashboard');
//     Route::get('/register', [ApiCompanyRegisterController::class, 'showCompanyRegisterForm'])->name('company.register');
//     Route::post('/register', [ApiCompanyRegisterController::class, 'createCompany'])->name('company.register.submit');

// });