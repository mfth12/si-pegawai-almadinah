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
                <form enctype="multipart/form-data" action="/pengguna" method="POST" name="daftar_pengguna">
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
                                            <span class="input-group-text">Nomor ID *</span>
                                        </div>
                                        <input type="text" {{-- onkeypress="return /[0-9.,]/i.test(event.key)" --}}
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
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary float-right">Tambah
                                        <i class="fa-solid fa-plus ml-1"></i></button>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="foto" class="form-label">Foto Profil</label>
                                            <img class="img-lihat img-fluid mb-3">
                                            <a class="btn btn-md btn-outline-secondary mb-3" style="display:block"
                                                onclick="document.getElementById('foto').click()">Upload
                                                <i class="fa-solid fa-circle-arrow-up ml-1"></i></a>
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                                id="foto" name="foto" style="display:none" onchange="lihatGambar()">
                                            @error('foto')
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
                                                <input type="number"
                                                    class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                                    name="nisn" value="{{ old('nisn') }}"
                                                    placeholder="Nomor Induk Santri Nasional">
                                            </div>
                                            <div class="form-group">
                                                <label for="asal">Asal</label>
                                                <input type="text" class="form-control @error('asal') is-invalid @enderror"
                                                    id="asal" name="asal" value="{{ old('asal') }}"
                                                    placeholder="Kota/daerah asal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat lahir</label>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" name="tempat_lahir"
                                                    value="{{ old('tempat_lahir') }}" placeholder="Kota/daerah">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <!-- Date -->
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal lahir</label>
                                                <div class="input-group date" data-target-input="nearest">
                                                    <input type="text"
                                                        class="form-control datetimepicker-input @error('tanggal_lahir') is-invalid @enderror"
                                                        data-target=" #tanggal_lahir" id="tanggal_lahir"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                        placeholder="yyyy-mm-dd" />
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
                                                    placeholder="Alamat lengkap rumah.."></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control select2" name="kelas" id="kelas"
                                                    style="width: 100%;">
                                                    <option value="" selected>--Pilih--</option>
                                                    <option value="1">Kelas 1</option>
                                                    <option value="2">Kelas 2</option>
                                                    <option value="3">Kelas 3</option>
                                                    <option value="4">Kelas 4</option>
                                                    <option value="5">Kelas 5</option>
                                                    <option value="6">Kelas 6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Sub-kelas</label>
                                                <select class="form-control select2" name="sub_kelas" style="width: 100%;">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                    <option value="4">D</option>
                                                    <option value="5">E</option>
                                                    <option value="6">F</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- end --}}
                                </div>
                            </div>

                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title">Orang tua</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="nama_ayah">Ayah</label>
                                                <input type="text"
                                                    class="form-control @error('nama_ayah') is-invalid @enderror"
                                                    id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}"
                                                    placeholder="Nama Ayah">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah">Pekerjaan</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                    id="pekerjaan_ayah" name="pekerjaan_ayah"
                                                    value="{{ old('pekerjaan_ayah') }}" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="nama_ibu">Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('nama_ibu') is-invalid @enderror"
                                                    id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}"
                                                    placeholder="Nama Ibu">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu">Pekerjaan</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                    id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                    value="{{ old('pekerjaan_ibu') }}" placeholder="">
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

@section('js_atas')
    <link rel="stylesheet" href="/css/back/daterangepicker.css">
    <link rel="stylesheet" href="/css/back/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/css/back/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/css/back/select2.min.css">
    <link rel="stylesheet" href="/css/back/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/css/back/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="/css/back/bs-stepper.min.css">
    <link rel="stylesheet" href="/css/back/dropzone.min.css">
@endsection

@section('js_bawah')
    <script src="/js/part_js/tabel_pengguna.js"></script>
    <script src="/js/part_js/additional_form.js"></script>
    {{-- sd --}}


    <script src="/js/back/select2.full.min.js"></script>
    {{-- <script src="/js/back/jquery.bootstrap-duallistbox.min.js"></script> --}}
    <script src="/js/back/jquery.inputmask.min.js"></script>
    <script src="/js/back/moment.min.js"></script>
    {{-- <script src="/js/back/daterangepicker.js"></script> --}}
    {{-- <script src="/js/back/bootstrap-colorpicker.min.js"></script> --}}
    <script src="/js/back/tempusdominus-bootstrap-4.min.js"></script>
    {{-- <script src="/js/back/bootstrap-switch.min.js"></script> --}}
    {{-- <script src="/js/back/bs-stepper.min.js"></script> --}}
    {{-- <script src="/js/back/dropzone.min.js"></script> --}}
    {{-- <h2>Used setting for advanced forms</h2> --}}
@endsection
