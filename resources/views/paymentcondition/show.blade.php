@extends('layouts.main')

@section('title', 'Condición de pago: ' . $paymentcondition->paymentcondition_name)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Condición de pago:</small> {{ $paymentcondition->paymentcondition_name }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/paymentcondition/' . $paymentcondition->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a href="{{ url('/paymentcondition/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/paymentcondition') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Condiciones de pago</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $paymentcondition->id }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $paymentcondition->paymentcondition_name }}</td>
                        </tr>
                        <tr>
                            <td>Modo de pago</td>
                            <td>{{ $paymentcondition->paymentcondition_mode }}</td>
                        </tr>
                        <tr>
                            <td>Pagos</td>
                            <td>
                                @if($paymentcondition->paymentcondition_payments)
                                    {{ $paymentcondition->paymentcondition_payments }} Partes
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Plazo</td>
                            <td>
                                @if($paymentcondition->paymentcondition_payments)
                                    {{ $paymentcondition->paymentcondition_term }} Días
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($paymentcondition->paymentcondition_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $paymentcondition->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $paymentcondition->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
