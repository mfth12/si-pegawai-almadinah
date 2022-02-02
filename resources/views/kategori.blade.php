@extends('layouts.main')

@section('container')
<h1 class="mb-4">Post Kategori: {{ $kategori }}</h1>
<?php $n=1; ?>
@foreach ($deis as $post)
<article class="mb-3">
    <h2>
        <a href="/blog/{{ $post->slug }}">
            {{ $n.". ".$post->title }}
    </h2>
    </a>
    <p style="text-align: justify">{{ $post->excerpt }}</p>
</article>
<?php $n++; ?>
@endforeach
<a href="/blog">
    << Kembali ke blog</a>
@endsection