@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Our Projects</h1>
    <?php $n = 1; ?>
    @foreach ($posts as $post)
        <article class="mb-4 border-bottom pb-3">
            <h2><a href="/blog/{{ $post->slug }}" class="text-decoration-none"> {{ $n . '. ' . $post->title }}</a></h2>
            
            <p>Created by <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></p>
            <p style="text-align: justify">{{ $post->excerpt }}</p>
            <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Baca selengkapnya..</a>
        </article>
        <?php $n++; ?>
    @endforeach
@endsection
