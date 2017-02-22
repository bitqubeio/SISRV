@extends('layouts.main')

@section('title', 'Nueva medida')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-plus" aria-hidden="true"></i> Nueva medida</h3>
            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-5 offset-lg-1">

                    {!! Form::open(['route' => 'measure.store', 'method' => 'POST', 'class' => 'small']) !!}

                    {!! Field::text('measure_name', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la medida', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                    {!! Field::textarea('measure_description', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Descripción de la medida', 'rows' => '3']) !!}

                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">

                        {{ Form::submit('Guardar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        {{ Form::submit('Guardar y crear otro', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/measure') }}"><button type="button" class="btn btn-sm">Cancelar</button></a>
                        <a href="{{ url('/measure') }}" class="btn btn-link btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Medidas</a>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
@endsection