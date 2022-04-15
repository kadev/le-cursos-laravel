<!DOCTYPE html>
<html><head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="{{ $course->meta_keywords }}"/>
    <meta name="description" content="{{ (empty($course->meta_description)) ? Str::limit($course->short_description, 156) : $course->meta_description }}"/>

    <meta property="og:type" content="product.item" />
    <meta property="og:title" content="{{ $course->title }}" />
    <meta property="og:description" content="{{ (empty($course->meta_description)) ? Str::limit($course->short_description, 156) : $course->meta_description }}" />
    @if(!empty($course->thumbnail) AND $course->thumbnail != NULL)
        <meta name="image" property="og:image" content="{{ asset('storage').'/'.$course->thumbnail }}" />
    @else
        <meta name="image" property="og:image" content="https://i2.wp.com/liderazgoefectivo.info/wp-content/uploads/2021/02/temp-logo-liderazgoefectivo.jpg" />
    @endif
    <meta property="og:url" content="https://cursos.liderazgoefectivo.info/comprar/{{ $course->key_name }}" />
    <meta property="og:site_name" content="Liderazgo Efectivo" />
    <meta name="author" content="Liderazgo Efectivo By Rodolfo Cruz" />

    <!-- Site Properties -->
    <title>{{ $course->title }} - Liderazgo Efectivo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic-UI/semantic.css') }}">

    <style type="text/css">

        .hidden.menu {
            display: none;
        }

        .masthead.segment, .overlay {
            min-height: 700px;
        }
        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            padding-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 4em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: relative;
            width: 100%;
            height: 100%;
            display: block;
        }

        .statistic > .value {
            color: #FF851B !important;
        }

        .statistic > .label {
            color: #767676 !important;
        }

        .error{
            color: #9f3a50;
        }

        .ligth-gray-text {
            color: lightgrey;
        }

        .error-text {
            color: #DB2828;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment, .overlay {
                min-height: 400px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 0em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }

            .statistic {
                margin: 0 1em 0.5em !important;
            }

            .statistic > .value span {
                font-size: 24px !important;
            }

            .statistic > .label {
                font-size: 12px !important;
            }
        }


    </style>

    @livewireStyles

    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('semantic-UI/semantic.js') }}"></script>

    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item')
                ;

            })
        ;
    </script>
</head>
<body class="pushable">

<!-- Page Contents -->
<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment"
         style="
             background-image:
                @if(empty($course->page_cover))
                    url('{{ asset('assets/img/ceo-giving-presentation-corporate-team-meeting-concept.jpg') }}');
                @else
                    url('{{ Storage::url($course->page_cover) }}');
                @endif
             background-attachment: fixed; background-size: 1903px 1250.4px; background-position: 50% -176.008px; padding: 0;
             ">
        <div class="overlay">
            <div class="ui container">

            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">
                    {{ $course->title }}
                </h1>

                <h2></h2>
                <br>
                <a href="#buy-form" class="ui labeled icon huge button change-step" data-step="2" style="color: white; background-color: {{ (empty($course->page_main_color)) ? '#F2711C' : $course->page_main_color }}">
                    <i class="cart arrow down icon"></i>
                    Agregar al carrito
                </a>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="six wide column">
                    @if(!empty($course->thumbnail) AND $course->thumbnail != NULL)
                        <img src="{{ asset('storage').'/'.$course->thumbnail }}" class="ui large bordered rounded image">
                    @else
                        <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png" class="ui large bordered rounded image">
                    @endif
                </div>
                <div class="eight wide right floated column">
                    <h3 class="ui header">Información del curso</h3>
                    <p><strong>Título:</strong> {{ $course->title }}</p>
                    <p><strong>Descripción:</strong> {{ $course->short_description }}</p>
                    @if(!empty($course->overview_url))
                    <p><strong>Vídeo del curso:</strong> <a href="{{ $course->overview_url }}" target="_blank">Ver vídeo</a></p>
                    @endif
                    @if($course->is_free == 1)
                        <p><strong>Precio:</strong> Gratuito</p>
                    @else
                        @if($course->has_a_discount == 1)
                            <h2>
                                {{ $course->discount_price }} USD
                                <span style="text-decoration: line-through;">
                                    <span style="font-weight: normal; color: gray;">{{ $course->price }} USD</span>
                                </span>
                                <a style="margin-left: 25px;" class="ui green tag label">{{ 100 - round((($course->discount_price/$course->price)*100), 2) }}% OFF</a>
                            </h2>
                        @else
                            <h2>{{ $course->price }} USD</h2>
                        @endif
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="center aligned column">
                    <a href="#buy-form" class="ui labeled icon big button change-step" data-step="2" style="color: white; background-color: {{ (empty($course->page_main_color)) ? '#F2711C' : $course->page_main_color }}">
                        <i class="cart arrow down icon"></i>
                        Agregar al carrito
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div id="buy-form" class="ui text container">
            <h3 class="ui header">Comprar Curso</h3>
            @if($course->enabled == 1)
                <p class="success-hidden">Completa el siguiente proceso para adquirir nuestro curso: <strong>{{ $course->title }}.</strong></p>
                <div class="ui three steps success-hidden">
                    <div class="active step" data-step="1">
                        <i class="cart arrow down icon"></i>
                        <div class="content">
                            <div class="title">Agregar producto</div>
                        </div>
                    </div>
                    <div class="step disabled" data-step="2">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="title">Información del cliente</div>
                        </div>
                    </div>
                    <div class="step disabled" data-step="3">
                        <i class="payment icon"></i>
                        <div class="content">
                            <div class="title">Pagar</div>
                        </div>
                    </div>
                </div>

                <div class="step-container success-hidden" data-step="1">
                    <div class="ui items" style="margin-top: 30px !important;">
                        <div class="item">
                            <div class="ui small image">
                                @if(!empty($course->thumbnail) AND $course->thumbnail != NULL)
                                    <img src="{{ asset('storage').'/'.$course->thumbnail }}">
                                @else
                                    <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png">
                                @endif
                            </div>
                            <div class="content">
                                <div class="header">{{ $course->title }}</div>
                                <div class="meta">
                                    @if($course->has_a_discount)
                                        <span class="price"><strong>{{ $course->discount_price }} <small>USD</small></strong></span>
                                        <span class="price" style="text-decoration: line-through;">{{ $course->price }} <small>USD</small></span>
                                    @else
                                        <span class="price">{{ $course->price }} <small>USD</small></span>
                                    @endif
                                    <span class="stay" style="color: {{ empty($course->page_main_color) ? '#FF851B' : $course->page_main_color }};">¡Acceso de por vida!</span>
                                </div>
                                <div class="description">
                                    <p style="font-size: 16px;">{{ $course->short_description }}</p>
                                </div>
                                <div class="extra">
                                    <div class="ui mini left floated button change-step" data-step="2" style="color: white; background-color: {{ (empty($course->page_main_color)) ? '#F2711C' : $course->page_main_color }}">
                                        <i class="cart arrow down icon"></i>
                                        Agregar al carrito
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-container success-hidden" data-step="2" style="display:none;">
                    <div class="ui icon positive message">
                        <i class="cart plus icon"></i>
                        <div class="content">
                            <div class="header">
                                Producto agregado con éxito
                            </div>
                            <p style="font-size: 1em;">Completa el formulario para procesar tu compra.</p>
                        </div>
                    </div>
                    @livewire("courses.register", ['courseID' => $course->id])
                    <h4 class="ui dividing header">Resumen de compra</h4>

                    <div class="ui items">
                        <div class="item">
                            <div class="ui small image">
                                @if(!empty($course->thumbnail) AND $course->thumbnail != NULL)
                                    <img src="{{ asset('storage').'/'.$course->thumbnail }}">
                                @else
                                    <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png">
                                @endif
                            </div>
                            <div class="content">
                                <div class="header">{{ $course->title }}</div>
                                <div class="meta">
                                    @if($course->has_a_discount)
                                        <span class="price"><strong>{{ $course->discount_price }} <small>USD</small></strong></span>
                                        <span class="price" style="text-decoration: line-through;">{{ $course->price }} <small>USD</small></span>
                                    @else
                                        <span class="price">{{ $course->price }} <small>USD</small></span>
                                    @endif
                                    <span class="stay" style="color: {{ empty($course->page_main_color) ? '#FF851B' : $course->page_main_color }};">¡Acceso de por vida!</span>
                                </div>
                                <div class="description">
                                    <p style="font-size: 16px;">{{ $course->short_description }}</p>
                                </div>
                                <div class="extra">
                                    <div class="ui mini left floated negative button change-step" data-step="1">
                                        <i class="trash alternate outline icon"></i>
                                        Eliminar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui placeholder segment" style="min-height: 10rem;">
                        <div class="ui grid">
                            <div class="three wide column">
                            </div>
                            <div class="thirteen wide column" style="text-align: right;">
                                @if($course->has_a_discount == 1)
                                    <p style="margin: 0;"><small>Subtotal: <span><?php echo $course->price; ?> USD</small></span></p>
                                    <p style="margin: 0;">
                                        <small>
                                            Descuento:
                                            <span>
                                                - <?php echo ($course->price - $course->discount_price); ?> USD
                                                <i>({{ 100 - round((($course->discount_price/$course->price)*100), 2) }}% OFF)</i>
                                            </span>
                                        </small>
                                    </p>
                                    <h2 style="margin: 5px 0;"><strong>TOTAL: <span><?php echo $course->discount_price; ?> USD</span></strong></h2>
                                @else
                                    <h2 style="margin: 5px 0;"><strong>TOTAL: <span><?php echo $course->price; ?> USD</span></strong></h2>
                                @endif

                                <p><small><i>*Paga solo una vez, y ten acceso de por vida.</i></small></p>
                            </div>
                        </div>
                    </div>

                    <div id="go-to-pay" class="ui button huge" tabindex="0" style="width: 100%; color: white; background-color: {{ (empty($course->page_main_color)) ? '#F2711C' : $course->page_main_color }}">Pagar</div><br><br><br>
                </div>

                <div class="step-container hidden success-hidden" data-step="3" style="display: none;">
                    <div class="ui positive message">
                        <div class="header">
                            Seleccina el método de pago
                        </div>
                        <p style="font-size: 1em;">Estás a un solo paso de ser parte de nuestra gran comunidad. Selecciona tu método de pago y lleva tu liderazgo al siguiente nivel.</p>
                    </div>

                    <h4 class="ui dividing header">Resumen de compra</h4>
                    <div class="ui items">
                        <div class="item">
                            <div class="ui small image">
                                @if(!empty($course->thumbnail) AND $course->thumbnail != NULL)
                                    <img src="{{ asset('storage').'/'.$course->thumbnail }}">
                                @else
                                    <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png">
                                @endif
                            </div>
                            <div class="content">
                                <div class="header">{{ $course->title }}</div>
                                <div class="meta">
                                    @if($course->has_a_discount)
                                        <span class="price"><strong>{{ $course->discount_price }} <small>USD</small></strong></span>
                                        <span class="price" style="text-decoration: line-through;">{{ $course->price }} <small>USD</small></span>
                                    @else
                                        <span class="price">{{ $course->price }} <small>USD</small></span>
                                    @endif
                                    <span class="stay" style="color: {{ empty($course->page_main_color) ? '#FF851B' : $course->page_main_color }};">¡Acceso de por vida!</span>
                                </div>
                                <div class="description">
                                    <p style="font-size: 16px;">{{ $course->short_description }}</p>
                                </div>
                                <div class="extra">
                                    <div class="ui mini left floated negative button change-step" data-step="1">
                                        <i class="trash alternate outline icon"></i>
                                        Eliminar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui placeholder segment" style="min-height: 10rem;">
                        <div class="ui grid">
                            <div class="three wide column">
                            </div>
                            <div class="thirteen wide column" style="text-align: right;">
                                @if($course->has_a_discount == 1)
                                    <p style="margin: 0;"><small>Subtotal: <span><?php echo $course->price; ?> USD</small></span></p>
                                    <p style="margin: 0;">
                                        <small>
                                            Descuento:
                                            <span>
                                                - <?php echo ($course->price - $course->discount_price); ?> USD
                                                <i>({{ 100 - round((($course->discount_price/$course->price)*100), 2) }}% OFF)</i>
                                            </span>
                                        </small>
                                    </p>
                                    <h2 style="margin: 5px 0;"><strong>TOTAL: <span><?php echo $course->discount_price; ?> USD</span></strong></h2>
                                @else
                                    <h2 style="margin: 5px 0;"><strong>TOTAL: <span><?php echo $course->price; ?> USD</span></strong></h2>
                                @endif

                                <p><small><i>*Paga solo una vez, y ten acceso de por vida.</i></small></p>
                            </div>
                        </div>
                    </div>

                    <div id="paypal-button-container"></div>
                </div>
            @else
                <div class="ui warning message">
                    <div class="header">
                        Curso no disponible
                    </div>
                    Por el momento este curso no está disponible, contactanos al siguiente correo para futuras inscripciones: <a href="mailto:soporte@liderazgoefectivo.info">soporte@liderazgoefectivo.info</a>
                </div>
            @endif

            <div class="ui placeholder segment success-display" style="display: none;">
                <div class="ui icon header">
                    <i class="check circle outline green icon"></i>
                    ¡Gracias por adquirir nuestro curso!
                    <p style="font-size: 1rem; margin-top: 15px; font-weight: 500;">Bienvenido a nuestra tribu: <strong>Liderazgo Efectivo</strong>, te hemos envíado los detalles del curso al correo que nos proporcionaste. (Verifica tu bandeja de SPAM)</p>
                </div>
                <!--<a href="https://cursos.liderazgoefectivo.info" class="ui green button">Ir a cursos</a>-->
            </div>
        </div>
    </div>
    <div class="ui vertical stripe segment">
        <div class="ui text container">
            <div class="ui warning message">
            <div class="header">
                Si tienes alguna duda y/o problema, no dudes en contactarnos:
            </div>
                Correo electrónico: <a href="mailto:servicio@liderazgoefectivo.info">servicio@liderazgoefectivo.info</a><br>
                Teléfono: +52 998 135 4031 <i class="mexico flag"></i>
        </div>
        </div>
    </div>
    <div class="ui  vertical footer segment">
        <div class="ui center aligned container">
            <div class="ui section divider"></div>
            <img src="https://i2.wp.com/liderazgoefectivo.info/wp-content/uploads/2021/02/temp-logo-liderazgoefectivo.jpg?w=770&ssl=1" class="ui centered mini image">
            <div class="ui horizontal small divided link list">
                <a class="item" target="_blank" href="https://liderazgoefectivo.info">Liderazgo Efectivo</a>  <span class="item">2021. All rights reserved. Desarrollado por: </span> <a class="item" target="_blank" href="https://creartiklabs.com">Creartik Labs</a>
            </div>
        </div>
    </div>
</div>


<script
    src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}">
</script>

@livewireScripts

<script>
    $( document ).ready(function() {
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "Curso: {{ $course->title }}",
                        amount: {
                            currency_code: "USD",
                            value: '{{ ($course->has_a_discount == 1) ? $course->discount_price : $course->price }}'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {

                return actions.order.capture().then(function(details) {

                    console.log(details); //data.orderID, data.payerID
                    Livewire.emit('successfulPayment', data.orderID);
                    //console.log(data.orderID);

                    $(".success-hidden").remove();
                    $(".success-display").show();

                });
            }


        }).render('#paypal-button-container');

        $("#register-button").on('click', function(){
            $(this).addClass("disabled");
            $(this).addClass("loading");
        });

        $('.change-step').on('click', function(){
            var step = $(this).attr("data-step");
            changeStep(step)
        });

        $("#go-to-pay").on("click", function(){
            Livewire.emit('createNewPay');
        });

        function changeStep(step){
            var steps = $(".step");

            //stepContainers.removeClass("active").removeClass("disabled");

            steps.each(function( index ) {
                var temp = $(this).attr("data-step");
                $(this).removeClass("active").removeClass("disabled");

                if(temp > step ){
                    $(this).addClass("disabled");
                }
            });

            $(".step[data-step="+ step +"]").addClass("active");

            $(".step-container").hide();
            $(".step-container[data-step=" + step +"]").show();
        }

        window.addEventListener('goToPay',function(e){
            changeStep(3);
        });

        window.addEventListener('transactionDetails',function(e){
            console.log(e.detail);
        });
    });
</script>
</body>
</html>
