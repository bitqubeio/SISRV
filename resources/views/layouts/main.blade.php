<!DOCTYPE html>
<html lang="es">

<head>

    <!--


        888      d8b 888                      888                   d8b
        888      Y8P 888                      888                   Y8P
        888          888                      888
        88888b.  888 888888  .d88888 888  888 88888b.   .d88b.      888  .d88b.
        888 "88b 888 888    d88" 888 888  888 888 "88b d8P  Y8b     888 d88""88b
        888  888 888 888    888  888 888  888 888  888 88888888     888 888  888
        888 d88P 888 Y88b.  Y88b 888 Y88b 888 888 d88P Y8b.     d8b 888 Y88..88P
        88888P"  888  "Y888  "Y88888  "Y88888 88888P"   "Y8888  Y8P 888  "Y88P"
                                 888
                                 888
                                 888

    -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Inicio') — {{ config('app.name', 'BITQUBE') }}</title>

    <!-- Favicon -->
    {{ Html::favicon('bqsales/img/favicon.png') }}

    <!-- Style globals -->
    {{ Html::style('bqsales/libs/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('bqsales/libs/fontawesome/css/font-awesome.min.css') }}
    {{ Html::style('https://fonts.googleapis.com/css?family=Lato:400,700') }}


    <!-- Toastr -->
    {{ Html::style('bqsales/css/toastr.min.css')  }}

    <!-- DataTables -->
    {{ Html::style('bqsales/libs/datatables/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('bqsales/libs/datatables/css/responsive.dataTables.min.css') }}

    <!-- Selectize -->
    {{ Html::style('bqsales/libs/chosen/chosen.css') }}

    <!-- Datepicker -->
    {{ Html::style('bqsales/libs/datepicker/bootstrap-datepicker.css') }}

    <!-- -->
    {{ Html::style('bqsales/css/main.css') }}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>

<div id="bqsales-loader">
    <img src="{{ url('bqsales/img/favicon.png') }}" alt="Cargando...">
</div>

@include('layouts.includes.header')

@yield('content')

@include('layouts.includes.footer')

    <!-- Lib globals -->
    {{ Html::script('//code.jquery.com/jquery-1.12.4.js') }}
    {{ Html::script('bqsales/libs/bootstrap/js/tether.min.js') }}
    {{ Html::script('bqsales/libs/bootstrap/js/bootstrap.min.js') }}
    {{ Html::script('bqsales/libs/mousetrap/mousetrap.min.js') }}

    <!-- Toastr -->
    {{ Html::script('bqsales/js/toastr.min.js')  }}

    <!-- Datatables -->
    {{ html::script('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js') }}
    {{ html::script('bqsales/libs/datatables/js/dataTables.bootstrap4.min.js') }}
    {{ html::script('bqsales/libs/datatables/js/dataTables.responsive.min.js') }}

    <!-- Selectize -->
    {{ html::script('bqsales/libs/chosen/chosen.jquery.min.js') }}

    <!-- Datepicker -->
    {{ html::script('bqsales/libs/datepicker/bootstrap-datepicker.min.js') }}

    <!-- Alerts messages -->
    {{ Html::script('bqsales/js/alerts.js') }}

    <!-- Javascript Globals-->
    {{ Html::script('bqsales/js/global.js') }}

    <!-- Toastr messages -->
    {!! Toastr::render() !!}

    <!-- Sections -->
    @section('scripts')
    @show

    <script>
        $(document).ready(function () {
            $('#bqsales-loader').fadeOut();
        });
    </script>

</body>
</html>