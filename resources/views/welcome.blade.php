<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            a{
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    BQSales.io
                </div>

                <div class="links" style="text-align: left">
                    <ul style="font-weight: bold;">
                        <li><a href="http://bqsales.io/purchase">Compras - Factura de compras</a></li>
                        <li><a href="http://bqsales.io/paymentcondition">Compras - Condiciones de pago</a></li>
                    </ul>
                    <ul style="font-weight: bold;">
                        <li><a href="http://bqsales.io/item">Inventario - Ítems</a></li>
                    </ul>
                    <ul style="font-weight: bold;">
                        <li><a href="http://bqsales.io/customer">Contactos - Clientes</a></li>
                        <li><a href="http://bqsales.io/supplier">Contactos - Proveedores</a></li>
                    </ul>
                    <ul style="font-weight: bold;">
                        <li><a href="http://bqsales.io/category">Categorizacion - Categoría de ítems</a></li>
                        <li><a href="http://bqsales.io/measure">Categorizacion - medida de ítems</a></li>
                        <li><a href="http://bqsales.io/brand">Categorizacion - marcas de ítems</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </body>
</html>
