@extends('layouts.app-student')

@section('content')
    <style>
        .mb-title::after{
            height: 0;
        }

        @media (min-width: 768px) {
            .mb-title::after{
                position: absolute;
                content: "";
                height: 2px;
                width: 55px;
                background: #1b55e2;
                border-radius: 50%;
                top: 35px;
                left: 25px;
            }
        }

        .mb-title{
            font-size: 21px;
            font-weight: 600;
            color: #3b3f5c;
            margin: 6px 0px 0 0
        }
        .contacts-block li {
            margin-bottom: 13px;
            font-weight: 600;
            font-size: 13px;
            overflow: hidden;
        }
        .select2-container--open {
            z-index: 9999999
        }
        .course-price{
            color: #3b3f5c;
            display: block;
            height: 3.25rem;
            border-radius: 0.25rem;
            text-align: center;
            line-height: 3.25rem;
            font-size: .875rem;
            border-radius: 0.25rem;
            border: 2px solid #1b55e2;
            background: #fff;
            font-weight: 700;
        }

         .pdfobject-container { height: 50rem; border: 0.5rem solid rgba(0,0,0,.1); margin-top: 10rem; }

        .list-group-item.active {
            color: #fff !important;
            background-color: #304aca;
            border-color: #304aca;
        }

        .list-group-item.active a {
            color: #fff !important;
        }

        .transactions-list:not(:last-child) {
            margin-bottom: 15px;
        }
        .transactions-list {
            padding: 12px 12px;
            border: 1px dashed #bfc9d4;
            border-radius: 6px;
            -webkit-transition: all 0.1s ease;
            transition: all 0.1s ease;
        }

        .transactions-list .t-item {
            display: flex;
            justify-content: space-between;
        }

        .transactions-list .t-item .t-company-name {
            display: flex;
        }

        .transactions-list .t-item .t-icon {
            margin-right: 12px;
        }

        .transactions-list .t-item .t-icon .icon {
            position: relative;
            display: inline-block;
            padding: 10px;
            background-color: #ffeccb;
            border-radius: 50%;
        }

        .transactions-list .t-item .t-icon .icon svg {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 19px;
            height: 19px;
            color: #e2a03f;
            stroke-width: 2;
        }

        .transactions-list .t-item .t-name {
            align-self: center;
        }

        .transactions-list .t-item .t-name h4 {
            font-size: 15px;
            letter-spacing: 0px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .transactions-list .t-item .t-name .meta-date {
            font-size: 12px;
            margin-bottom: 0;
            font-weight: 600;
            color: #888ea8;
        }

        .transactions-list .t-item .t-rate {
            align-self: center;
        }

        .transactions-list .t-item .t-rate.rate-dec p {
            color: #e7515a;
        }
        .transactions-list .t-item .t-rate p {
            margin-bottom: 0;
            font-size: 13px;
            letter-spacing: 0px;
        }

        .transactions-list .t-item .t-rate svg {
            width: 14px;
            height: 14px;
            vertical-align: baseline;
        }
    </style>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <a href="{{ route('courses') }}" class="btn btn-sm btn-primary d-inline d-sm-none mr-2"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Cursos</a>

                    <div class="breadcrumb-four d-none d-md-block">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{ url('/') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>
                            </li>
                            <li class="active">
                                <a href="{{ route('courses') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                    Cursos
                                </a>
                            </li>
                            <li>
                                <span href="javscript:void(0);">
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                    Detalles
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4" >
                    @if($class != null)
                        <div class="widget-one">
                            <div class="d-flex">
                                <h5 class="mb-title">Clase: {{ ($class != null) ? $class->title : "-" }} </h5>
                            </div>
                        </div>

                        @if($class->type == "pdf" OR $class->type == "vimeo" OR $class->type == "youtube" OR $class->type == "test")
                            @if(!empty($class->url) OR $class->url != NULL)
                                @switch($class->type)
                                    @case("pdf")
                                        <p class="mt-4">{!! $class->description !!}</p>
                                        <div id="pdf-container" class="mt-4"></div>
                                    @break
                                    @case("vimeo") @case("test")
                                        <div id="vimeo-container" class="mt-4">
                                            @if(!empty($class->url) OR $class->url != NULL)
                                                <div style="padding:56.25% 0 0 0;position:relative;">
                                                    <iframe src="{{$class->url}}&byline=0&portrait=0"
                                                            style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                                                    </iframe>
                                                </div>
                                                <script src="https://player.vimeo.com/api/player.js"></script>
                                            @endif
                                            <p class="mt-4">{!! $class->description !!}</p>
                                        </div>
                                    @break
                                    @case("youtube")
                                        <div id="youtube-container" class="mt-4">
                                            @if(!empty($class->url) OR $class->url != NULL)
                                                <div style="padding:56.25% 0 0 0;position:relative;">
                                                    <iframe src="https://www.youtube.com/embed/7lVVU9rSpAs"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            style="position:absolute;top:0;left:0;width:100%;height:100%;" allowfullscreen>

                                                    </iframe>
                                                </div>
                                            @endif
                                            <p class="mt-4">{!! $class->description !!}</p>
                                        </div>
                                    @break
                                @endswitch
                                    <div class="d-flex">
                                        <div>

                                        </div>
                                        <div class="ml-auto">
                                            @livewire('courses.check-class-as-completed', ['class_id' => $class->id])
                                        </div>
                                    </div>
                            @else
                                <div class="jumbotron h-100 mt-4">
                                    <div class="empty-class-container text-center">
                                        <h3>CLASE EN PROCESO</h3>
                                        <img class="img-fluid" style="max-width: 400px; opacity: 0.5;" src="{{ asset("assets/img") }}/empty-class.png">
                                        <p class="text-bold">Al parecer no hemos culminado el contenido de esta clase, ponte en contacto con el Profesor para más información.</p>
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if($class->type == "live")
                            <div class="jumbotron h-100 mt-3 mb-3">
                                <div class="container">
                                    <blockquote class="blockquote media-object">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <p class="d-inline">Esta clase es en vivo, días antes de la fecha de la clase habilitaremos la información para que puedan acceder de forma correcta, les pedimos se mantengan informados.</p>
                                            </div>
                                        </div>
                                        <small class="text-right">Rodolfo Cruz <cite title="Source Title">(Profesor)</cite></small>
                                    </blockquote>
                                    <br>
                                    <h3 class="mb-2 mt-0 text-center">La clase iniciará en:</h3>
                                    <p class="lead mt-3 mb-4"></p>
                                    <br/>


                                    <div id="cd-simple" class="text-center" data-date="@if(!empty($class->live_datetime)) {{ date('Y/m/d G:i:s', strtotime($class->live_datetime)) }} @endif">
                                        <div class="countdown">
                                            <div class="clock-count-container"><h1 class="clock-val">-</h1></div>
                                            <h4 class="clock-text"> Días </h4>
                                        </div>
                                        <div class="countdown">
                                            <div class="clock-count-container"><h1 class="clock-val">-</h1></div>
                                            <h4 class="clock-text"> Horas </h4>
                                        </div>
                                        <div class="countdown">
                                            <div class="clock-count-container"><h1 class="clock-val">-</h1></div>
                                            <h4 class="clock-text"> Minutos </h4>
                                        </div>
                                        <div class="countdown">
                                            <div class="clock-count-container"><h1 class="clock-val">-</h1></div>
                                            <h4 class="clock-text"> Segundos </h4>
                                        </div>
                                    </div>


                                    <p class="lead text-center mt-3">
                                        <a class="btn btn-dark @if(empty($class->url)) disabled @endif" href="{{ route("courses") }}" role="button">Ir a la clase</a>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div>

                                </div>
                                <div class="ml-auto">
                                    @livewire('courses.check-class-as-completed', ['class_id' => $class->id])
                                </div>
                            </div>

                            @if(!empty($class->url))
                                <h5>URL de acceso:</h5>
                                <a href="{{ $class->url }}" target="_blank"> {{ $class->url }}</a>
                            @endif
                            @if(!empty($class->live_instructions))
                                <h5>Instrucciones de acceso: </h5><br>
                                {!! $class->live_instructions  !!}
                            @endif
                        @endif


                        @if(count($class->resources))
                            <div class="widget-one mb-4">
                                <div class="d-flex">
                                    <h5 class="mb-title">Recursos de clase</h5>
                                </div>
                            </div>

                            @foreach($class->resources as $resource)
                                <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon" style="{{ ($resource->type == "link") ? 'background-color: #c2d5ff;' : '' }}">
                                            @if($resource->type == "link")
                                                <svg style="{{ ($resource->type == "link") ? 'color: #1b55e2;' : '' }}" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                            @elseif($resource->type == "file")
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                            @else
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{ $resource->title }}</h4>
                                        <p class="meta-date">
                                            @if($resource->type == "link")
                                                {{ $resource->url }}
                                            @else
                                                @php
                                                    $url = explode("/", $resource->url);
                                                    $filename = end($url);
                                                    $extension = explode(".", $filename);
                                                    $extension = end($extension);
                                                    $extension = strtoupper($extension);
                                                @endphp
                                                Archivo {{ !empty($extension) ? $extension : '...' }}
                                            @endif
                                        </p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    @if($resource->type == "link")
                                        <a href="{{ $resource->url }}" target="_blank"  class="btn btn-sm btn-dark mb-2 mr-2">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>                                        </a>
                                    @else
                                        <a href="{{ asset("storage/".$resource->url) }}" download="{{ str_replace(" ", "-", $resource->title) }}"  class="btn btn-sm btn-dark mb-2 mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                            @endforeach


                        @endif
                    @else
                        <div class="jumbotron h-100">
                            <div class="container">
                                <h2 class="mb-2 mt-0">Bienvenido(a) a <br>{{ $course->title }}</h2>
                                <p class="mt-3 mb-4" style="font-size: 16px;">Navega sobre el contenido de este curso, situado de lado derecho y selecciona la primera clase para iniciar esta aventura.</p>
                                <br/>

                                <p class="lead">
                                    <a class="btn btn-dark" href="{{ route("courses") }}" role="button">Regresar a "Mis Cursos"</a>
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4 h-100" >
                    <div class="widget-one">
                        <div class="d-flex">
                            <h5 class="mb-title">Contenido</h5>
                        </div>

                        @if(!empty($class) OR $class != NULL)
                            @livewire('courses.show-course-content', ['course_id' => $course->id, 'class_id' => $class->id])
                        @else
                            @livewire('courses.show-course-content', ['course_id' => $course->id, 'class_id' => null])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push("custom-scripts")
    <script>
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        @if($class != null AND $class->type == 'pdf')
            PDFObject.embed("{{ $class->url }}", "#pdf-container");
        @endif

        @if($class != null AND $class->type == 'live')
            @if(!empty($class->live_datetime))
                var date = $('#cd-simple').attr("data-date");
                console.log(date);
                $('#cd-simple').countdown(date, function(event) {
                    var $this = $(this).html(event.strftime(''
                        + '<div class="countdown"><div class="clock-count-container"><h1 class="clock-val">%D</h1></div><h4 class="clock-text">Días</h4></div>'
                        + '<div class="countdown"><div class="clock-count-container"><h1 class="clock-val">%H</h1></div><h4 class="clock-text">Horas</h4></div>'
                        + '<div class="countdown"><div class="clock-count-container"><h1 class="clock-val">%M</h1></div><h4 class="clock-text">Minutos</h4></div>'
                        + '<div class="countdown"><div class="clock-count-container"><h1 class="clock-val">%S</h1></div><h4 class="clock-text">Segundos</h4></div>'
                    ));
                });
            @endif
        @endif

    </script>
@endpush
