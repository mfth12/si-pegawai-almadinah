<?php

use App\Http\Controllers\BeritaCtrl;
use App\Http\Controllers\DasborCtrl;
use App\Http\Controllers\ProfilCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaCtrl;
use App\Http\Controllers\MasukController;

# route root
Route::get('/', function () {
    return view('sistem.masuk', [
        "title" => "Masuk",
    ]);
})->name('masuk')->middleware('guest');
# group route of controller masuk
Route::controller(MasukController::class)->group(function () {
    Route::post('/masuk', [MasukController::class, 'auth']);
    Route::get('/keluar', [MasukController::class, 'keluar']);
});

# group route using middleware auth
Route::middleware('auth')->group(function () {
    # route dashboard
    Route::get('/dasbor', [DasborCtrl::class, 'index'])->name('dasbor'); //dasbor
    # group route of pengguna controller
    Route::resource('/pengguna', PenggunaCtrl::class); //resource of penggunas
    Route::controller(PenggunaCtrl::class)->group(function () {
        Route::get('/hapusfoto', 'hapusfoto'); //hapus foto
        Route::get('/gantistatus', 'gantistatus'); //ganti status
    });
    # route of profil controller
    Route::get('/profil', [ProfilCtrl::class, 'index'])->name('profil'); //profil saya
    # group route of resource berita
    Route::resource('/berita', BeritaCtrl::class); //resource of berita
});

# route maintenance
Route::get('/maintenance', function () {
    return view('sistem.maintenance', [
        "title" => "Maintenance",
    ]);
})->name('maintenance');
