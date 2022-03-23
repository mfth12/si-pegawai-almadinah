@extends('theme.back')

@section('container')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
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
            </div>{{-- /.container-fluid --}}
        </section>

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- left column --}}
                    <div class="col-md-6">
                        {{-- general form elements --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Akun</h3>
                            </div>
                            {{-- /.card-header --}}
                            <form enctype="multipart/form-data" action="/pengguna/{{ $pengguna->user_id }}" method="POST">
                                @method('PUT') {{-- method untuk update, bisa juga pake patch --}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap *</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama', $pengguna->nama) }}"
                                            placeholder="">

                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nomer_induk">Nomer Induk *</label>
                                        <input type="text" onkeypress="return /[0-9a-zA-Z.]/i.test(event.key)"
                                            class="form-control @error('nomer_induk') is-invalid @enderror" id="nomer_induk"
                                            name="nomer_induk" value="{{ old('nomer_induk', $pengguna->nomer_induk) }}"
                                            placeholder="">

                                        @error('nomer_induk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $pengguna->email) }}"
                                            placeholder="{{ $pengguna->email ?? 'Tidak ada data, isi jika ingin menambah email' }}">

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" value="{{ old('password') }}"
                                            placeholder="Isi jika ingin mengganti password">

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <small><label class="form-check-label" for="keterangan">* Wajib
                                                diisi</label></small>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- /.card-body --}}
                                <div class="card-footer">
                                    <a href="/pengguna" class="btn btn-outline-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary float-right">Simpan<i
                                            class="fa-solid fa-floppy-disk ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- /.col (left) --}}

                    {{-- right column --}}
                    {{-- <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pengguna</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                                        value="option1">
                                                    <label for="customCheckbox1" class="custom-control-label">Satu</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                        checked>
                                                    <label for="customCheckbox2" class="custom-control-label">Custom
                                                        Checkbox checked</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox3"
                                                        disabled>
                                                    <label for="customCheckbox3" class="custom-control-label">Custom
                                                        Checkbox disabled</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                        type="checkbox" id="customCheckbox4" checked>
                                                    <label for="customCheckbox4" class="custom-control-label">Custom
                                                        Checkbox with custom
                                                        color</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input
                                                        class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                        type="checkbox" id="customCheckbox5" checked>
                                                    <label for="customCheckbox5" class="custom-control-label">Custom
                                                        Checkbox with custom color
                                                        outline</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="customRadio1"
                                                        name="customRadio">
                                                    <label for="customRadio1" class="custom-control-label">Custom
                                                        Radio</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="customRadio2"
                                                        name="customRadio" checked>
                                                    <label for="customRadio2" class="custom-control-label">Custom Radio
                                                        checked</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="customRadio3"
                                                        disabled>
                                                    <label for="customRadio3" class="custom-control-label">Custom Radio
                                                        disabled</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                        type="radio" id="customRadio4" name="customRadio2" checked>
                                                    <label for="customRadio4" class="custom-control-label">Custom Radio
                                                        with custom
                                                        color</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input
                                                        class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                        type="radio" id="customRadio5" name="customRadio2">
                                                    <label for="customRadio5" class="custom-control-label">Custom Radio
                                                        with custom color
                                                        outline</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Custom Select</label>
                                                <select class="custom-select">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Custom Select Disabled</label>
                                                <select class="custom-select" disabled>
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Custom Select Multiple</label>
                                                <select multiple class="custom-select">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Custom Select Multiple Disabled</label>
                                                <select multiple class="custom-select" disabled>
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Toggle this custom
                                                switch
                                                element</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3">Toggle this custom
                                                switch element with
                                                custom colors danger/success</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" disabled
                                                id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2">Disabled custom switch
                                                element</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customRange1">Custom range</label>
                                        <input type="range" class="custom-range" id="customRange1">
                                    </div>
                                    <div class="form-group">
                                        <label for="customRange2">Custom range (custom-range-danger)</label>
                                        <input type="range" class="custom-range custom-range-danger" id="customRange2">
                                    </div>
                                    <div class="form-group">
                                        <label for="customRange3">Custom range (custom-range-teal)</label>
                                        <input type="range" class="custom-range custom-range-teal" id="customRange3">
                                    </div>
                                    <div class="form-group">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection
