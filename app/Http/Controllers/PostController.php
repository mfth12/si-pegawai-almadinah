<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "title" => "Blog",
            // "posts" => Post::all() //untuk semua, sort berdasarkan id
            "posts" => Post::latest()->get() //sort berdasarkan time latest nya
        ]);
    }

    public function show(Post $post) //using route model binding //mencari data dengan slug yg dikirim tadi
    {
        return view('post', [
            "title" => "Postingan Single",
            "post" => $post //kirim data dengan variable $post
        ]);
    }
}
