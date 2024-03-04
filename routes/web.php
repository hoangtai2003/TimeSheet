<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;

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
Route::get('/home', function () {
    return view('admin.home');
});
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
