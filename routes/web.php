<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', [BbsController::class, 'index']);
Route::post('/isRead', [HomeController::class, 'renderView']);

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('settings', SettingController::class);

    Route::resource('user', UserController::class);

//    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('settings.user.destroy');
//    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('settings.user.edit');
//    Route::put('user/{user}', [UserController::class, 'update'])->name('settings.user.update');
//    Route::get('user/create', [UserController::class, 'create'])->name('settings.user.create');
//    Route::post('user', [UserController::class, 'store'])->name('settings.user.store');
//    Route::get('user', [UserController::class, 'index'])->name('settings.user');

    Route::resource('roles', RoleController::class);
});
