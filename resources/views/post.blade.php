@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>Oleh <a href="/author/{{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a>
                    pada kategori <a href="/kategori/{{ $post->kategori->slug }}"
                        class="text-decoration-none">{{ $post->kategori->nama }}</a></p>
                <img src="https://source.unsplash.com/960x360?{{ $post->kategori->nama }}" class="img-fluid" alt="{{ $post->title }}">
                <article class="my-3 fs-5 text-justify">
                    {!! $post->body !!}
                </article>
                <a href="/blog" class="text-decoration-none btn btn-dark">Kembali</a>
            </div>
        </div>
    </div>


@endsection
