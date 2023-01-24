<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

// Routes vers le loginCTRL

Route::get('/', [LoginController::class, 'login'])->name('login');

// Routes vers l'adminCTRL

Route::get('/admin/home', [AdminController::class, 'home'])->name('adminhome');
Route::get('/admin/accounts', [AdminController::class, 'accounts'])->name('adminaccounts');
Route::get('/admin/addAccount', [AdminController::class, 'addAccount'])->name('adminaddaccount');
Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('adminfeedback');

