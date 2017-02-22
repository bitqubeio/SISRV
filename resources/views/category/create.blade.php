@extends('layouts.main')

@section('title', 'Nueva categoría')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-plus" aria-hidden="true"></i> Nueva categoría</h3>
            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-5 offset-lg-1">

                    {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'class' => 'small']) !!}

                    {!! Field::text('category_name', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la categoría', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                    {!! Field::textarea('category_description', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Descripción de la categoría', 'rows' => '3']) !!}

                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">

                        {{ Form::submit('Guardar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        {{ Form::submit('Guardar y crear otro', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/category') }}"><button type="button" class="btn btn-sm">Cancelar</button></a>
                        <a href="{{ url('/category') }}" class="btn btn-link btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Categorías</a>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
@endsection