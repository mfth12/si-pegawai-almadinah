@extends('layouts.main')

@section('container')
<article class="mb-3">
    <h2>{{ $post["title"] }}</h2>
    <h5>Creator: {{ $post["author"] }}</h5>
    <p style="text-align: justify">{{ $post["body"] }}</p>
</article>

<a href="/blog">
    << Kembali ke blog </a>
@endsection