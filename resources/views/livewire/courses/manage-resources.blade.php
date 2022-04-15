<table id="manage-class-resources-table" class="multi-table table mb-5" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Título</th>
        <th>Tipo</th>
        <th>URL</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($resources as $resource)
        <tr data-resource="{{ $resource->id }}">
            <td><span class="badge badge-info">#{{ $i }}</span></td>
            <td>{{ $resource->title }}</td>
            <td>{{ ($resource->type == "link") ? 'Link' : 'Archivo' }}</td>
            <td>
                @if($resource->type == "link")
                <a href="{{ $resource->url }}" target="_blank">
                    {{ $resource->url }}
                </a>
                @else
                    <a href="{{ asset('storage/'.$resource->url) }}" target="_blank">
                        {{ asset('storage/'.$resource->url) }}
                    </a>

                @endif
            </td>
            <td class="text-center">
                <div class="dropdown custom-dropdown custom-dropdown-icon m-auto" style="width: 30px;">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDeleteResource',{{ $resource->id }}, '{{$resource->title}}')">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            Eliminar recurso
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @php $i++; @endphp
    @empty
        <tr>
            <td colspan="5" class="text-center">
                <div class="jumbotron pt-3 pb-3">
                    <div class="alert alert-light-warning mb-0" role="alert" style="text-align: left !important;">
                        <strong>No se encontraron recursos</strong><br>
                        Esta clase no cuenta con recursos, para crear uno da click en "Crear nuevo".
                    </div>
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@push('custom-scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            @this.on('triggerDeleteResource', (resourceID, title) => {
                var $row = $("tr[data-resource=" + resourceID + "]");

                Swal.fire({
                    title: '¿Estás seguro de querer eliminar el recurso: '+title+'?',
                    text: 'El recurso va ser eliminado de forma permanente, para continuar, confirma la acción.',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        var block = $("#manage-class-resources-table");
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

                        @this.call('delete', resourceID)
                    } else {

                    }
                });
            })
        })
    </script>
@endpush

