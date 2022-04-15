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
                            <li class="active">
                                <a href="{{ route('users') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Usuarios
                                </a>
                            </li>
                            <li>
                                <span href="javscript:void(0);">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="orange" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    Editar contraseña
                                </span>
                            </li>
                        </ul>
                    </div>

                    <hr class="mt-3">
                    <div class="widget-one">
                        <h4>Editar contraseña</h4>
                        <ul class="list-group list-group-media mt-3">
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="mr-3">
                                        @if($user->avatar == null OR empty($user->avatar))
                                            <img class="img-fluid rounded-circle" src="{{asset('storage/img/user.png')}}" alt="avatar" width="80">
                                        @else
                                            <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $profile->avatar) }}" alt="avatar"  width="80">
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <h6 class="tx-inverse">{{ $user->name }}</h6>
                                        @if(!empty($user->title))
                                            <p class="mg-b-0 mb-1"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> {{ $user->title }}</p>
                                        @endif
                                        <p class="mg-b-0"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @livewire("users.create-update", ['activity' => 'change-password', 'user_id' => $user->id])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
