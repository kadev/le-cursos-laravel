<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Registro - Cursos Liderazgo Efectivo</title>
    <link rel="icon" type="image/x-icon" href="https://liderazgoefectivo.info/wp-content/uploads/2021/02/cropped-flag1.png"/>
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css') }}">

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc6jE0aAAAAAMmGm4ESh6pVehuhTXQD9HZIH5WX"></script>
</head>
<body class="dashboard-analytics">

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm" style="padding: 0 0 0 20px;">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo" style="margin-left: 25px; margin-right: 65px;">
                <a href="index.html">
                    <!-- <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">-->
                    <h2 class="text-white">Liderazgo Efectivo</h2>
                </a>
            </li>
        </ul>

        <a style="display:none;" href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
    </header>
</div>
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content" style="background-image: url('{{ asset('assets/img/registro-bg.jpg') }}'); margin-left: 0 !important;">
        <style>
            .flexslider-overlay {
                background-color: rgba(31, 39, 50, 0.5);
                bottom: 0;
                content: "";
                display: block;
                height: 100%;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
                z-index: 3;
            }

            #validate-form, #sending-form {
                width: 100%;
            }
        </style>
        <span class="flexslider-overlay"></span>
        <div class="layout-px-spacing">

            <div class="row">
                <div id="flStackForm" class="col-lg-6 offset-lg-6 col-md-8 offset-md-2 col-sm-12 layout-spacing layout-top-spacing" style="z-index: 6;">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header" style="padding-left: 20px;">
                            <div class="page-header">
                                <div class="page-title">
                                    <h3>Registro</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="register-form" action="javascript:void(0);" novalidate>
                                <input type="hidden" name="event-name" value="">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="fullname">Nombre Completo <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu nombre completo.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="age">Edad <span class="red">*</span></label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu edad.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="occupation">Ocupación</label>
                                        <input type="text" class="form-control" id="occupation" name="employment" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="email">Correo electrónico <span class="red">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@liderazgoefectivo.info" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu correo electrónico.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telephone">Teléfono</label>
                                        <input type="tel" class="form-control" id="telephone" name="cellphone" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="city">Ciudad <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu ciudad.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state">Estado / Región <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="state" name="state" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu estado o región.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="country">País <span class="red">*</span></label>
                                        <select id="country" name="country" class="form-control" required>
                                            <option selected value="">Elegir uno...</option>
                                            <option value="México">México</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa tu país.
                                        </div>                                        </div>
                                </div>
                                <span id="validate-form" class="btn btn-primary btn-lg mt-2">Registrarme</span>
                                <span id="sending-form" class="btn btn-primary btn-lg mb-3 mr-3 disabled" style="display: none;">
									<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width: 1rem; height: 1rem;"></div>
									Registrando...</span>
                                <input type="submit" class="d-none"> <!-- Clava secreta: 6Lc6jE0aAAAAAPspDqmy_mPcdc_WUe8j-aOly3F2 -->
                            </form>

                            <div id="result-message-container" class="text-center mt-5" style="display: none;">
                                <img width="100px" data-type="success" src="assets/img/success.png" alt="Registro éxitoso">
                                <img  width="100px" data-type="error" src="assets/img/error.png" alt="Error en el registro" style="display:none;">
                                <h3 class="title mt-4"></h3>
                                <p class="content mt-4"></p>
                            </div>

                            <div class="footer-wrapper">
                                <div class="footer-section f-section-1 w-100">
                                    <br><br><p class="w-100 text-center">© <a target="_blank" href="https://liderazgoefectivo.info">Liderazgo Efectivo</a> 2021. All rights reserved | Desarrollado por: <a target="_blank" href="https://creartiklabs.com">Creartik Labs</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--  END CONTENT AREA  -->


</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
