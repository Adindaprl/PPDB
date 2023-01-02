<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\ContactController;
use App\http\controllers\PaymentController;
use App\http\controllers\PpdbController;


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

//landing page//
Route::get('/',[PpdbController::class, 'index']);
Route::get('/daftar',[PpdbController::class, 'daftar'])->name('daftar');
Route::post('/daftar/input', [PpdbController::class, 'daftarAccount'])->name('daftar.input');
Route::get('/pdf',[PpdbController::class, 'pdf'])->name('pdf');

//dashboard user-admin//
Route::middleware('Guest')->group(function() {
Route::get('/login',[PpdbController::class,'login']);
Route::post('/login/auth',[PpdbController::class,'auth'])->name('login.auth');
// Route::get('/dashboard',[PaymentController::class,'dashboard'])->name('dashboard');
});
//dashboard admin//
Route::middleware(['Login', 'Role:admin'])->group(function(){
Route::get('/admin/dashboard',[PpdbController::class,'adminDashboard'])->name('adminDashboard');
Route::get('/admin/dashboard',[PpdbController::class,'adminPembayaran'])->name('adminPembayaran');
});
//dashboard user//
Route::middleware(['Login', 'Role:user'])->group(function(){
Route::get('/dashboard',[PaymentController::class,'dashboard'])->name('dashboard');
Route::get('/createPayment', [PaymentController::class, 'createPayment'])->name('createPayment');
Route::post('/pembayaran', [PaymentController::class, 'store'])->name('payment');
});
Route::get('/logout', [PpdbController::class, 'logout'])->name('logout');
Route::get('/error', [PpdbController::class, 'error'])->name('error');