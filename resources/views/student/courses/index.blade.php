@extends('layouts.app-student')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="breadcrumb-four">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{ url('/') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                    Mis cursos
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr class="mt-3">

                    <div class="">
                        <div class="d-flex">
                            <h4>Mis Cursos</h4>
                        </div>
                        <div class="row mb-4 mt-3" style="overflow: visible;">
                            @if(count($courses) > 0)
                                @foreach($courses as $course)
                                    <div class="col-md-4 mb-3">
                                        <!--<div class="card component-card_2 h-100">
                                            @if(empty($course->thumbnail))
                                                <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png" class="card-img-top" alt="Imagen del curso">
                                            @else
                                                <img src="{{ asset('storage/'.$course->thumbnail) }}" class="card-img-top" alt="Imagen del curso">
                                            @endif
                                            <div class="card-body">
                                                <h6 class="card-title text-center">{{$course->title}}</h6>
                                                <p class="card-text"></p>
                                                <a href="{{ route("see-course", $course->key_name) }}" class="btn btn-sm btn-primary w-100">Ver curso</a>
                                            </div>
                                        </div> -->

                                        <div class="infobox-3">
                                            <div class="info-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                            </div>
                                            <h5 class="info-heading">{{$course->title}}</h5>
                                            <p class="info-text">{{$course->short_description}}</p>
                                            <a class="info-link" href="{{ route("see-course", $course->key_name) }}">Ir al curso <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-light-warning mb-4" role="alert">
                                    <strong>¡No tienes ningún curso con nosotros :(!</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
