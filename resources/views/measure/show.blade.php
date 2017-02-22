@extends('layouts.main')

@section('title', 'Medida: ' . $measure->measure_name)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Medida:</small> {{ $measure->measure_name }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/measure/' . $measure->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $measure->id }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $measure->measure_name }}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td>{{ $measure->measure_description }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($measure->measure_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $measure->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $measure->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="float-right">
                        <a href="{{ url('/measure/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/measure') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Medidas</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
