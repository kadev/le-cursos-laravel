@extends('layouts.app')

@section('content')

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
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                    Links
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr class="mt-3">

                    <div class="widget-one">
                        <div class="d-flex">
                            <h4 class="mb-4">Links</h4>
                            <div class="ml-auto p-2">
                                <a id="add-link" href="javascript:void(0);" class="btn btn-primary mb-2" data-toggle="modal"
                                   data-target="#cu-links-modal" wire:click="$emit('changeAction', 'store')">
                                    Agregar
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive mb-4" style="overflow: visible;">
                            <livewire:links.manage-links />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Create/Edit Links -->
    <div class="modal fade" id="cu-links-modal" tabindex="-1" role="dialog" aria-labelledby="createEventDateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire("links.create-update")
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button id="cu-link" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script>
        $("#add-link").on("click", function(){
            window.livewire.emit('changeAction', "store");
        });

        $("#cu-link").on("click", function(){
            blockUI("#create-link-form");
            $("#cu-links-modal").find("#action-cu-link").click();
        });

        $("#add-link").on("click", function(){
           blockUI("#create-link-form");
        });

        window.addEventListener('change-modal-labels',function(e){
            if(e.detail == "store"){
                $("#cu-links-modal").find(".modal-title").text("Agregar Link");
                $("#cu-link").text("Agregar");
            }else if(e.detail == "update"){
                $("#cu-links-modal").find(".modal-title").text("Actualizar Link");
                $("#cu-link").text("Actualizar");
            }
        });

        window.addEventListener('open-cu-links-modal',function(e){
            unblockUI("#links-table");
            $('#cu-links-modal').modal('show');
        });

        window.addEventListener('hide-cu-links-modal',function(e){
            unblockUI("#create-link-form");
            $('#cu-links-modal').modal('hide');
        });

        window.addEventListener('snackbar-success',function(e){
            Snackbar.show(e.detail);
        });
    </script>
@endpush
