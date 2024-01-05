<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterPasienController;

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

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pasien', [RegisterPasienController::class, 'index'])->name('pasien.index');
Route::get('/loginpasien', [RegisterPasienController::class, 'loginPasien']);
Route::get('/daftarpoli', [RegisterPasienController::class, 'daftarpoli']);
Route::post('/register', [RegisterPasienController::class, 'register'])->name('register');
Route::post('/daftarpolipasien', [RegisterPasienController::class, 'daftarpolipasien'])->name('daftarpolipasien');
