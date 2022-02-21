<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DasborPostCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dasbor.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $a = Kategori::firstWhere('slug', 'culture');
        // dd($a);
        return view('dasbor.posts.buat', [
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tervalidasi = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'kateg_id' => 'required',
            'body' => 'required'
        ]);

        $tervalidasi['user_id'] = auth()->user()->id;
        $tervalidasi['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::create($tervalidasi); //langsung eksekusi simpan data ke database
        return redirect('/dasbor/posts/')->with('hijau', 'Pos berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return Post::where('post_id', $post->post_id)->get();
        // return $posts = Post::where('post_id', $post->post_id)->get();;
        // return $post;
        return view('dasbor.posts.tampil', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dasbor.posts.edit', [
            'post' => $post,
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [ //array data
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts',
            'kateg_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $tervalidasi = $request->validate($rules);
        // baru masuk ke ngisi user_id,
        $tervalidasi['user_id'] = auth()->user()->id;
        $tervalidasi['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        //terus save deh
        Post::where('post_id', $post->post_id) //langsung eksekusi simpan data ke database
            ->update($tervalidasi);
        return redirect('/dasbor/posts/')->with('hijau', 'Pos berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->post_id); //langsung eksekusi simpan data ke database
        return redirect('/dasbor/posts/')->with('merah', 'Pos berhasil dihapus.');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
