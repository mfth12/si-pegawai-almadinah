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
    <link rel="stylesheet" href="/css/tables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/buttons.bootstrap4.min.css">
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
            {{-- <x-back.navbar /> --}}
            @include('components.back.navbar') {{-- manggil komponen view navbar --}}
            {{-- <x-back.sidebar /> --}}
            @include('components.back.sidebar') {{-- manggil komponen view sidebar --}}
        @endonce
        {{-- include isi ke dalam container --}}
        @yield('container')

        <footer class="main-footer">
            © {{ now()->year }} <a href="https://idriskepri.ponpes.id/" style="color: green">Pondok
                Pesantren Idris Bintan</a>. Hak cipta dilindungi undang-undang.
        </footer>
    </div>
    @once
        {{-- jQuery --}}
        <script src="/js/front/jquery.min.js"></script>
        {{-- Bootstrap 4 --}}
        <script src="/js/front/bootstrap.bundle.min.js"></script>
        <script src="/js/tables/jquery.dataTables.min.js"></script>
        <script src="/js/tables/dataTables.bootstrap4.min.js"></script>
        <script src="/js/tables/dataTables.responsive.min.js"></script>
        <script src="/js/tables/dataTables.buttons.min.js"></script>
        <script src="/js/tables/buttons.bootstrap4.min.js"></script>
        <script src="/js/tables/buttons.html5.min.js"></script>
        <script src="/js/tables/buttons.print.min.js"></script>
        <script src="/js/tables/buttons.colVis.min.js"></script>
        <script src="/js/process/jszip.min.js"></script>
        <script src="/js/process/pdfmake.min.js"></script>
        <script src="/js/process/vfs_fonts.js"></script>
        <script src="/js/demo.js"></script>

        <script src="/js/part_js/additional.js"></script>
        {{-- untuk konfigurasi tabel --}}
        @if ($tabel == 'pengguna')
            <script src="/js/part_js/tabel_pengguna.js"></script>
        @else
            <script src="/js/part_js/tabel_default.js"></script>
        @endif

        {{-- javascript untuk admin lte 3 --}}
        <script src="/js/front/adminlte.min.js"></script>
    @endonce

</body>

</html>
