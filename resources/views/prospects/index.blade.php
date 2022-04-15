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
                    <div class="breadcrumb-four d-flex align-items-center">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{ url('/') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>
                            </li>
                            <li><a href="javascript:void(0);"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> Prospectos</a></li>
                        </ul>
                        <div class="ml-auto">
                            <a href="{{ route('create-prospect') }}" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>

                    <hr class="mt-3">

                    <div class="widget-one">
                        <h4 class="mb-2">Prospectos</h4>

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
                                <select id="filter-by-event" class="form-control basic select2" style="width: 300px !important;">
                                    <option value="all" selected>Todos</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive mb-4">
                            <livewire:prospects.manage-prospects />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
