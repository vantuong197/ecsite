<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserCatalogueController;
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

Route::prefix('user/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.user.index')->middleware('AuthMiddleware');
    Route::get('/create', [UserController::class, 'create'])->name('user.user.create')->middleware('AuthMiddleware');
    Route::post('/store', [UserController::class, 'store'])->name('user.user.store')->middleware('AuthMiddleware');
    Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.user.edit')->middleware('AuthMiddleware');
    Route::post('{id}/update', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.user.update')->middleware('AuthMiddleware');
    Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.user.delete')->middleware('AuthMiddleware');
    Route::delete('{id}/delete', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.user.destroy')->middleware('AuthMiddleware');


});


Route::prefix('user/catalogue')->group(function () {
    Route::get('/index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index')->middleware('AuthMiddleware');
    Route::get('/create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create')->middleware('AuthMiddleware');
    Route::post('/store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store')->middleware('AuthMiddleware');
    Route::get('{id}/edit', [UserCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.catalogue.edit')->middleware('AuthMiddleware');
    Route::post('{id}/update', [UserCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.catalogue.update')->middleware('AuthMiddleware');
    Route::get('{id}/delete', [UserCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.catalogue.delete')->middleware('AuthMiddleware');
    Route::delete('{id}/delete', [UserCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.catalogue.destroy')->middleware('AuthMiddleware');
});
// Ajax

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.getLocation')->middleware('AuthMiddleware');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashbard.changeStatus')->middleware('AuthMiddleware');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashbard.changeStatusAll')->middleware('AuthMiddleware');


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('LoginMiddleware');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
