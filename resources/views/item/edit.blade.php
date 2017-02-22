@extends('layouts.main')

@section('title', 'Editar ítem')

@section('content')

    @include('item.modals.modal')

    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Editar ítem</h3>

            {!! Form::model($item, ['method' => 'PUT', 'route' => ['item.update', $item->id],'id' => 'formItemUpdate', 'enctype'=>'multipart/form-data', 'class'=>'small', 'data-url' => url('item/' . $item->id)]) !!}
            <div class="row mt-4">
                <div class="col-12 offset-0 col-md-6 offset-md-1 col-lg-3 offset-lg-1">
                    <div id="field_category_id" class="form-group">
                        <label for="category_id" class="form-control-label">Categoría:</label>
                        <span class="text-danger">*</span>
                        <small><a href="#" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></small>
                        {!! Form::select('category_id', [], null, ['id'=>'category_id', 'class'=>'form-control form-control-sm mousetrap', 'data-placeholder'=>'Seleccione una categoría', 'data-url'=>url('dropdown-categories')]) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_brand_id" class="form-group">
                        <label for="brand_id" class="form-control-label">Marca:</label>
                        <span class="text-danger">*</span>
                        <small><a href="#" data-toggle="modal" data-target="#modalAddBrand"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></small>
                        {!! Form::select('brand_id', [], null, ['id'=>'brand_id', 'class'=>'form-control form-control-sm mousetrap', 'data-placeholder'=>'Seleccione una marca', 'data-url'=>url('dropdown-brands')]) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_barcode" class="form-group">
                        <label for="item_barcode" class="form-control-label">Código:</label>
                        <span class="text-danger">*</span>
                        {!! Form::text('item_barcode', null, ['id'=>'item_barcode', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Código del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_code" class="form-group">
                        <label for="item_code" class="form-control-label">Código de marca:</label>
                        {!! Form::text('item_code', null, ['id'=>'item_code', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Código de marca del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_alternative_code" class="form-group">
                        <label for="item_alternative_code" class="form-control-label">Código de fabrica:</label>
                        {!! Form::text('item_alternative_code', null, ['id'=>'item_alternative_code', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Código de fabrica del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                </div>

                <div class="col-12  col-md-6 col-lg-3">
                    <div id="field_item_description" class="form-group">
                        <label for="item_description" class="form-control-label">Descripción:</label>
                        <span class="text-danger">*</span>
                        {!! Form::textarea('item_description', null, ['id' => 'item_description', 'class' => 'form-control form-control-sm mousetrap', 'rows' => 5, 'placeholder' => 'Descripción del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_description_measure" class="form-group">
                        <label for="item_description_measure" class="form-control-label">Medidas:</label>
                        {!! Form::text('item_description_measure', null, ['id'=>'item_description_measure', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Medidas del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_measure_id" class="form-group">
                        <label for="measure_id" class="form-control-label">Unidad de medida:</label>
                        <span class="text-danger">*</span>
                        <small><a href="#" data-toggle="modal" data-target="#modalAddMeasure"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></small>
                        {!! Form::select('measure_id', [], null, ['id'=>'measure_id', 'class'=>'form-control form-control-sm mousetrap', 'data-placeholder'=>'Seleccione una unidad de medida', 'data-url'=>url('dropdown-measures')]) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_min_stock" class="form-group">
                        <label for="item_min_stock" class="form-control-label">Stock mínimo:</label>
                        <span class="text-danger">*</span>
                        {!! Form::number('item_min_stock', null, ['id'=>'item_min_stock', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Stock mínimo del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                </div>

                <div class="col-12  col-md-6 col-lg-3">
                    <div id="field_item_image" class="form-group">
                        <label for="item_image" class="form-control-label">Imagen:</label>
                        {!! Form::file('item_image', ['id'=>'item_image', 'class'=>'form-control form-control-sm mousetrap']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    <div id="field_item_observations" class="form-group">
                        <label for="item_observations" class="form-control-label">Observaciones:</label>
                        {!! Form::textarea('item_observations', null, ['id' => 'item_observations', 'class' => 'form-control form-control-sm mousetrap', 'rows' => 5, 'placeholder' => 'Observaciones del item', 'autocomplete'=>'off']) !!}
                        <div class="form-control-feedback"></div>
                    </div>
                    {!! Field::hidden('item_status', 0) !!}
                    {!! Field::checkbox('item_status') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-9 offset-lg-1">
                    <small class="text-muted mt-2">(<span class="text-danger">*</span>) campos obligatorios</small>
                    <div class="form-group mt-2 text-right">
                        {{ Form::submit('Actualizar', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                        <a href="{{ url('/item') }}">
                            <button type="button" class="btn btn-sm">Cancelar</button>
                        </a>
                        <a href="{{ url('/item/' . $item->id) }}" class="btn btn-link btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver detalle</a>
                        <a href="{{ url('/item') }}" class="btn btn-link btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Ítems</a>
                    </div>
                </div>
            </div>
            {{ Form::close() }}

        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('bqsales/js/item.js') }}
    <script>
        $(document).ready(function () {
            reloadCategorySelected({{ $item->category_id }});
            reloadBrandSelected({{ $item->brand_id }});
            reloadMeasureSelected({{ $item->measure_id }});
        });
    </script>
@endsection