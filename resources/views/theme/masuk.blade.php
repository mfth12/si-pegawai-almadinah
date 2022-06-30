<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

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
    <link rel="stylesheet" href="/css/back/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Theme style --}}
    <link rel="stylesheet" href="/css/back/adminlte.min.css">
    <link rel="icon" type="image/x-icon" href="/img/logo-yys-almadinah-red.png">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        @yield('container')
    </div>
    {{-- jQuery --}}
    <script src="/js/back/jquery.min.js"></script>
    {{-- Bootstrap 4 --}}
    <script src="/js/back/bootstrap.bundle.min.js"></script>
    {{-- AdminLTE App --}}
    <script src="/js/back/adminlte.min.js"></script>
    <script src="/js/part_js/additional.js"></script>
    <script src="/js/part_js/masuk.js"></script>

</body>

</html>
