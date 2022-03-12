<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome Icons --}}
    <script src="https://kit.fontawesome.com/c19cab79ac.js" crossorigin="anonymous"></script>
    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href="/css/front/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Theme style --}}
    <link rel="stylesheet" href="/css/front/adminlte.min.css">
    <link rel="icon" type="image/x-icon" href="/img/logo-pondok-idris-red.png">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- include components --}}
        @once
            <x-back.navbar />
            <x-back.sidebar />
        @endonce
        {{-- include isi ke dalam container --}}
        @yield('container')

        <footer class="main-footer">
            © {{ now()->year }} <a href="https://idriskepri.ponpes.id/" style="color: green">Pondok
                Pesantren Idris Bintan</a>. Hak cipta dilindungi undang-undang.
        </footer>
    </div>

    {{-- jQuery --}}
    <script src="/js/front/jquery.min.js"></script>
    {{-- Bootstrap 4 --}}
    <script src="/js/front/bootstrap.bundle.min.js"></script>
    {{-- AdminLTE App --}}
    <script src="/js/front/adminlte.min.js"></script>
</body>

</html>
