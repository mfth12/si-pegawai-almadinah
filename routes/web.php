<?php

use App\Http\Controllers\BeritaCtrl;
use App\Http\Controllers\DasborCtrl;
use App\Http\Controllers\KonfigCtrl;
use App\Http\Controllers\ProfilCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaCtrl;
use App\Http\Controllers\MasukController;

# route root
Route::get('/', function () {
    // $where = array('konfig_id' => 701);
    $konfig  = App\Models\Konfig::firstWhere('konfig_id', 701);
    return view('sistem.masuk', [
        'title' => 'Masuk | '.$konfig->nama_sistem.' '.$konfig->unik,
        'konfig' => App\Models\Konfig::firstWhere('konfig_id', 701),
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
    Route::delete('/pengguna/hapus/{id}', [PenggunaCtrl::class, 'destroy'])->name('hapus.pengguna'); //resource of penggunas
    Route::controller(PenggunaCtrl::class)->group(function () {
        Route::get('/hapusfoto', 'hapusfoto'); //hapus foto
        Route::get('/gantistatus', 'gantistatus'); //ganti status
    });
    # route of profil controller
    Route::get('/profil', [ProfilCtrl::class, 'index'])->name('profil'); //profil saya
    # group route of berita resource
    Route::resource('/berita', BeritaCtrl::class); //resource of Berita
    # group routes of konfig resource
    // Route::post('/konfig/store_umum/{id}', [KonfigCtrl::class, 'store_umum'])->name('konfig.umum'); //resource of penggunas
    Route::controller(KonfigCtrl::class)->group(function () {
        Route::post('/konfig/store_umum/{id}', 'store_umum')->name('konfig.umum'); //store konfig umum
        Route::get('/konfig/ambil_level', 'ambil_level')->name('konfig.ambil_level'); //store konfig umum
    });
    Route::resource('/konfig', KonfigCtrl::class); //resource of Konfig

});

# route maintenance
Route::get('/maintenance', function () {
    $konfig  = App\Models\Konfig::firstWhere('konfig_id', 701);
    return view('sistem.maintenance', [
        'title' => 'Maintenance | '.$konfig->nama_sistem.' '.$konfig->unik,
        'konfig' => $konfig,
    ]);
})->name('maintenance');
