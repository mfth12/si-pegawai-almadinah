<?php

use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DasborCtrl;
use App\Http\Controllers\ProfilCtrl;
use App\Http\Controllers\SantriCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaCtrl;
use App\Http\Controllers\MasukController;

########## SISTEM ##########
# route root masuk
Route::get('/', function () {
    return view('sistem.masuk', [
        "title" => "Masuk | Sistem Portal Santri",
    ]);
})->name('masuk')->middleware('guest'); //dikasi nama 'masuk' dan dijagain, supaya yg bisa akses masuk hanya 'guest'
# routes untuk masuk
Route::post('masuk', [MasukController::class, 'auth']);
# route untuk keluar
Route::get('keluar', [MasukController::class, 'keluar']);
# route untuk dasbor
Route::get('dasbor', [DasborCtrl::class, 'index'])->middleware('auth')->name('dasbor');
# route untuk resource pengguna
Route::resource('pengguna', PenggunaCtrl::class)->middleware('auth');
# route untuk akses spesial
Route::get('hapusfoto', [PenggunaCtrl::class, 'hapusfoto'])->middleware('auth');
Route::get('gantistatus', [PenggunaCtrl::class, 'gantistatus'])->middleware('auth');
# route profil masing2 user
Route::get('profil', [ProfilCtrl::class, 'index'])->middleware('auth')->name('profil');


########## SISTEM ##########
# route untuk server-side processing
// Route::get('/pengguna/json', [PenggunaCtrl::class, 'json'])->middleware('auth')->name('ajax');
// Route::get('/pengguna/ajax', function (Illuminate\Http\Request $request) {
//     //only sorts by one column
//     $orderby = $request->input('order.0.column');
//     $sort['col'] = $request->input('columns.' . $orderby . '.data');
//     $sort['dir'] = $request->input('order.0.dir');
//     $nomer_induk = 'nomer_induk';
//     $nama = 'nama';

//     // $query = DB::table('pengguna')->get();
//     $query = App\Models\Pengguna::where($nomer_induk, 'like', '%' . $request->input('search.value') . '%')
//         ->orWhere($nama, 'like', '%' . $request->input('search.value') . '%');

//     $output['recordsTotal'] = $query->count();

//     $output['data'] = $query
//         ->orderBy($sort['col'], $sort['dir'])
//         ->skip($request->input('start'))
//         ->take($request->input('length', 10))
//         ->get();

//     $output['recordsFiltered'] = $output['recordsTotal'];

//     $output['draw'] = intval($request->input('draw'));

//     return $output;
// })->name('pengguna.index')->middleware('auth');

# route untuk resource santri
Route::resource('santri', SantriCtrl::class)->middleware('auth');


########## SISTEM ##########
# route untuk resource santri
Route::resource('asatidz', SantriCtrl::class)->middleware('auth');
