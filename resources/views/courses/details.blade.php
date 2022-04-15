@extends('layouts.app')

@section('content')
    <style>
        .mb-title::after{
            position: absolute;
            content: "";
            height: 2px;
            width: 55px;
            background: #1b55e2;
            border-radius: 50%;
            top: 55px;
            left: 25px;
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
    </style>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="breadcrumb-four">
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
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>                                    Detalles del curso
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <div class="d-flex">
                            <h5 class="mb-title">Detalles del curso</h5>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-4">
                                        <div class="upload">
                                            @if($course->thumbnail)
                                                <img src="{{ asset('storage/'.$course->thumbnail) }}"  class="img-fluid">
                                            @else
                                                <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png"  class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                        <h5 class="text-center" style="color: #1b55e2; font-weight: 600;">{{ $course->title }}</h5>
                                        <span class="course-price mt-4 mb-2">
                                            <span style="font-weight: normal;">Precio: </span>
                                             @if($course->has_a_discount == 1)
                                                {{ $course->discount_price }} USD
                                                <span style="text-decoration: line-through;">
                                                            <span style="font-weight: normal; color: gray;">{{ $course->price }} USD</span>
                                                        </span>
                                            @else
                                                {{ $course->price }} USD
                                            @endif
                                        </span>
                                        <a href="https://cursos.liderazgoefectivo.info/comprar/{{ $course->key_name }}" class="btn btn-primary btn-block mb-4 mr-2" target="_blank">Ir a página de compra</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4 h-100" >
                    <div class="widget-one">
                        <div class="d-flex">
                            <h5 class="mb-title">Contenido del curso</h5>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                        @if(!empty($course->description))
                                            <p><strong>Descripción:</strong>
                                                {!! $course->description !!}
                                            </p>
                                        @endif
                                        <p><strong>Contenido: </strong></p>
                                            @if(count($course->modules) > 0)
                                                <div id="toggleAccordion">
                                                    @foreach($course->modules as $module)
                                                        <div class="card">
                                                        <div class="card-header" id="...">
                                                            <section class="mb-0 mt-0">
                                                                <div role="menu" class="collapsed" data-toggle="collapse" data-target="#module-{{ $module->id }}" aria-expanded="true" aria-controls="module-{{ $module->id }}">
                                                                    {{ $module->title }}  <div class="icons"><svg> ... </svg></div>
                                                                </div>
                                                            </section>
                                                        </div>

                                                        <div id="module-{{ $module->id }}" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                                            <div class="card-body">
                                                                <div id="withoutSpacing" class="no-outer-spacing">
                                                                    @foreach($module->units as $unit)
                                                                        <div class="card">
                                                                            <div class="card-header" id="headingOne2">
                                                                                <section class="mb-0 mt-0">
                                                                                    <div role="menu" class="" data-toggle="collapse" data-target="#withoutSpacingAccordionOne" aria-expanded="false" aria-controls="withoutSpacingAccordionOne">
                                                                                        {{ $unit->title }}  <div class="icons"><svg> ... </svg></div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>

                                                                            <div id="withoutSpacingAccordionOne" class="collapse" aria-labelledby="headingOne2" data-parent="#withoutSpacing">
                                                                                <div class="card-body">
                                                                                    <div class="list-group ">
                                                                                        @foreach($unit->classes as $class)
                                                                                            <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{ $class->title }}</a>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="alert alert-light-warning mb-4" role="alert">
                                                    <strong>Curso sin contenido.</strong> Este curso no cuenta con contenido aún.
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <div class="d-flex">
                            <h5 class="mb-title">Estudiantes</h5>
                            <div class="ml-auto p-2">
                                <a id="enroll-student" href="javascript:void(0);" class="btn btn-primary mb-2" data-toggle="modal" data-target="#enroll-student-modal">Inscribir</a>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    @livewire("courses.manage-course-students", ['course_id' => $course->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Enroll student -->
    <div class="modal fade" id="enroll-student-modal" role="dialog" aria-labelledby="addEnrollStudentModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inscribir al curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("courses.enroll-student", ['course_id' => $course->id])
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="add-enrollment" type="button" class="btn btn-primary">Inscribir</button>
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

        $("#add-enrollment").on("click", function(){
            var block = $("#enroll-student-form");
            $(block).block({
                message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
            $("#enroll-student-modal").find(".enroll-student").click();
        });

        window.addEventListener('hide-enroll-student-modal',function(e){
            $('#select-student').val(null).trigger('change');
            $('#enroll-student-modal').modal('hide');
        });
    </script>
@endpush
