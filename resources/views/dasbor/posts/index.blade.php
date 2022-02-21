@extends('dasbor.tampilan.utama')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Daftar Postku</h1>
        </div>
        @if ($posts->count())
            <div class="table-responsive col-lg-8">
                {{-- flash terdaftar --}}
                @if (session()->has('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="/dasbor/posts/create" class="btn btn-sm btn-primary mb-3">Buat Pos Baru</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->kategori->nama }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="/dasbor/posts/{{ $post->post_id }}" class="badge bg-secondary mb-1"><span
                                            data-feather="eye"></span> </a>
                                    <a href="/dasbor/posts/{{ $post->post_id }}" class="badge bg-warning mb-1"><span
                                            data-feather="edit"></span> </a>
                                    <a href="/dasbor/posts/destroy/{{ $post->post_id }}"
                                        class="badge bg-danger mb-1"><span data-feather="x-circle"></span> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="table-responsive col-lg-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">Anda tidak memiliki pos.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

    </main>
@endsection
