<div>
    @if(count($payments))
        <table id="payments-table" class="table table-hover non-hover" style="width:100%;">
        <thead>
            <tr>
                <th>#</th>
                @if($user->role_id != 5) <th>Cliente</th> @endif
                <th>Transacción</th>
                <th>Monto</th>
                <th>Método</th>
                <th>Estado</th>
                <th>Fecha y hora</th>
                <th style="width: 54px;"></th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($payments as $pay)
                <tr data-payment="{{ $pay->id }}">
                    <td><span class="badge badge-info">#{{ $counter }} </span>@php $counter++; @endphp</td>

                    @if($user->role_id != 5)
                        <td><span title="{{ $pay->payer_email }}"><strong>{{ $pay->name }} {{ $pay->lastname }}</strong></span></td>
                    @endif

                    <td>{{ ($pay->transaction_id) ? $pay->transaction_id : "-"  }}</td>
                    <td>
                        @if(!empty($pay->payment_amount_value))
                            <span class="badge outline-badge-dark"> {{ $pay->payment_amount_value }} {{ $pay->payment_currency_code }} </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {!! ($pay->method == 'paypal') ? '<span class="badge badge-primary">Paypal</span>' : '' !!}
                        {!! ($pay->method == 'card') ? '<span class="badge badge-secondary">Tarjeta</span>' : '' !!}
                        {!! ($pay->method == 'stripe') ? '<span class="badge badge-dark">Stripe</span>' : '' !!}
                    </td>
                    <td>
                        @switch($pay->status)
                            @case('COMPLETED')
                                <span class="badge badge-success">Completado</span>
                            @break
                            @case('APPROVED')
                                <span class="badge badge-info">Aprobado</span>
                            @break

                            @case('PENDING')
                                <span class="badge badge-warning">Pendiente</span>
                            @break
                            @default
                                <span class="badge badge-danger">{{ $pay->status }}</span>
                        @endswitch
                    </td>
                    <td>{{ ($pay->payment_create_time) ? $pay->payment_create_time : "-" }}</td> <!-- ->format('d/m/Y') -->
                    <td class="text-center" style="width: 54px;">
                        <div class="dropdown custom-dropdown custom-dropdown-icon">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                                <a class="dropdown-item show-payment-details" href="javascript:void(0);" wire:click="$emit('getDetails', {{ $pay->id }})">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                    Ver detalles
                                </a>
                                @if($user->role_id != 5)
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDelete',{{ $pay->id }})">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        Eliminar
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        @if($payments->hasPages())
            <div class="d-flex">
                <div class=""></div>
                <div class="ml-auto">
                    {{ $payments->links() }}
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-light-warning mb-2 mt-4 loader-element" role="alert">
            <strong>No se encontraron pagos!</strong>
        </div>
    @endif
</div>



@push('custom-scripts')
    <script type="text/javascript">
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $("#filter-by-course").select2();
        $('#filter-by-course').val("all").trigger('change');
        $('#filter-by-course').on('change', function (e) {
            var block = $('#payments-table');
            blockElement(block);
            var data = $(this).select2("val");
            @this.set('filter_course', data);
        });

        $('input[name=search-name]').val("")
        $('#filter-by-name').on('click', function (e) {
            blockElement("#payments-table");

            @this.set('filter_course', '');
            @this.set('search', $("input[name=search-name]").val());
        });

        $('.page-link').on("click", function(){
            blockElement("#payments-table");
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
            @this.on('triggerDelete', (paymentID) => {
                var $row = $("tr[data-payment=" + paymentID + "]");

                Swal.fire({
                    title: '¿Estás seguro de querer eliminar este pago?',
                    text: 'El registro va ser eliminado de forma permanente, para continuar, confirma la acción.',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {

                        var block = $("#payments-table");
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

                        @this.call('delete', paymentID)

                        $row.css("background-color", "#e7515a");
                        $row.find("td").css("color", "#fff")
                    }
                });
            })
        })

        $(".show-payment-details").on("click", function(){
            blockUI("#payments-table");
        });

    </script>
@endpush
