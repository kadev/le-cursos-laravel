@extends('layouts.app-student')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-spacing pb-0">
            <div class="col-12">
                <div class="widget-content widget-content-area layout-top-spacing">
                    <a href="{{ route('profile') }}" class="btn btn-sm btn-primary d-inline d-sm-none mr-2"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Mi Perfil</a>

                    <div class="breadcrumb-four d-none d-md-block">
                        <ul class="breadcrumb">
                            <li class="active mb-0"><a href="{{ url('/') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>
                            </li>
                            <li class="active mb-0">
                                <a href="{{ route('profile') }}">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    Mi perfil
                                </a>
                            </li>
                            <li class="mb-0">
                                <span>
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    Editar
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @livewire("users.update-profile")

    </div>

@endsection
