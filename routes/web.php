<?php

use App\Models\Kategori;
use App\Models\Post;//boleh dihapus
use App\Models\User;//boleh dihapus
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\DaftarController;

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
        'aktif'=> 'about'
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
Route::get('/masuk', [MasukController::class, 'index']);

#routes untuk daftar
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'buat']);

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
