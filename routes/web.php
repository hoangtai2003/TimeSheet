<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\AuthenAdminController;
use  App\Http\Controllers\HomeAdminController;

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
Route::get('/home', [HomeAdminController::class, 'home'])->name('home');

Route::get('/login', [AuthenAdminController::class, 'login'])->name('login');
Route::get('/register', [AuthenAdminController::class, 'register'])->name('register');
Route::post('/register/store', [AuthenAdminController::class, 'registerStore'])->name('register.store');
Route::post('/login/store', [AuthenAdminController::class, 'loginStore'])->name('login.store');
Route::get('/logout', [AuthenAdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function (){
        Route::get('/list', [UserAdminController::class, 'list'])->name('users.list');
        Route::get('/create', [UserAdminController::class, 'create'])->name('users.create');
        Route::post('/store', [UserAdminController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserAdminController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserAdminController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserAdminController::class, 'delete'])->name('users.delete');
    });
});
