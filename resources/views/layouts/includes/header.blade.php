<header>
    <!-- Main menu -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded bg-bqsales">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ url('bqsales/img/favicon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="BQSales"> {!! config('app.name', '<b>BIT</b>QUBE') !!}
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayuda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="app" href="#">Max Sullca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configuración</a>
                    </li>
                    <li class="nav-item dropdown notification">
                        <a class="nav-link dropdown-toggle" href="#" id="notificaciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"><span>1</span></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificaciones">
                            <a class="dropdown-item" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Nueva venta (Sucursal1) Nueva venta</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Nueva compra (Sucursal1)</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Reporte semanal</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Reporte mensual</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Reporte anual</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Nuevo Stock mínimo</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-usd" aria-hidden="true"></i> Pago por vencerse</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Salir"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--        Menú principal fin-->
    <!--       Menú secundario inicio-->
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light menu-bg">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContentt" aria-controls="navbarSupportedContentt" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContentt">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nueva Venta</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ingrM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventas</a>
                        <div class="dropdown-menu" aria-labelledby="ingrM">
                            <a class="dropdown-item" href="#">Facturas de venta</a>
                            <a class="dropdown-item" href="#">Boletas de venta</a>
                            <a class="dropdown-item" href="#">Tickets de venta</a>
                            <a class="dropdown-item" href="#">Notas de crédito</a>
                            <a class="dropdown-item" href="#">Pagos recibidos</a>
                            <a class="dropdown-item" href="#">Cotizaciones</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('purchase*','paymentcondition*') ? 'active' : null }}">
                        <a class="nav-link dropdown-toggle" href="#" id="egreM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compras</a>
                        <div class="dropdown-menu" aria-labelledby="egreM">
                            <a class="dropdown-item {{ Request::is('purchase/create') ? 'active' : null }}" href="{{ url('purchase/create') }}">Nueva compra</a>
                            <a class="dropdown-item {{ Request::is('purchase') ? 'active' : null }}" href="{{ url('purchase') }}">Facturas de Compras</a>
                            <a class="dropdown-item" href="#">Pagos realizados</a>
                            <a class="dropdown-item {{ Request::is('paymentcondition*') ? 'active' : null }}" href="{{ url('paymentcondition') }}">Condiciones de pago</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('item*') ? 'active' : null }}">
                        <a class="nav-link dropdown-toggle" href="#" id="inveM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventario</a>
                        <div class="dropdown-menu" aria-labelledby="inveM">
                            <a class="dropdown-item" href="{{ url('/item/create') }}">Nuevo ítem</a>
                            <a class="dropdown-item {{ Request::is('item*') ? 'active' : null }}" href="{{ url('/item') }}">Ítems</a>
                            <a class="dropdown-item" href="#">Valor del inventario</a>
                            <a class="dropdown-item" href="#">Almacenes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="inveM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cajas</a>
                        <div class="dropdown-menu" aria-labelledby="inveM">
                            <a class="dropdown-item" href="#">Nueva caja</a>
                            <a class="dropdown-item" href="#">Lista de cajas</a>
                            <a class="dropdown-item" href="#">Valor total</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('customer*','supplier*') ? 'active' : null }}">
                        <a class="nav-link dropdown-toggle" href="#" id="egreM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contactos</a>
                        <div class="dropdown-menu" aria-labelledby="egreM">
                            <a class="dropdown-item" href="{{ url('/customer/create') }}">Nuevo cliente</a>
                            <a class="dropdown-item" href="{{ url('/supplier/create') }}">Nuevo proveedor</a>
                            <a class="dropdown-item" href="#">Todos</a>
                            <a class="dropdown-item {{ Request::is('customer*') ? 'active' : null }}" href="{{ url('/customer') }}">Clientes</a>
                            <a class="dropdown-item {{ Request::is('supplier*') ? 'active' : null }}" href="{{ url('/supplier') }}">Proveedores</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="inveM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                        <div class="dropdown-menu" aria-labelledby="inveM">
                            <a class="dropdown-item" href="#">.. de ventas</a>
                            <a class="dropdown-item" href="#">.. de compra</a>
                            <a class="dropdown-item" href="#">.. administrativos</a>
                            <a class="dropdown-item" href="#">.. contables</a>
                            <a class="dropdown-item" href="#">.. por usuario</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('brand*','category*','measure*','warehouse*') ? 'active' : null }}">
                        <a class="nav-link dropdown-toggle" href="#" id="cateM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorización</a>
                        <div class="dropdown-menu" aria-labelledby="cateM">
                            <a class="dropdown-item {{ Request::is('category*') ? 'active' : null }}" href="{{ url('/category') }}">Categorías de ítems</a>
                            <a class="dropdown-item {{ Request::is('measure*') ? 'active' : null }}" href="{{ url('/measure') }}">Medidas de ítems</a>
                            <a class="dropdown-item {{ Request::is('brand*') ? 'active' : null }}" href="{{ url('/brand') }}">Marcas de ítems</a>
                            <a class="dropdown-item {{ Request::is('warehouse*') ? 'active' : null }}" href="{{ url('/warehouse') }}">Almacenes</a>
                            <a class="dropdown-item" href="#">Tipos de venta</a>
                            <a class="dropdown-item" href="#">Tipos de compra</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--        Menú secundario fin-->
</header>