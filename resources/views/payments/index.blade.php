@extends('layouts.app')

@section('content')
    <style>
        .select2-container {
            width: 300px !important;
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
                            <li>
                                <a href="javascript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>                                    Pagos
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr class="mt-3">

                    <div class="widget-one">
                        <h4 class="mb-4">Pagos</h4>

                        <div class="d-flex align-items-center">
                            <div class="w-100">
                                <label for="inputEmail4">Filtrar por nombre</label>
                                <div class="input-group w-100">
                                    <input type="text" name="search-name" class="form-control" placeholder="Filtrar por nombre..." value="">
                                    <div class="input-group-append">
                                        <button id="filter-by-name" class="btn btn-dark" type="button">Buscar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-auto p-2">
                                <label for="inputPassword4">Filtrar por evento</label>
                                <select id="filter-by-course" class="form-control basic select2" style="width: 300px !important;">
                                    <option value="all" selected>Todos</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive mb-4" style="overflow: visible;">
                            <livewire:payments.manage-payments />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Details payment-->
    <div class="modal fade" id="details-payment-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("payments.details-payment")
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script>
        window.addEventListener('open-details-payment-modal',function(e){
            unblockUI("#payments-table");
            $('#details-payment-modal').modal('show');
        });

        window.addEventListener('hide-details-payment-modal',function(e){
            $('#details-payment-modal').modal('hide');
        });

        window.addEventListener('snackbar-success',function(e){
            Snackbar.show(e.detail);
        });
    </script>
@endpush
