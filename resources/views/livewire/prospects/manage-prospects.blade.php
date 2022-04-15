<div>
    @if(count($prospects))
        <table id="prospects-table" class="table table-hover non-hover loader-element" style="width:100% !important;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Evento</th>
                    <th>Edad</th>
                    <th>País</th>
                    <th>Creado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @php $counter = 1; @endphp
            @foreach ($prospects as $prospect)
                <tr data-prospect="{{ $prospect->id }}">
                    <td><a href="{{ route('update-prospect', $prospect->id) }}"><span class="badge badge-info">#{{ $counter }} </span></a>@php $counter++; @endphp</td>
                    <td><a href="{{ route('update-prospect', $prospect->id) }}"><strong>{{ $prospect->name  }}</strong></a></td>
                    <td>
                        @if($prospect->event != NULL)
                            {{ $prospect->event->name }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $prospect->age }}</td>
                    <td>{{ $prospect->country }}</td>
                    <td>{{ $prospect->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="dropdown custom-dropdown custom-dropdown-icon" style="width: 30px;">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                                <a class="dropdown-item" href="{{ route('update-prospect', $prospect->id) }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>                            Editar
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDelete',{{ $prospect->id }})">
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

        @if($prospects->hasPages())
            <div class="d-flex">
                <div class=""></div>
                <div class="ml-auto">
                    {{ $prospects->links() }}
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-light-warning mb-2 mt-4 loader-element" role="alert">
            <strong>No se encontraron prospectos!</strong>
        </div>
    @endif
</div>

@push('custom-scripts')
    <script type="text/javascript">
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $("#filter-by-event").select2();
        $('#filter-by-event').val("all").trigger('change');
        $('#filter-by-event').on('change', function (e) {
            blockElement(".loader-element");

            var data = $(this).select2("val");
            @this.set('filter_event', data);
        });

        $('input[name=search-name]').val("")
        $('#filter-by-name').on('click', function (e) {
            blockElement(".loader-element");

            @this.set('search', $("input[name=search-name]").val());
        });

        $('.page-link').on("click", function(){
           blockElement(".loader-element");
        });

        function blockElement(element){
            $(element).block({
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
        }

        document.addEventListener('livewire:load', function () {
            @this.on('triggerDelete', (prospectID) => {
                var $this = $(this);
                var $row = $("tr[data-prospect=" + prospectID + "]");

                Swal.fire({
                    title: '¿Estás seguro de querer eliminar este registro?',
                    text: 'El registro va ser eliminado de forma permanente, para continuar, confirma la acción.',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete

                        var block = $("#prospects-table");
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

                        @this.call('delete', prospectID)
                    }
                });
            })
        })
    </script>
@endpush
