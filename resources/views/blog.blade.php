@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <?php $n = 1; ?>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog" method="GET">
                <div class="input-group mb-3">
                    @if (request('kateg'))
                        <input type="hidden" name="kateg" value="{{ request('kateg') }}">
                    @elseif (request('penulis'))
                        <input type="hidden" name="penulis" value="{{ request('penulis') }}">
                    @endif
                    <input type="text" class="form-control" placeholder="Cari.." name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>


    @if ($posts->count())
        <div class="card mb-5">
            <img src="https://source.unsplash.com/960x360?{{ $posts[0]->kategori->nama }}" class="card-img-top"
                alt="{{ $posts[0]->kategori->nama }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $n . '. ' . $posts[0]->title }}</a></h3>
                <small class="text-muted">
                    <p>Ditulis oleh <a href="/blog?penulis={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> pada kategori <a
                            href="/blog?kateg={{ $posts[0]->kategori->slug }}"
                            class="text-decoration-none">{{ $posts[0]->kategori->nama }}</a>
                        sekitar {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                </small>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Baca
                    selengkapnya</a>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <?php $n++; ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-2 py-1 text-white"
                                style="background-color: rgba(0, 0, 0, 0.6)">
                                <small><a href="/blog?kateg={{ $post->kategori->slug }}"
                                        class="text-decoration-none text-white">{{ $post->kategori->nama }}</a></small>
                            </div>
                            <a href="/blog/{{ $post->slug }}">
                                <img src="https://source.unsplash.com/320x200?{{ $post->kategori->nama }}"
                                    class="card-img-top" alt="{{ $post->kategori->nama }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="/blog/{{ $post->slug }}"
                                        class="text-decoration-none text-black">{{ $n . '. ' . $post->title }}</a></h5>
                                <p><small>Ditulis oleh <a href="/blog?penulis={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small></p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Baca selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Tidak dapat menemukan pos.</p>
    @endif

    <div class="d-flex justify-content-end mb-4">
        {{ $posts->links() }}
    </div>

@endsection
