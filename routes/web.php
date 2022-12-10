<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminPelangganController;
use App\Http\Controllers\Admin\AdminReturController;
use App\Http\Controllers\PesananController;

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

// BAGIAN HOME
Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');

//PRODUK
Route::get('daftar-produk', [HomeController::class, 'produk'])->name('produk');

//KONTAK
Route::get('kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('nota', function () {
    return view('nota');
})->name('nota');
// Route::get('coba', function () {
//     return view('coba');
// })->name('coba');

//BAGIAN USER
Route::middleware('auth')->group(function () {
    Route::get('kota', [RajaOngkirController::class, 'kota'])->name('kota');
    Route::post('ongkir', [RajaOngkirController::class, 'ongkir'])->name('ongkir');
    Route::get('profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('profil', [ProfilController::class, 'store']);
    Route::prefix('pesanan')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('pesanan');
        Route::get('{id}/terima', [PesananController::class, 'terima'])->name('pesanan.terima');
        Route::get('{id}/detail', [PesananController::class, 'detail'])->name('pesanan.detail');
        Route::get('{id}/nota', [PesananController::class, 'nota'])->name('pesanan.nota');
    });
    Route::get('retur/{id}/tambah', [ReturController::class, 'tambah'])->name('retur.tambah');
    Route::post('retur/tambah', [ReturController::class, 'simpan'])->name('retur.simpan');
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
        Route::get('bayar/{id}', [CheckoutController::class, 'bayar'])->name('checkout.bayar');
        Route::post('bayar/simpan', [CheckoutController::class, 'simpanBayar'])->name('bayar.simpan');
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
        Route::get('/', [AdminReturController::class, 'index'])->name('admin.retur');
        Route::get('terima/{id}', [AdminReturController::class, 'terima'])->name('admin.retur.terima');
        Route::get('tolak/{id}', [AdminReturController::class, 'tolak'])->name('admin.retur.tolak');
    });
    Route::prefix('pesanan')->group(function () {
        Route::get('/', [AdminPesananController::class, 'index'])->name('admin.pesanan');
        Route::get('detail/{id}', [AdminPesananController::class, 'detail'])->name('admin.pesanan.detail');
        Route::post('resi', [AdminPesananController::class, 'resi'])->name('admin.pesanan.resi');
    });
    Route::prefix('laporan')->group(function () {
        Route::get('/', [AdminLaporanController::class, 'index'])->name('admin.laporan');
        Route::get('pesanan', [AdminLaporanController::class, 'pesanan'])->name('admin.laporan.pesanan');
        Route::get('retur', [AdminLaporanController::class, 'retur'])->name('admin.laporan.retur');
        Route::get('retur/cetak', [AdminLaporanController::class, 'cetak_retur'])->name('admin.laporan.retur.cetak');
    });
});

Auth::routes();
