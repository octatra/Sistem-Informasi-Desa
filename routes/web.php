<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\InformasiController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\ProdukController;
use App\Http\Controllers\backend\ProfilDesaController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    return 'Optimize clear command executed. Exit code: ' . $exitCode;
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/profil-desa', [HomeController::class, 'profil']);
Route::get('/informasi-all', [HomeController::class, 'informasiAll']);
Route::get('/informasi-detail/{id}', [HomeController::class, 'detailInformasi']);
Route::get('/produk-all', [HomeController::class, 'produkAll']);
Route::get('/produk-detail/{id}', [HomeController::class, 'detailProduk']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profil', [ProfilDesaController::class, 'index'])->middleware('auth');
Route::put('/profil/{id}', [ProfilDesaController::class, 'update'])->name('profil.update')->middleware('auth');

Route::get('/informasi', [InformasiController::class, 'index'])->middleware('auth');
Route::get('/informasi/create', [InformasiController::class, 'create'])->middleware('auth');
Route::post('/informasi/create', [InformasiController::class, 'store'])->name('informations.store')->middleware('auth');
Route::get('/informasi/edit/{id}', [InformasiController::class, 'edit'])->middleware('auth');
Route::put('/informasi/edit/{id}', [InformasiController::class, 'update'])->name('informations.update')->middleware('auth');
Route::get('/informasi/{id}', [InformasiController::class, 'destroy'])->middleware('auth');

Route::get('/produk', [ProdukController::class, 'index'])->middleware('auth');
Route::get('/produk/create', [ProdukController::class, 'create'])->middleware('auth');
Route::post('/produk/create', [ProdukController::class, 'store'])->name('produk.store')->middleware('auth');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->middleware('auth');
Route::put('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update')->middleware('auth');
Route::get('/produk/{id}', [ProdukController::class, 'destroy'])->middleware('auth');
