@extends('theme.masuk')

@section('container')
    {{-- card --}}
    <div class="card card-outline card-secondary">
        <div class="card-header text-center">
            <h2>Sistem Pegawai</h2>
        </div>
        <div class="card-body mx-auto">
            <div class="text-center mb-3">
                <img src="/img/logo-yys-almadinah.png" alt="" style="width: 150px;">
            </div>
            <p class="login-box-msg">Masuk untuk mendapatkan akses ke Sistem Pegawai Yayasan Pendidikan Al-Madinah.</p>
            {{-- kalau ada error di password --}}
            {{-- @error('password')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ $message }}
                </div>
            @enderror --}}
            {{-- flash gagal masuk --}}
            @if (session()->has('masukGagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('masukGagal') }}
                </div>
            @endif

            {{-- flash kosong masuk --}}
            @if (session()->has('masukKosong'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa-solid fa-key mr-2"></i>{{ session('masukKosong') }}
                </div>
            @endif
            
            {{-- flash no-user --}}
            @if (session()->has('nouser'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa-solid fa-ban mr-2"></i>{{ session('nouser') }}
                </div>
            @endif

            {{-- flash keluar user --}}
            @if (session()->has('keluar'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa-solid fa-check mr-2"></i>{{ session('keluar') }}
                </div>
            @endif

            <form action="/masuk" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nomor ID" name="nomer_induk"
                        value="{{ old('nomer_induk') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    {{-- /.col --}}
                    <div class="col-4">
                        <button type="submit" id="tombolmasuk" class="btn btn-success btn-block">Masuk<i
                                class="fas fa-arrow-right ml-1"></i></button>
                    </div>
                    {{-- /.col --}}
                </div>
            </form>
            <p class="mt-5 mb-2 text-center text-muted">
                © {{ now()->year }} <a href="https://sekolahalmadinah.sch.id/" style="color: rgb(71, 71, 71)">Yayasan Pendidikan Al-Madinah Kepri</a>.
            </p>
        </div>
        {{-- /.card-body --}}
    </div>
    {{-- card --}}
@endsection
