<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome Icons --}}
    {{-- <script src="https://kit.fontawesome.com/c19cab79ac.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="/js/back/font-awesome.js"></script> --}}
    <link rel="stylesheet" href="/css/font-awesome.css">
    {{-- JS-atas --}}
    @yield('js_atas')
    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href="/css/back/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/css/tables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/buttons.bootstrap4.min.css">
    {{-- Theme style --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> --}}
    
    <link rel="stylesheet" href="/css/back/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/css/back/adminlte.min.css">
    <link rel="stylesheet" href="/css/back/dropify.min.css">
    <script src="/js/back/nprogress.js"></script>
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet"> {{-- iziToast --}}
    <link rel="stylesheet" href="/css/back/nprogress.css">
    {{-- Fav-icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/' . $konfig->ikon) }}">
    @yield('style')


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="thisme">
        @once
            {{-- <x-back.navbar /> --}}
            @include('components.back.navbar') {{-- manggil komponen view navbar --}}
            {{-- <x-back.sidebar /> --}}
            @include('components.back.sidebar') {{-- manggil komponen view sidebar --}}
            @include('vendor.lara-izitoast.toast')
        @endonce
        {{-- include isi ke dalam container --}}
        @yield('container')
        @include('theme.modal')

        <footer class="main-footer">
            © {{ now()->year }}. {{ $konfig->nama_sistem }} <a href="mailto:{{ $konfig->email_resmi }}"
                style="color: green">{{ $konfig->nama_lembaga }}</a>.
        </footer>
    </div>
    @once
        {{-- jQuery --}}
        <script src="/js/back/jquery.min.js"></script>
        <script src="/js/part_js/jquery.validate.min.js"></script>{{-- jQuery validator --}}
        <script src="/js/part_js/validasi.js"></script>{{-- isi konten validasi --}}
        {{-- Bootstrap 4 --}}
        <script src="/js/back/bootstrap.bundle.min.js"></script>
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
        <script src="{{ asset('js/iziToast.js') }}"></script> {{-- iziToast --}}
        {{-- @include('vendor.lara-izitoast.toast') --}}
        {{-- Batas --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
        </script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" /> --}}



        {{-- untuk konfigurasi tabel --}}
        {{-- @if ($tabel == 'penggunaasd') --}}
        {{-- <script src="/js/part_js/tabel_pengguna.js"></script> --}}
        {{-- <script src="/js/part_js/tabel_default.js"></script> --}}
        {{-- @endif --}}

        {{-- javascript untuk admin lte 3 --}}
        <script src="/js/back/jquery.overlayScrollbars.min.js"></script>
        <script src="/js/back/adminlte.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7. 29.2/sweetalert2.all.js"></script> --}}

        <script src="/js/back/dropify.min.js"></script>
        {{-- <script src="/js/back/helpers.js"></script> --}}
        <script src="/js/part_js/additional.js"></script>
        @yield('js_bawah')

    @endonce

</body>

</html>
