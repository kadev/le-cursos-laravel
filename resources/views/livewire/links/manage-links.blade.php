@if(count($links) > 0)
    <table id="links-table" class="table table-hover non-hover" style="width:100%; min-height: 200px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>link interno</th>
        <th>link externo</th>
        <th>Estado</th>
        <th>Creación</th>
        <th style="width: 54px;"></th>
    </tr>
    </thead>
    <tbody>
    @php
        $counter = 1;
    @endphp
    @foreach ($links as $link)
        <tr data-link="{{ $link->id }}">
            <td><span class="badge badge-info">#{{ $counter }}</span> @php $counter++; @endphp</td>
            <td><strong>{{ $link->name  }}</strong></td>
            <td><a href="https://link.liderazgoefectivo.info/{{ $link->key_name }}" target="_blank">https://link.liderazgoefectivo.info/{{ $link->key_name }}</a></td>
            <td><a href="https://{{ $link->link }}" target="_blank">https://{{ $link->link }}</a></td>
            <td>{!! ($link->enabled == 1) ? '<span class="badge badge-success"> Activado </span>' : '<span class="badge badge-danger"> Desactivado </span>' !!}</td>
            <td>{{ $link->created_at->format('d/m/Y') }}</td>
            <td class="text-center" style="width: 54px;">
                <div class="dropdown custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg style="color:white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                        <a class="dropdown-item edit-link" href="javascript:void(0);" wire:click="$emit('editLink', {{ $link->id }})">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            Editar
                        </a>
                        <a class="dropdown-item update-enabled" href="javascript:void(0);" wire:click="updateEnabled({{ $link->id }}, {{ ($link->enabled == 1 ) ? 0 : 1 }})">
                            {!! ($link->enabled == 1 )
                                ? '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg> Desactivar'
                                : '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Activar'
                            !!}
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDelete',{{ $link->id }})">
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
        <strong>No se han creado links!</strong> Crea el primer link dando click en el botón "Agregar", ubicado en la parte superior derecha.
    </div>
@endif

@push('custom-scripts')
    <script type="text/javascript">

        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $(".edit-link, .update-enabled").on("click", function(){
           blockUI("#links-table");
        });

        document.addEventListener('livewire:load', function () {
        @this.on('triggerDelete', (linkId) => {
            Swal.fire({
                title: '¿Estás seguro de querer eliminar este link?',
                text: 'El registro va ser eliminado de forma permanente, para continuar, confirma la acción.',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.value) {
                    blockUI("#links-table");
                    @this.call('delete', linkId)
                }
            });
        })
        })
    </script>
@endpush
