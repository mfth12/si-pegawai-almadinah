<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "title" => "All Posts",
            "aktif" => 'blog',
            // "posts" => Post::all() //untuk semua, sort berdasarkan id
            "posts" => Post::latest()->get() //eager loading //sort berdasarkan time latest nya
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
