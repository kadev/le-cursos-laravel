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

        .mb-title-2::after{
            top: 35px !important;
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
            width: 200px;
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
                            <li class="active">
                                <a href="{{ route('event-details', $event->id) }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <span class="truncate-text d-inline-block">{{ $event->name }}</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('event-date-prospects', $event_date->id) }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Prospectos: {{ $months[date("n", strtotime($event_date->start_datetime)) - 1] }} {{ date("j, Y", strtotime($event_date->start_datetime)) }}
                                </a>
                            </li>
                            <li>
                                <span href="javscript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>                                    Enviar mensaje
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
                <div class="widget-content-area br-4 h-100">
                    <div class="widget-one">
                        <div class="d-flex mb-3">
                            <h4 class="mb-title">Editar mensaje</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <form id="message-form">
                                    <div class="form-group mb-4">
                                        <label for="input-title-message">Titulo:</label>
                                        <input type="text" class="form-control" id="input-title-message" name="message-title" placeholder="Escribe el titulo del mensaje...">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Mensaje:</label>
                                        <div id="editor-container">

                                        </div>
                                        <input type="hidden" name="message-content" value="">
                                    </div>
                                    <span id="send-message" class="btn btn-primary" data-prospects="{{ count($prospects) }}">Enviar mensaje</span>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="widget-one mt-4">
                        <div class="d-flex mb-3 position-relative">
                            <h4 class="mb-title mb-title-2">Prospectos: <span class="badge outline-badge-info">{{ $months[date("n", strtotime($event_date->start_datetime)) - 1] }} {{ date("j, Y, g:i a", strtotime($event_date->start_datetime)) }}</span></h4>
                        </div>
                        <p>El mensaje será enviado a los siguientes prospectos:</p>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="table-responsive mb-4 mt-2">
                                    <table id="prospects-table" class="multi-table table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>E-mail</th>
                                            <th>País</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @forelse($prospects as $register)
                                            <tr>
                                                <td><span class="badge badge-info">#{{ $i }}</span></td>
                                                <td><strong>{{ $register->name }}</strong></td>
                                                <td>{{ $register->email }}</td>
                                                <td>{{ $register->country }}</td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No se encontró ningún prospecto.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }]
                ]
            },
            placeholder: 'Escribe el mensaje para los prospectos...',
            theme: 'snow'
        });

        $("#send-message").on("click", function(){
            var form = document.querySelector('#message-form');
            var content = document.querySelector('input[name=message-content]');
            content.value = quill.root.innerHTML//JSON.stringify(quill.getContents());
            var prospects = $(this).attr("data-prospects");

            Swal.fire({
                title: 'Confirmar acción',
                text: 'Estas apunto de enviar este mensaje a ' + prospects + ' prospectos, confirma la acción para continuar...',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Enviar mensajes'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route("send-message-prospects") }}',
                        data: { _token: '{{ csrf_token() }}', id: {{ $event_date->id }}, data: $(form).serialize() }
                    })
                        .done(function( data ) {
                            var result = JSON.parse(data);

                            if(result.response == true){
                                swal({ title: 'Mensaje enviado', text: 'Se ha enviado el mensaje a todos los prospectos de forma correcta.', type: 'success' });
                            }else{
                                switch (result.response){
                                    case 'ERROR-DATA':
                                        swal({title: 'Datos incompletos', text: 'Por favor ingresa los campos obligatorios.', type: 'error'});
                                        break;
                                    case 'ERROR-PROSPECTS':
                                        swal({title: 'No se encontraron prospectos', text: 'El evento no tiene prospectos, no se ha enviado ni un mensaje.', type: 'error'});
                                        break;
                                }
                            }
                        });
                } else {

                }
            });

            return false;
        });

    </script>
@endpush


