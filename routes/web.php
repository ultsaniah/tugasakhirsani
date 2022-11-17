<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPelangganController;

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

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::prefix('keranjang')->group(function () {
        Route::get('/', [KeranjangController::class, 'index'])->name('keranjang');
        Route::get('tambah/{id}', [KeranjangController::class, 'getKeranjang'])->name('keranjang.tambah.get');
        Route::get('plus/{id}', [KeranjangController::class, 'plus'])->name('keranjang.plus');
        Route::get('minus/{id}', [KeranjangController::class, 'minus'])->name('keranjang.minus');
        Route::post('tambah', [KeranjangController::class, 'postKeranjang'])->name('keranjang.tambah.post');
        Route::get('hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    });
    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('simpan', [CheckoutController::class, 'simpan'])->name('checkout.simpan');
    });
});

// BAGIAN ADMIN
Route::prefix('admin')->middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('pelanggan', [AdminPelangganController::class, 'index'])->name('admin.pelanggan');
    Route::prefix('produk')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('admin.produk');
        Route::get('tambah', [AdminProdukController::class, 'tambah'])->name('admin.produk.tambah');
        Route::post('simpan', [AdminProdukController::class, 'simpan'])->name('admin.produk.simpan');
        Route::get('ubah/{id}', [AdminProdukController::class, 'ubah'])->name('admin.produk.ubah');
        Route::post('edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::get('hapus/{id}', [AdminProdukController::class, 'hapus'])->name('admin.produk.hapus');
    });
    Route::prefix('retur')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('admin.retur');
        Route::get('tambah', [AdminProdukController::class, 'tambah'])->name('admin.retur.tambah');
        Route::post('simpan', [AdminProdukController::class, 'simpan'])->name('admin.retur.simpan');
        Route::get('ubah/{id}', [AdminProdukController::class, 'ubah'])->name('admin.retur.ubah');
        Route::post('edit', [AdminProdukController::class, 'edit'])->name('admin.retur.edit');
        Route::get('hapus/{id}', [AdminProdukController::class, 'hapus'])->name('admin.retur.hapus');
    });
    Route::get('pesanan', [AdminPesananController::class, 'index'])->name('admin.pesanan');
});

Auth::routes();
