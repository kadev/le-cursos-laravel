<table id="manage-course-students-table" class="multi-table table" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>E-mail</th>
        <th>Fecha Inscripción</th>
        <th>Progreso</th>
        <th>Estado</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($students as $student)
        <tr data-enrollment="{{ $student->id }}">
            <td><span class="badge badge-info">#{{ $i }}</span></td>
            <td><span class="badge outline-badge-info">{{ $student->user->name }}</span></td>
            <td>{{ $student->user->email  }}</td>
            <td>{{ $months[date("n", strtotime($student->created_at)) - 1] }} {{ date("j, Y, g:i a", strtotime($student->created_at)) }}</td>
            <td>
                <div class="progress br-30" style="height: 12px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">80%</div>
                </div>
            </td>
            <td><span class="badge {{ ($student->active == 1) ? 'badge-success' : 'badge-danger'  }}">{{ ($student->active == 1) ? 'Activo' : 'Suspendido'  }}</span></td>
            <td class="text-center">
                <div class="dropdown custom-dropdown custom-dropdown-icon" style="width: 30px;">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerChangeStatusInscription', {{ $student->id }}, {{$student->active}}, '{{$student->user->name}}')">
                            @if($student->active == 1)
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                Suspender inscripción
                            @else
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                Activar inscripción
                            @endif
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDeleteInscription',{{ $student->id }}, '{{$student->user->name}}')">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            Eliminar inscripción
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @php $i++; @endphp
    @empty
        <tr>
            <td colspan="5" class="text-center">No estudiantes inscritos</td>
        </tr>
    @endforelse
    </tbody>
</table>

@push('custom-scripts')
    <script type="text/javascript">

        document.addEventListener('livewire:load', function () {
        @this.on('triggerChangeStatusInscription', (enrollmentID, active, name) => {
            if(active == 1){
                var value=0;
                var action = "suspender";
                var text = "La inscripción va ser suspendida, para continuar, confirma la acción."
            }else{
                var value=1;
                var action = "activar";
                var text = "La inscripción va ser activada, para continuar, confirma la acción."
            }

            Swal.fire({
                title: '¿Estás seguro de querer '+action+' la inscripción para '+name+'?',
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonText: action.charAt(0).toUpperCase() + action.slice(1)
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    var block = $("#manage-course-students-table");
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

                    @this.call('changeActive', enrollmentID, value)
                } else {
                }
            });
        })
        })

        document.addEventListener('livewire:load', function () {
        @this.on('triggerDeleteInscription', (enrollmentID, name) => {
            var $row = $("tr[data-enrollment=" + enrollmentID + "]");

            Swal.fire({
                title: '¿Estás seguro de querer eliminar la inscripción para '+name+'?',
                text: 'La inscripción va ser eliminada de forma permanente, para continuar, confirma la acción.',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    var block = $("#manage-course-students-table");
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

                    @this.call('delete', enrollmentID)
                } else {

                }
            });
        })
        })
    </script>
@endpush

