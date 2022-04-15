@if(count($courses) > 0)
    <table id="courses-table" class="table table-hover non-hover" style="width:100%; min-height: 200px;">
        <thead>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Resumen</th>
            <th>Estudiantes</th>
            <th>Estado</th>
            <th>Precio</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($courses as $course)
            <tr data-course="{{ $course->id }}">
                <td><span class="badge badge-info">#{{ $counter }}</span>@php $counter++; @endphp</td>
                <td><strong>{{ $course->title  }}</strong></td>
                <td>{{ $course->category_id }}</td>
                <td>
                    Modulos: {{ count($course->modules) }}<br>
                    @php $qtyUnits = 0; $qtyClasses = 0; @endphp
                    @foreach($course->modules as $module)
                        @php $qtyUnits = $qtyUnits + count($module->units) @endphp
                        @foreach($module->units as $unit)
                            @php $qtyClasses = $qtyClasses + count($unit->classes); @endphp
                        @endforeach
                    @endforeach
                    Unidades: {{ $qtyUnits }}<br>
                    Clases: {{ $qtyClasses }}</td>
                <td>-</td>
                <td>{!! ($course->enabled == 1) ? '<span class="badge badge-success"> Activo </span>' : '<span class="badge badge-danger"> Desactivado </span>' !!}</td>
                <td>
                    @if($course->is_free == 1)
                        <span class="badge badge-warning">Gratis</span>
                    @else
                        @if($course->has_a_discount == 1)
                            <span style="text-decoration: line-through;">{{ (!empty($course->price)) ? $course->price.' USD' : '-' }}</span>
                            <br><strong>{{ (!empty($course->discount_price)) ? $course->discount_price.' USD' : '-' }}</strong>
                        @else
                            <strong>{{ (!empty($course->price)) ? $course->price.' USD' : '-' }}</strong>
                        @endif
                    @endif
                </td>
                <td class="text-center">
                    <div class="dropdown custom-dropdown custom-dropdown-icon" style="width: 30px;">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                            <a class="dropdown-item" href="{{ route('course-details', $course->id) }}">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                Ver detalles
                            </a>
                            <a class="dropdown-item" href="{{ route('update-course', $course->id) }}">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                Editar
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);" wire:click="updateEnabled({{ $course->id }}, {{ ($course->enabled == 1 ) ? 0 : 1 }})">
                                {!! ($course->enabled == 1 )
                                    ? '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg> Desactivar'
                                    : '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Activar'
                                !!}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDelete',{{ $course->id }})">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Eliminar
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-light-warning mb-4" role="alert">
        <strong>No se han creado cursos!</strong> Crea el primer curso dando click en el botón "Agregar", ubicado en la parte superior derecha.
    </div>
@endif

@push('custom-scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
        @this.on('triggerDelete', (courseID) => {
            var $row = $("tr[data-course=" + courseID + "]");

            Swal.fire({
                title: '¿Estás seguro de querer eliminar este curso?',
                text: 'El curso va ser eliminado de forma permanente, para continuar, confirma la acción.',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    var block = $("#courses-table");
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

                    $row.css("background-color", "#e7515a");
                    $row.find("td").css("color", "#fff")

                    // calling destroy method to delete
                    @this.call('delete', courseID)
                }
            });
        })
        })
    </script>
@endpush
