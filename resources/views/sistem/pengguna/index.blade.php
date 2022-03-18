@extends('theme.back')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $head_page }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dasbor</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10">
                        {{-- flash hijau --}}
                        @if (session()->has('hijau'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-check mr-2"></i>{{ session('hijau') }}
                            </div>
                        @endif

                        {{-- flash kuning --}}
                        @if (session()->has('kuning'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-info mr-2"></i>{{ session('kuning') }}
                            </div>
                        @endif

                        {{-- flash info --}}
                        @if (session()->has('info'))
                            <div class="alert alert-info alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-info mr-2"></i>{{ session('info') }}
                            </div>
                        @endif

                        {{-- flash merah --}}
                        @if (session()->has('merah'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('merah') }}
                            </div>
                        @endif
                    </div>


                    <div class="col-lg-10">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div> --}}
                            <div class="card-body">
                                <a href="/pengguna/create" class="btn btn-primary mb-3">Tambah Pengguna <i
                                        class="fa-solid fa-user-plus ml-2"></i></a>

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nomor Induk</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th style="width: 1%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pengguna as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->nomer_induk }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->status === 1 ? 'Admin' : 'Staff' }}</td>
                                                <td class="text-center text-nowrap">
                                                    <a href="/pengguna/{{ $user->user_id }}/edit" {{-- style="color: blue" --}}
                                                        class="btn btn-sm mb-1"><i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{ $user->user_id }}" method="POST"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm mb-1"
                                                            onclick="return confirm('Yakin ingin menghapus data?')">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
