@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Semua Kategori</h1>
    <div class="container">
        <div class="row">
            @foreach ($kategories as $kateg)
                <div class="col-md-4">
                    <a href="/blog?kateg={{ $kateg->slug }}">
                        <div class="card bg-dark text-white mb-4">
                            <img src="https://source.unsplash.com/320x240?{{ $kateg->nama }}" class="card-img"
                                alt="{{ $kateg->nama }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill fs-4 p-4"
                                    style="background-color: rgba(0, 0, 0, 0.65)">{{ $kateg->nama }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <a href="/blog" class="btn btn-outline-dark my-4">
        Kembali ke blog</a>
@endsection
