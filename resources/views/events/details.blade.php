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
        .table > tbody > tr > td {
            color: #515365;
        }

        .truncate-text {
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                                <a href="{{ route('events') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    Eventos
                                </a>
                            </li>
                            <li>
                                <span href="javscript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <span class="truncate-text d-inline-block">{{ $event->name }}</span>
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
                            <h4 class="mb-title">Información del evento</h4>
                        </div>

                        <div class="row my-4">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-4">
                                        <div class="upload">
                                            @if($event->image)
                                                <img src="{{ asset('storage/'.$event->image) }}"  class="img-thumbnail">
                                            @else
                                                <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png"  class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-4" style="border: 1px solid #dee2e6;">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <h5 class="text-center" style="color: #1b55e2; font-weight: 600;">{{ $event->name }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tipo:</strong> {{ ucfirst($event->type) }}</td>
                                                    <td><strong>Lugar:</strong> {{ ucfirst($event->place) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cupo:</strong> {!! (!empty($event->maximum_people)) ? $event->maximum_people.',' : '<span class="badge outline-badge-warning">Ilimitado</span>' !!}</td>
                                                    <td><strong>Precio:</strong> {!! (!empty($event->price) AND $event->is_free == 1) ? $event->price : '<span class="badge outline-badge-info">Gratuito</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><strong>Descripción:</strong> {{ $event->description }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <a href="https://registro.liderazgoefectivo.info/{{ $event->key_name }}" class="btn btn-primary btn-block mb-0 mr-2" target="_blank">Ir a página de registro</a>
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
                            <h5 class="mb-title">Fechas del evento</h5>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                        @livewire("events.manage-event-dates", ['event_id' => $event->id])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Event Date -->
    <div class="modal fade" id="create-event-date-modal" tabindex="-1" role="dialog" aria-labelledby="createEventDateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar fecha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("events.create-update-event-dates", ['event_id' => $event->id])
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="create-date" type="button" class="btn btn-primary">Agregar</button>
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

        $(".event-datepicker").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $("#create-date").on("click", function(){
            $("#create-event-date-modal").find(".store-date").click();
        });

        window.addEventListener('hide-create-date-modal',function(e){
            $('#create-event-date-modal').modal('hide');
        });

    </script>
@endpush


