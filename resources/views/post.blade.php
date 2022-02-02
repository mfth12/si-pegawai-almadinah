@extends('layouts.main')

@section('container')
<article class="mb-3">
    <h2 class="mb-3">{{ $post->title }}</h2>
    <p>By Miftahul Haq in <a href="/kategori/{{ $post->kategori->slug }}">{{ $post->kategori->nama }}</a></p>
    {!! $post->body !!}
</article>

<a href="/blog">
    << Kembali</a>
@endsection