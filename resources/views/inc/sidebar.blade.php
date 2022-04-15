@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="profile-info">
                <figure class="user-cover-image"></figure>
                <div class="user-info">
                    @if(auth()->user()->avatar == NULL OR empty(auth()->user()->name))
                        <img src="{{asset('storage/img/user.png')}}" alt="avatar">
                    @else
                        <img src="{{asset('storage/'.auth()->user()->avatar)}}" alt="avatar">
                    @endif
                    <h6 class="">{{ auth()->user()->name }}</h6>
                    <p class="">{{ auth()->user()->title }}</p>
                </div>
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">

                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb' )

                    <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>ADMINISTRACIÓN</span></div>
                    </li>

                    <li class="menu {{ ($category_name === 'courses') ? 'active' : '' }}">
                        <a href="#courses" data-toggle="collapse" aria-expanded="{{ ($category_name === 'courses') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span>Cursos</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'courses') ? 'show' : '' }}" id="courses" data-parent="#courses">
                            <li class="{{ ($page_name === 'add_course') ? 'active' : '' }}">
                                <a href="{{ route('create-course') }}"> Agregar Nuevo </a>
                            </li>
                            <li class="{{ ($page_name === 'manage_courses') ? 'active' : '' }}">
                                <a href="{{ route('courses') }}"> Administrar Cursos  </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'prospects') ? 'active' : '' }}">
                        <a href="#prospects" data-toggle="collapse" aria-expanded="{{ ($category_name === 'prospects') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                <span>Prospectos</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'prospects') ? 'show' : '' }}" id="prospects" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'add_prospect') ? 'active' : '' }}">
                                <a href="{{ route('create-prospect') }}"> Agregar Nuevo </a>
                            </li>
                            <li class="{{ ($page_name === 'manage_prospects') ? 'active' : '' }}">
                                <a href="{{ route('prospects') }}"> Administrar Prospectos  </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu {{ ($category_name === 'events') ? 'active' : '' }}">
                        <a href="#events" data-toggle="collapse" aria-expanded="{{ ($category_name === 'events') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Eventos</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'events') ? 'show' : '' }}" id="events" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'add_event') ? 'active' : '' }}">
                                <a href="{{ route('create-event') }}"> Agregar Nuevo </a>
                            </li>
                            <li class="{{ ($page_name === 'manage_events') ? 'active' : '' }}">
                                <a href="{{ route('events') }}"> Administrar Eventos </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'payments') ? 'active' : '' }}">
                        <a href="/pagos" aria-expanded="{{ ($category_name === 'manage_payments') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <span>Pagos</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'links') ? 'active' : '' }}">
                        <a href="/links" aria-expanded="{{ ($category_name === 'manage_links') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                <span>Links</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>DESARROLLADOR</span></div>
                    </li>

                    <li class="menu {{ ($category_name === 'users') ? 'active' : '' }}">
                        <a href="#users" data-toggle="collapse" aria-expanded="{{ ($category_name === 'users') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Usuarios</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'users') ? 'show' : '' }}" id="users" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'profile') ? 'active' : '' }}">
                                <a href="{{ route('create-user') }}"> Crear nuevo </a>
                            </li>
                            <li class="{{ ($page_name === 'account_settings') ? 'active' : '' }}">
                                <a href="{{ route('users') }}"> Administrar usuarios </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'system-options') ? 'active' : '' }}">
                        <a class="dropdown-toggle" href="{{ route('system-options') }}" aria-expanded="{{ ($category_name === 'system-options') ? 'true' : 'false' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                <span>Configuración</span>
                            </div>
                        </a>
                    </li>
                @else

                @endif
            </ul>
        </nav>
    </div>
    <!--  END SIDEBAR  -->
@endif
