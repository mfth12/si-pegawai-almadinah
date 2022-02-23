<?php

use App\Models\Kategori;
use App\Models\Post; //boleh dihapus
use App\Models\User; //boleh dihapus
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\DasborKategCtrl;
use App\Http\Controllers\DasborPostCtrl;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'aktif' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Mr. Miftahul Haq",
        "email" => "me@mfth12.com",
        "image" => "miftah-small.jpg",
        'aktif' => 'about'
    ]);
});

#routes basic
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']); //sing routes model binding

#routes semua kategori
Route::get('/kategories', function () {
    return view('kategories', [
        'title' => "Kategori Pos",
        'aktif' => 'kategories',
        'kategories' => Kategori::all() //model kategori yg dikirim
    ]);
});

#routes untuk masuk
Route::get('/masuk', [MasukController::class, 'index'])->name('masuk')->middleware('guest');
Route::post('/masuk', [MasukController::class, 'auth']);

#route untuk keluar
Route::get('/keluar', [MasukController::class, 'keluar']);

#routes untuk daftar
Route::get('/daftar', [DaftarController::class, 'index'])->middleware('guest');
Route::post('/daftar', [DaftarController::class, 'buat'])->middleware('guest');

#route untuk dasbor
// Route::get('/dasbor', [DasborController::class, 'index'])->middleware('auth');
Route::get('/dasbor', function () { //ini menggunakan closure function
    return view('dasbor.index');
})->middleware('auth');
#route untuk pos yang ada di dasbor
// Route::get('/dasbor/posts/{post:post_id}', [DasborPostCtrl::class, 'show'])->middleware('auth'); //sing routes model binding
Route::get('/dasbor/posts/cekSlug', [DasborPostCtrl::class, 'cekSlug'])->middleware('auth');
Route::post('/dasbor/posts/create', [DasborPostCtrl::class, 'store'])->middleware('auth');
Route::resource('/dasbor/posts', DasborPostCtrl::class)->middleware('auth');


Route::resource('/dasbor/kategori', DasborKategCtrl::class)->except('show')->middleware('admin');


// #routes post berdasarkan kategori
// Route::get('/kategori/{kategori:slug}', function (Kategori $kategori) {
//     return view('blog', [
//         'title' => "Posting berdasarkan Kategori: ".$kategori->nama,
//         'aktif' => 'kategories',
//         'posts' => $kategori->post->load('kategori', 'author') //lazy eiger loading
//     ]);
// });

// #routes authors
// Route::get('/author/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Posting berdasarkan Penulis: $author->name",
//         'aktif' => 'blog',
//         'posts' => $author->post->load('kategori', 'author') //lazy eiger loading
//     ]);
// });