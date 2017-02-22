@extends('layouts.main')

@section('title', 'Editar proveedor')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-plus" aria-hidden="true"></i> Editar proveedor</h3>

            {!! Form::model($supplier, ['route' => ['supplier.update', $supplier->id], 'method' => 'PUT', 'class' => 'small']) !!}

            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-3 offset-lg-1">

                    {!! Field::text('supplier_ruc', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Ruc del proveedor', 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                    {!! Field::text('supplier_businessname', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre / razón social', 'autocomplete'=>'off']) !!}

                    {!! Field::text('supplier_legaladdress', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Dirección del domicilio fiscal', 'autocomplete'=>'off']) !!}

                    {!! Field::text('supplier_city', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Ciudad', 'autocomplete'=>'off']) !!}

                </div>
                <div class="col-12  col-md-6 col-lg-3">

                    {!! Field::text('supplier_phone', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Teléfono', 'autocomplete'=>'off']) !!}

                    {!! Field::email('supplier_email', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Correo electrónico', 'autocomplete'=>'off']) !!}

                    {!! Field::textarea('supplier_observation', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Observación', 'rows' => '3']) !!}

                    {!! Field::hidden('supplier_status', 0) !!}

                    {!! Field::checkbox('supplier_status') !!}

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-1">
                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">

                        {{ Form::submit('Actualizar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/supplier') }}"><button type="button" class="btn btn-sm">Cancelar</button></a>

                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection