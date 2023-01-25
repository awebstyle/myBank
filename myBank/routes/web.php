<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CashierController;

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

Route::get('/admin/showAccount', [AdminController::class, 'showAccount'])->name('adminshowaccount');
Route::get('/admin/adminNotice', [AdminController::class, 'adminNotice'])->name('adminnotice');
Route::delete('/admin/deleteAccount', [AdminController::class, 'deleteAccount'])->name('admindeleteaccount');


// Routes vers le clientCTRL

Route::get('client/home', [ClientController::class, 'home'])->name('clienthome');
Route::get('client/account', [ClientController::class, 'account'])->name('clientaccount');
Route::get('client/statements', [ClientController::class, 'statements'])->name('clientstatements');
Route::get('client/transfer', [ClientController::class, 'transfer'])->name('clienttransfer');
Route::get('client/notice', [ClientController::class, 'notice'])->name('clientnotice');
Route::get('client/feedback', [ClientController::class, 'feedback'])->name('clientfeedback');

// Routes vers le cashierCTRL

Route::get('cashier/home', [CashierController::class, 'home'])->name('cashierhome');
Route::post('cashier/addCashier', [CashierController::class, 'addCashier'])->name('addcashier');
Route::post('cashier/updateCashier/{id}', [CashierController::class, 'updateCashier'])->name('updatecashier');
Route::delete('cashier/deleteCashier/{id}', [CashierController::class, 'deleteCashier'])->name('deletecashier');


