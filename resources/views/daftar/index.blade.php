@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="form-daftar">
                <h1 class="h3 mb-3 fw-normal text-center">Form Daftar</h1>
                <form>
                    {{-- nama lengkap --}}  
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="Nama">
                        <label for="name">Nama lengkap</label>
                    </div>

                    {{-- username --}}
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    
                    {{-- email --}}
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email">Alamat email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Daftar</button>
                </form>
                <small class="d-block text-center mt-4">Sudah terdaftar? <a href="/masuk">Masuk.</a></small>
            </main>
        </div>
    </div>
@endsection
