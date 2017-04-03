@extends('layouts.main')

@section('title', 'Nueva lista de precios')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-plus" aria-hidden="true"></i> Nueva lista de precios</h3>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-5 offset-lg-1">

                        {!! Form::open(['route' => 'priceList.store', 'method' => 'POST', 'class' => 'small']) !!}

                        {!! Field::text('price_list_name', ['class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la lista de precios', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                        <div class="form-group{{ $errors->has('price_list_type') ? ' has-danger' : '' }}">
                            <label for="price_list_type" class="form-control-label">Tipo:</label>

                            <div>
                                <label>
                                    {!! Form::radio('price_list_type',1,false) !!} Porcentaje
                                </label>
                                <br>
                                <label>
                                    {!! Form::radio('price_list_type',2,false) !!} Valor
                                </label>
                                <br>
                                @if ($errors->has('price_list_type'))
                                    <span class="form-control-feedback">
                                        {{ $errors->first('price_list_type') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="price_list_value" style="display: none">
                            {!! Field::text('price_list_value', ['id'=>'price_list_value','class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la lista de precios', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        </div>
                        <div id="price_list_percentage" style="display: none">
                            {!! Field::text('price_list_percentage', ['id'=>'price_list_percentage','class' => 'form-control-sm mousetrap', 'placeholder' => 'Nombre de la lista de precios', 'autocomplete'=>'off', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        </div>

                        <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                        <div class="form-group mt-2 text-right">

                            {{ Form::submit('Guardar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                            {{ Form::submit('Guardar y crear otro', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                            <a href="{{ url('/priceList') }}">
                                <button type="button" class="btn btn-sm">Cancelar</button>
                            </a>
                            <a href="{{ url('/priceList') }}" class="btn btn-link btn-sm"><i class="fa fa-list-ol"
                                                                                             aria-hidden="true"></i>
                                Marcas</a>

                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=price_list_type]').change(function () {
                if ($(this).val() == 1) {
                    $('#price_list_percentage').show();
                    $('#price_list_value').hide();
                }
                if ($(this).val() == 2) {
                    $('#price_list_value').show();
                    $('#price_list_percentage').hide();
                }
                if ($('input[type=radio][name=price_list_type]').val()) {
                    $('#price_list_percentage').show();
                    $('#price_list_value').hide();
                } else {
                    $('#price_list_value').show();
                    $('#price_list_percentage').hide();
                }
            });
        });
    </script>
@endsection