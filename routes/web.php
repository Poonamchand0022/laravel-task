<?php

use App\Http\Controllers\admin\ConsultationController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController as AdminRegisterController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('admin', [LoginController::class, 'index'])->name('login');
Route::post('admin/login-post', [LoginController::class, 'loginPost'])->name('login-post');
Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AdminRegisterController::class, 'register'])->name('register-post');

Route::group(["prefix" => "admin", "middleware" => ["auth"]], function (){
    Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('consultation', ConsultationController::class);
});

Route::get('/', function () {
    return view('welcome');
});
