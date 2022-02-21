@extends('dasbor.tampilan.utama')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container">
            <div class="row my-4">
                <div class="col-lg-8">
                    <h1 class="mb-3">{{ $post->title }}</h1>
                    <a href="/dasbor/posts" class="btn btn-sm btn-outline-secondary mr-2"><span
                            data-feather="arrow-left"></span> Kembali</a>
                    <a href="/dasbor/posts/{{ $post->post_id }}/edit" class="btn btn-sm btn-outline-warning mr-2"><span data-feather="edit"></span> Edit</a>
                    <form action="/dasbor/posts/{{ $post->post_id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-outline-danger mr-2"
                            onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span>
                            Hapus</button>
                    </form>
                    {{-- <a href="" class="btn btn-sm btn-outline-danger mr-2"><span data-feather="trash"></span> Hapus</a> --}}
                    <img src="https://source.unsplash.com/960x360?{{ $post->kategori->nama }}" class="img-fluid mt-3"
                        alt="{{ $post->title }}">
                    <article class="my-3 fs-5 text-justify">
                        {!! $post->body !!}
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
