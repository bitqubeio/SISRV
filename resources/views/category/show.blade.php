@extends('layouts.main')

@section('title', 'Categoría: ' . $category->category_name)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Categoría:</small> {{ $category->category_name }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/category/' . $category->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $category->category_name }}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td>{{ $category->category_description }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($category->category_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $category->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $category->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="float-right">
                        <a href="{{ url('/category/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/category') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Categorías</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
