@extends('layouts.app')

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
                            <li class="active">
                                <a href="{{ route('courses') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                    Cursos
                                </a>
                            </li>
                            <li>
                                <span href="javscript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    Editar curso
                                </span>
                            </li>
                        </ul>
                    </div>

                    <hr class="mt-3">

                    <div class="widget-one">
                        <h4>Editar curso</h4>

                        @livewire("courses.create-update", ['activity' => 'update', 'course_id' => $course_id])

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Course Module -->
    <div class="modal fade" id="create-course-module-modal" tabindex="-1" role="dialog" aria-labelledby="createEventDateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar modulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("courses.create-update-modules", ['course_id' => $course_id])
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="create-course-module" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Module Unit -->
    <div class="modal fade" id="create-module-unit-modal" tabindex="-1" role="dialog" aria-labelledby="createEventDateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar unidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("courses.create-update-units", ['course_id' => $course_id])
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="create-module-unit" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Unit Class -->
    <div class="modal fade" id="create-unit-class-modal" tabindex="-1" role="dialog" aria-labelledby="createEventDateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("courses.create-classes", ['course_id' => $course_id])
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="create-unit-class" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script>
        window.addEventListener('snackbar-success',function(e){
            Snackbar.show(e.detail);
        });

        $("#create-course-module").on("click", function(){
            $("#create-course-module-modal").find(".store-module").click();
        });

        $("#create-module-unit").on("click", function(){
            $("#create-module-unit-modal").find(".store-unit").click();
        });

        $("#create-unit-class").on("click", function(){
            $("#create-unit-class-modal").find(".store-class").click();
        });

        window.addEventListener('open-course-module-modal',function(e){
            $('#create-course-module-modal').modal('show');
        });

        window.addEventListener('open-module-unit-modal',function(e){
            $('#create-module-unit-modal').modal('show');
        });

        window.addEventListener('open-unit-class-modal',function(e){
            $('#create-unit-class-modal').modal('show');
        });

        window.addEventListener('hide-course-module-modal',function(e){
            $('#create-course-module-modal').modal('hide');
        });

        window.addEventListener('hide-module-unit-modal',function(e){
            $('#create-module-unit-modal').modal('hide');
        });

        window.addEventListener('hide-unit-class-modal',function(e){
            $('#create-unit-class-modal').modal('hide');
        });

    </script>
@endpush
