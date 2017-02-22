@extends('layouts.main')

@section('title', 'Cliente: ' . $customer->customer_businessname)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Cliente:</small> {{ $customer->customer_businessname }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/customer/' . $customer->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $customer->id }}</td>
                        </tr>
                        <tr>
                            <td>Ruc / Dni</td>
                            <td>{{ $customer->customer_ruc_dni }}</td>
                        </tr>
                        <tr>
                            <td>Nombre / Razón social</td>
                            <td>{{ $customer->customer_businessname }}</td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td>{{ $customer->customer_phone }}</td>
                        </tr>
                        <tr>
                            <td>Correo electrónico</td>
                            <td>{{ $customer->customer_email }}</td>
                        </tr>
                        <tr>
                            <td>Dirección de su domicilio</td>
                            <td>{{ $customer->customer_address }}</td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>{{ $customer->customer_city }}</td>
                        </tr>
                        <tr>
                            <td>Observación</td>
                            <td>{{ $customer->customer_observation }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($customer->customer_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $customer->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $customer->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="float-right">
                        <a href="{{ url('/customer/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/customer') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Clientes</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
