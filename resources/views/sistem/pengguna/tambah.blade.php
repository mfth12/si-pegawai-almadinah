@extends('theme.back')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>{{ $head_page }}</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render() }}
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form enctype="multipart/form-data" action="/pengguna" method="POST" name="daftar">
                    @csrf
                    <div class="row">
                        {{-- left column --}}
                        <div class="col-md-6">
                            {{-- general form elements --}}
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Profil</h3>
                                </div>
                                {{-- /.card-header --}}

                                <div class="card-body">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Nomor ID</span>
                                        </div>
                                        <input type="text" onkeypress="return /[0-9a-zA-Z.]/i.test(event.key)"
                                            class="form-control @error('nomer_induk') is-invalid @enderror" id="nomer_induk"
                                            name="nomer_induk" value="{{ old('nomer_induk') }}" placeholder="Nomer Induk"
                                            autofocus>

                                        @error('nomer_induk')
                                            <div class="invalid-feedback">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap *</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Fulan">

                                        @error('nama')
                                            <div class="invalid-feedback">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="fulan@gmail.com">

                                        @error('email')
                                            <div class="invalid-feedback">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" value="{{ old('password') }}"
                                            placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

                                        @error('password')
                                            <div class="invalid-feedback">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_ulang">Password Konfirmasi *</label>
                                        <input type="password"
                                            class="form-control @error('password_ulang') is-invalid @enderror"
                                            id="password_ulang" name="password_ulang" value=""
                                            placeholder="Konfirmasi password Anda">

                                        @error('password_ulang')
                                            <div class="invalid-feedback">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <small>
                                                    <label class="form-check-label" for="keterangan">* Wajib diisi</label>
                                                </small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-switch float-right">
                                                    <input type="checkbox" name="status" class="custom-control-input"
                                                        id="status" checked>
                                                    <label class="custom-control-label" for="status">Status Aktif
                                                        Pengguna</label>
                                                </div>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        *{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="/pengguna" class="btn btn-outline-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary float-right">Tambah<i
                                            class="fa-solid fa-plus ml-2"></i></button>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="gambar" class="form-label">Gambar Post</label>
                                            <input type="hidden" name="fotoOld" {{-- value="{{ $post->gambar }}" --}}>
                                            {{-- @if ($post->gambar)
                                                <img src="{{ asset('storage/' . $post->gambar) }}"
                                                    class="img-lihat img-fluid mb-3 col-sm-5 d-block">
                                            @else
                                                <img class="img-lihat img-fluid mb-3 col-sm-5">
                                            @endif --}}
                                            <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                                id="gambar" name="foto" onchange="lihatGambar()">
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    *{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nama_arab">Nama Arab</label>
                                                <input type="text"
                                                    class="form-control @error('nama_arab') is-invalid @enderror"
                                                    id="nama_arab" name="nama_arab" value="{{ old('nama_arab') }}"
                                                    placeholder="Nama lengkap dalam bahasa Arab">
                                            </div>
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                                    id="nisn" name="nisn" value="{{ old('nisn') }}"
                                                    placeholder="Nomor Induk Santri Nasional">
                                            </div>
                                            <div class="form-group">
                                                <label for="example">Asal</label>
                                                <input type="text" class="form-control @error('asal') is-invalid @enderror"
                                                    id="asal" name="asal" value="{{ old('asal') }}"
                                                    placeholder="Kota/daerah asal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat</label>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" name="tempat_lahir"
                                                    value="{{ old('tempat_lahir') }}" placeholder="Kota/daerah">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <!-- Date -->
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <div class="input-group date" data-target-input="nearest">
                                                    <input type="text"
                                                        class="form-control datetimepicker-input @error('tanggal_lahir') is-invalid @enderror""
                                                            data-target=" #tanggal_lahir" id="tanggal_lahir"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                        placeholder="mm/dd/yyyy" />
                                                    <div class="input-group-append" data-target="#tanggal_lahir"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                                    value="{{ old('alamat') }}" rows="3"
                                                    placeholder="Alamat rumah.."></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control select2" name="kelas" style="width: 100%;">
                                                    <option selected="selected">--Pilih--</option>
                                                    <option>Kelas 1</option>
                                                    <option>Kelas 2</option>
                                                    <option>Kelas 3</option>
                                                    <option>Kelas 4</option>
                                                    <option>Kelas 5</option>
                                                    <option>Kelas 6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Sub-kelas</label>
                                                <select class="form-control select2" name="sub_kelas" style="width: 100%;">
                                                    <option selected="selected">--Pilih--</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                    <option>E</option>
                                                    <option>F</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- end --}}
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="nama_ayah">Ayah</label>
                                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                                id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Nama Ayah">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah">Pekerjaan</label>
                                                <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="nama_ibu">Ibu</label>
                                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                                id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Nama Ibu">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu">Pekerjaan</label>
                                                <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
