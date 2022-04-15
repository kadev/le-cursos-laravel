<!DOCTYPE html>
<html><head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>{{ $event->name }} - Liderazgo Efectivo</title>
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
    <div class="ui inverted vertical masthead center aligned segment" style="background-image: url('{{ asset('assets/img/bg-3.jpg') }}'); background-attachment: fixed; background-size: 1903px 1250.4px; background-position: 50% -176.008px; padding: 0;">
        <div class="overlay">
            <div class="ui container">

            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">
                    {{ $event->name }}
                </h1>
                @if($nextDate != false)
                    <h2>{{ $months[date("n", strtotime($nextDate->start_datetime)) - 1] }} {{ date("j, Y, g:i a", strtotime($nextDate->start_datetime)) }}</h2>
                @else
                    <h2>No hay fecha disponible</h2>
                @endif
                <br>
                <a href="#register-form" class="ui inverted orange huge button">Registrarme <i class="right arrow icon"></i></a>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            @if(!empty($nextDate))
                <div class="row" style="margin-bottom: 2em;">
                    <div class="seven wide column" style="margin: 0 auto;">
                        <div class="ui center aligned segment">
                            <div class="ui statistics" style="display: inherit;" id="countdown" data-date="{{ date('Y/m/d G:i:s', strtotime($nextDate->start_datetime)) }}">

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="six wide column">
                    @if(!empty($event->image) AND $event->image != NULL)
                        <img src="{{ asset('storage').'/'.$event->image }}" class="ui large bordered rounded image">
                    @else
                        <img src="https://semantic-ui.com/examples/assets/images/wireframe/white-image.png" class="ui large bordered rounded image">
                    @endif
                </div>
                <div class="eight wide right floated column">
                    <h3 class="ui header">Información del evento</h3>
                    <p><strong>Nombre:</strong> {{ $event->name }}</p>
                    <p><strong>Descripción:</strong> {{ $event->description }}</p>
                    <p><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>
                    <p><strong>Lugar:</strong> {{ $event->place }}</p>
                    @if($event->is_free == 1)
                        <p><strong>Precio:</strong> Gratuito</p>
                    @else
                        <p><strong>Precio:</strong> ${{ $event->price }}</p>
                    @endif
                    <p><strong>Fecha:</strong>
                        @if($nextDate != false)
                            {{ $months[date("n", strtotime($nextDate->start_datetime)) - 1] }} {{ date("j, Y, g:i a", strtotime($nextDate->start_datetime)) }}
                        @else
                           No hay fechas disponible
                        @endif
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="center aligned column">
                    <a href="#register-form" class="ui inverted orange huge button">Registrarme</a>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div id="register-form" class="ui text container">
            <h3 class="ui header">Registro</h3>
            <p>Ingresa los siguientes datos para registrarte a nuestro evento: <strong>{{ $event->name }}.</strong></p>
            @if($nextDate != false)
                @livewire("prospects.new-register", ['eventID' => $event->id, 'nextDate' => $nextDate])
            @else
                <div class="ui warning message">
                    <div class="header">
                        No hay fechas disponibles para este evento
                    </div>
                    Por el momento no hay fechas disponibles para este evento, contactanos al siguiente correo para futuras fechas: <a href="mailto:soporte@liderazgoefectivo.info">soporte@liderazgoefectivo.info</a>
                </div>
            @endif
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

@livewireScripts

<script>
    var date = $('#countdown').attr("data-date");
    $('#countdown').countdown(date, function(event) {
        var $this = $(this).html(event.strftime(''
            + '<div class="statistic"><div class="value"><span>%D</span></div><div class="label">Días</div></div>'
            + '<div class="statistic"><div class="value"><span>%H</span></div><div class="label">Horas</div></div>'
            + '<div class="statistic"><div class="value"><span>%M</span></div><div class="label">Minutos</div></div>'
            + '<div class="statistic"><div class="value"><span>%S</span></div><div class="label">Segundos</div></div>'
        ));
    });

    $("#register-button").on('click', function(){
        $(this).addClass("disabled");
        $(this).addClass("loading");
    });
</script>
</body>
</html>
