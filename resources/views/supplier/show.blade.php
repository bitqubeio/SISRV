@extends('layouts.main')

@section('title', 'Proveedor: ' . $supplier->supplier_businessname)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Proveedor:</small> {{ $supplier->supplier_businessname }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/supplier/' . $supplier->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $supplier->id }}</td>
                        </tr>
                        <tr>
                            <td>Ruc</td>
                            <td>{{ $supplier->supplier_ruc }}</td>
                        </tr>
                        <tr>
                            <td>Nombre / Razón social</td>
                            <td>{{ $supplier->supplier_businessname }}</td>
                        </tr>
                        <tr>
                            <td>Dirección del domicilio fiscal</td>
                            <td>{{ $supplier->supplier_legaladdress }}</td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>{{ $supplier->supplier_city }}</td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td>{{ $supplier->supplier_phone }}</td>
                        </tr>
                        <tr>
                            <td>Correo electrónico</td>
                            <td>{{ $supplier->supplier_email }}</td>
                        </tr>
                        <tr>
                            <td>Observación</td>
                            <td>{{ $supplier->supplier_observation }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($supplier->supplier_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $supplier->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $supplier->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="float-right">
                        <a href="{{ url('/supplier/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/supplier') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Proveedores</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
