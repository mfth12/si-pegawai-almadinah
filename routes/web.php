<?php

use App\Http\Controllers\PostController;
use App\Models\Kategori;
use App\Models\Post;
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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Mr. Miftahul Haq",
        "email" => "me@mfth12.com",
        "image" => "miftah-small.jpg"
    ]);
});

#routes basic
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']); //sing routes model binding

#routes semua kategori
Route::get('/kategories', function () {
    return view('kategories', [
        'title' => "Kategori Post",
        'kategories' => Kategori::all() //model kategori yg dikirim
    ]);
});

#routes post berdasarkan kategori
Route::get('/kategori/{kategori:slug}', function (Kategori $kategori) {
    return view('kategori', [
        'title' => "Kategori: ".$kategori->nama,
        'deis' => $kategori->post, //ini data yang dikirim
        'kategori' => $kategori->nama
    ]);
});
