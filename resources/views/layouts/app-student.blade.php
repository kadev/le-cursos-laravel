@include('inc.function')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($title))
        <title>{{ setTitle($page_name, $title) }}</title>
    @else
        <title>{{ setTitle($page_name) }}</title>
    @endif
    <link rel="icon" type="image/x-icon" href="https://liderazgoefectivo.info/wp-content/uploads/2021/02/cropped-flag1.png"/>
    <link href="{{asset('student/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('student/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('student/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('student/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('student/assets/css/structure.css')}}" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- Styles -->
    @include('inc.student.styles')

</head>

<body class="dashboard-analytics">
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

@include('inc.student.navbar')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    @include('inc.student.sidebar')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @yield('content')

        @if ($page_name != 'account_settings')
            @include('inc.student.footer')
        @endif
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

@include('inc.student.scripts')

</body>
</html>
