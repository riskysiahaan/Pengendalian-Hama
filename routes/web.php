<?php

use App\Http\Controllers\PesananController;
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
use Illuminate\Support\Facades\Auth;

Route::get('/', [PesananController::class, 'index'])->name('home');

Route::get('/register', [PesananController::class, 'index']);
Auth::routes();

Route::resource('pesanan', PesananController::class);

// Route::get('edit/{id}', [App\Http\Controllers\PesananController::class, 'edit'])->name('pesanan.edit');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get-pesanan', [PesananController::class, 'getPesanan'])->name('get-pesanan');