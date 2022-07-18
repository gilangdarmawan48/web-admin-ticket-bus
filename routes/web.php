<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegiserController;
use App\Http\Controllers\Auth\CompanyController;
use App\Http\Controllers\Auth\CompanyLoginController;
use App\Http\Controllers\Auth\CompanyRegisterController;
use App\Http\Controllers\BookingBusController;
use App\Http\Controllers\BusOfListController;
use App\Http\Controllers\BusScheduleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/register', [AdminRegiserController::class, 'showAdminRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminRegiserController::class, 'createAdmin'])->name('admin.register.submit');
});

Route::get('/bus-list', [BusOfListController::class, 'index']);
Route::get('/bus-list/create', [BusOfListController::class, 'create']);
Route::post('/bus-list', [BusOfListController::class, 'store']);
Route::get('/bus-list/{id}/edit', [BusOfListController::class, 'edit']);
Route::put('/bus-list/{id}', [BusOfListController::class, 'update']);
Route::delete('/bus-list/{id}', [BusOfListController::class, 'destroy']);

Route::get('/bus-schedule', [BusScheduleController::class, 'index']);
Route::get('/bus-schedule/create', [BusScheduleController::class, 'create']);
Route::post('/bus-schedule', [BusScheduleController::class, 'store']);
Route::get('/bus-schedule/{id}/edit', [BusScheduleController::class, 'edit']);
Route::put('/bus-schedule/{id}', [BusScheduleController::class, 'update']);
Route::delete('/bus-schedule/{id}', [BusScheduleController::class, 'destroy']);

Route::get('/bus-booking', [BookingBusController::class, 'index'])->name('bus-booking.index');
Route::get('/bus-booking/create', [BookingBusController::class, 'create'])->name('bus-booking.create');
Route::post('/bus-booking', [BookingBusController::class, 'store']);
Route::get('/bus-booking/{id}/edit', [BookingBusController::class, 'edit'])->name('bus-booking.edit');
Route::put('/bus-booking/{id}', [BookingBusController::class, 'update']);
Route::delete('/bus-booking/{id}', [BookingBusController::class, 'destroy']);

Route::prefix('company')->group(function(){
    Route::get('/login', [CompanyLoginController::class, 'showLoginForm'])->name('company.login');
    Route::post('/login', [CompanyLoginController::class, 'login'])->name('company.login.submit');
    Route::get('/logout', [CompanyLoginController::class, 'logout'])->name('company.logout');
    Route::get('/', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('/register', [CompanyRegisterController::class, 'showCompanyRegisterForm'])->name('company.register');
    Route::post('/register', [CompanyRegisterController::class, 'createCompany'])->name('company.register.submit');

});