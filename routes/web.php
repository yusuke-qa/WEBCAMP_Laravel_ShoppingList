<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\CompletedShoppingListController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminUserController;

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

// ユーザ画面
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/shopping-list', [ShoppingListController::class, 'store']);
    Route::post('/shopping-list/{id}/complete', [ShoppingListController::class, 'complete']);
    Route::delete('/shopping-list/{id}', [ShoppingListController::class, 'destroy']);
    Route::get('/completed_shopping_list/list', [CompletedShoppingListController::class, 'index']);
});

// 管理画面
Route::get('/admin', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store']);
Route::get('/admin/logout', [AdminAuthController::class, 'destroy']);

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index']);
    Route::get('/admin/user/list', [AdminUserController::class, 'index']);
});