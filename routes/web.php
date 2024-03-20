<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\AuthenAdminController;
use  App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\RoleAdminController;
use App\Http\Middleware\Authenticate;

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
Route::middleware([Authenticate::class])->get('/home', [HomeAdminController::class, 'home'])->name('home');

Route::get('/login', [AuthenAdminController::class, 'login'])->name('login');
Route::get('/register', [AuthenAdminController::class, 'register'])->name('register');
Route::post('/register/store', [AuthenAdminController::class, 'registerStore'])->name('register.store');
Route::post('/login/store', [AuthenAdminController::class, 'loginStore'])->name('login.store');
Route::get('/logout', [AuthenAdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function (){
        Route::get('/list', [UserAdminController::class, 'list'])->name('users.list')->middleware('can:list_user');
        Route::get('/create', [UserAdminController::class, 'create'])->name('users.create')->middleware('can:create_user');
        Route::post('/store', [UserAdminController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserAdminController::class, 'edit'])->name('users.edit')->middleware('can:edit_user');
        Route::post('/update/{id}', [UserAdminController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserAdminController::class, 'delete'])->name('users.delete')->middleware('can:delete_user');
    });
    Route::prefix('roles')->group(function (){
        Route::get('/list', [RoleAdminController::class, 'list'])->name('roles.list');
        Route::get('/create', [RoleAdminController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleAdminController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleAdminController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [RoleAdminController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleAdminController::class, 'delete'])->name('roles.delete');
    });
});
