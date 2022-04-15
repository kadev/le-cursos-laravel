<table id="dates-table" class="multi-table table" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Inicio</th>
        <th>Termina</th>
        <th>Prospectos</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($event_dates as $eventDate)
        <tr>
            <td><span class="badge badge-info">#{{ $i }}</span></td>
            <td><span class="badge outline-badge-info">{{ $months[date("n", strtotime($eventDate->start_datetime)) - 1] }} {{ date("j, Y, g:i a", strtotime($eventDate->start_datetime)) }}</span></td>
            <td><span class="badge outline-badge-info">{{ $months[date("n", strtotime($eventDate->end_datetime)) - 1] }} {{ date("j, Y, g:i a", strtotime($eventDate->end_datetime)) }}</span></td>
            <td><span class="badge badge-success">{{ count($eventDate->EventRegistration) }}</span></td>
            <td class="text-center">
                <div class="dropdown custom-dropdown custom-dropdown-icon" style="width: 30px;">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                        <a class="dropdown-item" href="{{ route('event-date-prospects', $eventDate->id) }}">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Ver prospectos
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDeleteDate',{{ $eventDate->id }})">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            Eliminar
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @php $i++; @endphp
    @empty
        <tr>
            <td colspan="5" class="text-center">No hay fechas disponibles</td>
        </tr>
    @endforelse
    </tbody>
</table>

@push('custom-scripts')
    <script type="text/javascript">

        document.addEventListener('livewire:load', function () {
            @this.on('triggerDeleteDate', (eventID) => {
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar esta fecha?',
                    text: 'La fecha va ser eliminada de forma permanente, para continuar, confirma la acción.',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                    @this.call('delete', eventID)
                        // success response
                        responseAlert({title: session('message'), type: 'success'});

                    } else {
                        responseAlert({
                            title: 'Operation Cancelled!',
                            type: 'success'
                        });
                    }
                });
            })
        })
    </script>
@endpush

