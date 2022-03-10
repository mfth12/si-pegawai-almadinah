<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use App\Models\Pengguna;
// use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('cari'));
        $title = '';
        if (request('kateg')) {
            $kategori = Kategori::firstWhere('slug', request('kateg'));
            $title = 'dalam: ' . $kategori->nama;
        }
        
        if (request('penulis')) {
            $penulis = Pengguna::firstWhere('nomer_induk', request('penulis'));
            $title = 'oleh: ' . $penulis->name;
        }
        
        return view('blog', [
            "title" => "Semua pos ". $title,
            "aktif" => 'blog',
            // "posts" => Post::all() //untuk semua, sort berdasarkan id
            "posts" => Post::latest()->filter(request(['cari', 'kateg', 'penulis'])) //using filter //eager loading 
            ->paginate(4) //using pagination
            ->withQueryString() //apapun yg ada di query string sebelumnya, bawa!
        ]);
    }

    public function show(Post $post) //using route model binding //mencari data dengan slug yg dikirim tadi
    {
        return view('post', [
            "title" => "Postingan Single",
            "aktif" => 'blog',
            "post" => $post //kirim data dengan variable $post
        ]);
    }
}
