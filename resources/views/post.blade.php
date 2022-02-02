@extends('layouts.main')

@section('container')
    <article class="mb-3">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <p>By <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></p>
        {!! $post->body !!}
    </article>

    <a href="/blog" class="text-decoration-none">Kembali</a>
@endsection
