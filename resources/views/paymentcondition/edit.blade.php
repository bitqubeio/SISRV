@extends('layouts.main')

@section('title', 'Editar condición de pago')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Editar condición de pago</h3>
            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-5 offset-lg-1">

                    {!! Form::model($paymentcondition, ['route' => ['paymentcondition.update', $paymentcondition->id], 'method' => 'PUT', 'class' => 'small']) !!}

                    <div class="row">
                        <div class="col-lg-6">
                            {!! Field::text('paymentcondition_name', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la condición de pago', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Field::select('paymentcondition_mode', ['CONTADO'=>'CONTADO','CREDITO'=>'CREDITO'], ['empty'=>'Modo de pago','class'=>'form-control-sm','required'=>'required']) !!}
                        </div>
                    </div>

                    <div class="row" id="hidden">
                        <div class="col-lg-6">
                            {!! Field::number('paymentcondition_payments', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Pagos', 'autocomplete'=>'off','required'=>'required']) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Field::number('paymentcondition_term', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Plazo en días', 'autocomplete'=>'off','required'=>'required']) !!}
                        </div>
                    </div>

                    {!! Field::hidden('paymentcondition_status', 0) !!}

                    {!! Field::checkbox('paymentcondition_status') !!}

                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">

                        {{ Form::submit('Actualizar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/paymentcondition') }}"><button type="button" class="btn btn-sm">Cancelar</button></a>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('/bqsales/js/paymentcondition-cu.js') }}
@endsection