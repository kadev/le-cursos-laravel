<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Error 404 - CLEF - Liderazgo Efectivo</title>
    <link rel="icon" type="image/x-icon" href="https://liderazgoefectivo.info/wp-content/uploads/2021/02/cropped-flag1.png"/>    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/error/style-400.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="error404 text-center">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
            <a href="#" class="ml-md-5">
                <img alt="image-404" src="{{ asset('assets/img/90x90.jpg') }}" class="theme-logo">
            </a>
        </div>
    </div>
</div>
<div class="container-fluid error-content">
    <div class="">
        <h1 class="error-number">404</h1>
        <p class="mini-text">Ooops!</p>
        <p class="error-text mb-4 mt-1">La página solicitada no ha sido encontrada :(!</p>
        @if(\Illuminate\Support\Facades\Auth::check())
            <a href="{{ route("dashboard") }}" class="btn btn-primary mt-5">Regresar</a>
        @else
            <a href="https://liderazgoefectivo.info" class="btn btn-primary mt-5">Regresar</a>
        @endif
    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
