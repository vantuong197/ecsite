<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\UserController;
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
    return view('welcome');
});



// Dashboard
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('AuthMiddleware');

Route::prefix('user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index')->middleware('AuthMiddleware');
    Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('AuthMiddleware');
});

// Ajax

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.getLocation')->middleware('AuthMiddleware');


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('LoginMiddleware');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
