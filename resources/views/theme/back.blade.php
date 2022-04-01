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
    {{-- Konfigurasi setting for advanced forms --}}
    @if ($setting['form'] == true)
        <link rel="stylesheet" href="/css/back/daterangepicker.css">
        <link rel="stylesheet" href="/css/back/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="/css/back/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="/css/back/select2.min.css">
        <link rel="stylesheet" href="/css/back/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="/css/back/bootstrap-duallistbox.min.css">
        <link rel="stylesheet" href="/css/back/bs-stepper.min.css">
        <link rel="stylesheet" href="/css/back/dropzone.min.css">
        {{-- <h2>Used setting for advanced forms</h2> --}}
    @endif
    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href="/css/back/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/css/tables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/tables/buttons.bootstrap4.min.css">
    {{-- Theme style --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/css/back/adminlte.min.css">
    <link rel="stylesheet" href="/css/back/dropify.min.css">
    <link rel="icon" type="image/x-icon" href="/img/logo-pondok-idris-red.png">



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @once
            {{-- <x-back.navbar /> --}}
            @include('components.back.navbar') {{-- manggil komponen view navbar --}}
            {{-- <x-back.sidebar /> --}}
            @include('components.back.sidebar') {{-- manggil komponen view sidebar --}}
        @endonce
        {{-- include isi ke dalam container --}}
        @yield('container')

        <footer class="main-footer">
            © {{ now()->year }}. Portal Santri <a href="https://idriskepri.ponpes.id/" style="color: green">Pondok
                Pesantren Idris Bintan</a>.
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
        {{-- Batas --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
        </script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" /> --}}


        {{-- Konfigurasi setting for advanced forms --}}
        @if ($setting['form'] == true)
            <script src="/js/back/select2.full.min.js"></script>
            <script src="/js/back/jquery.bootstrap-duallistbox.min.js"></script>
            <script src="/js/back/moment.min.js"></script>
            <script src="/js/back/jquery.inputmask.min.js"></script>
            <script src="/js/back/daterangepicker.js"></script>
            <script src="/js/back/bootstrap-colorpicker.min.js"></script>
            <script src="/js/back/tempusdominus-bootstrap-4.min.js"></script>
            <script src="/js/back/bootstrap-switch.min.js"></script>
            <script src="/js/back/bs-stepper.min.js"></script>
            <script src="/js/back/dropzone.min.js"></script>
            {{-- <h2>Used setting for advanced forms</h2> --}}
        @endif



        {{-- untuk konfigurasi tabel --}}
        @if ($tabel == 'pengguna')
            <script src="/js/part_js/tabel_pengguna.js"></script>
        @else
            <script src="/js/part_js/tabel_default.js"></script>
        @endif

        {{-- javascript untuk admin lte 3 --}}
        <script src="/js/back/adminlte.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7. 29.2/sweetalert2.all.js"></script> --}}

        <script src="/js/back/dropify.min.js"></script>
        <script src="/js/back/helpers.js"></script>
        <script src="/js/part_js/additional.js"></script>

    @endonce

</body>

</html>
