@extends('dasbor.tampilan.utama')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kategori Pos</h1>
        </div>
        @if ($kategori->count())
            <div class="table-responsive col-lg-8">
                {{-- flash pos telah terbit --}}
                @if (session()->has('hijau'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('hijau') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- flash terdaftar --}}
                @if (session()->has('merah'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('merah') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="/dasbor/posts/create" class="btn btn-sm btn-primary mb-3">Kategori Baru</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kateg)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $kateg->nama }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="/dasbor/kategori/{{ $kateg->kateg_id }}" class="badge bg-secondary mb-1"><span
                                            data-feather="eye"></span> </a>
                                    <a href="/dasbor/kategori/{{ $kateg->kateg_id }}/edit" class="badge bg-warning mb-1"><span
                                            data-feather="edit"></span> </a>
                                    <form action="/dasbor/kategori/{{ $kateg->kateg_id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger mb-1 border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span></button>
                                    </form>
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
