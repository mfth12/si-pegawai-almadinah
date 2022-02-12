@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Silakan Masuk!</h1>
                <form>
                    @if (session()->has('terdaftar'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('terdaftar') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Masuk</button>
                </form>
                <small class="d-block text-center mt-4">Belum terdaftar? <a href="/daftar">Daftar sekarang.</a></small>
            </main>
        </div>
    </div>
@endsection
