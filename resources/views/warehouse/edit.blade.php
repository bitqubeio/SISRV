@extends('layouts.main')

@section('title', 'Editar almacén')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Editar almacén</h3>
            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-5 offset-lg-1">

                    {!! Form::model($warehouse, ['route' => ['warehouse.update', $warehouse->id], 'method' => 'PUT', 'class' => 'small']) !!}

                    {!! Field::text('warehouse_name', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre del almacén', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                    {!! Field::textarea('warehouse_description', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Descripción del almacén', 'rows' => '3']) !!}

                    {!! Field::hidden('warehouse_status', 0) !!}

                    {!! Field::checkbox('warehouse_status') !!}

                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">

                        {{ Form::submit('Actualizar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/warehouse') }}"><button type="button" class="btn btn-sm">Cancelar</button></a>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
@endsection