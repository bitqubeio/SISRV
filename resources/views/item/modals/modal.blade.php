<!-- Modal -->
<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddCategory"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddCategoryTitle"><i class="fa fa-plus" aria-hidden="true"></i> Nueva
                    categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{ Form::open(['id' => 'formCategory', 'data-url' => url('categoryadd')]) }}
            <div class="modal-body small">
                <div id="field_category_name" class="form-group">
                    <label for="category_name" class="form-control-label">Nombre:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('category_name', null, ['id'=>'category_name', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Nombre de la categoría', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
                <div id="field_category_description" class="form-group">
                    <label for="category_description" class="form-control-label">Descripción:</label>
                    <span class="text-danger">*</span>
                    {!! Form::textarea('category_description', null, ['id'=>'category_description', 'class'=>'form-control form-control-sm mousetrap', 'rows'=>5, 'placeholder'=>'Descripción de la categoría']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) }}
                <button type="button" class="btn btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
            {{ Form::close() }}

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddBrand" tabindex="-1" role="dialog" aria-labelledby="modalAddBrand"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddBrandTitle"><i class="fa fa-plus" aria-hidden="true"></i> Nueva
                    marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{ Form::open(['id' => 'formBrand', 'data-url' => url('brandadd')]) }}
            <div class="modal-body small">
                <div id="field_brand_name" class="form-group">
                    <label for="brand_name" class="form-control-label">Nombre:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('brand_name', null, ['id'=>'brand_name', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Nombre de la marca', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
                <div id="field_brand_description" class="form-group">
                    <label for="brand_description" class="form-control-label">Descripción:</label>
                    <span class="text-danger">*</span>
                    {!! Form::textarea('brand_description', null, ['id'=>'brand_description', 'class'=>'form-control form-control-sm mousetrap', 'rows'=>5, 'placeholder'=>'Descripción de la marca']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) }}
                <button type="button" class="btn btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
            {{ Form::close() }}

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddMeasure" tabindex="-1" role="dialog" aria-labelledby="modalAddMeasure"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddMeasureTitle"><i class="fa fa-plus" aria-hidden="true"></i> Nueva
                    medida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{ Form::open(['id' => 'formMeasure', 'data-url' => url('measureadd')]) }}
            <div class="modal-body small">
                <div id="field_measure_name" class="form-group">
                    <label for="measure_name" class="form-control-label">Nombre:</label>
                    <span class="text-danger">*</span>
                    {!! Form::text('measure_name', null, ['id'=>'measure_name', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Nombre de la medida', 'autocomplete'=>'off']) !!}
                    <div class="form-control-feedback"></div>
                </div>
                <div id="field_measure_description" class="form-group">
                    <label for="measure_description" class="form-control-label">Descripción:</label>
                    <span class="text-danger">*</span>
                    {!! Form::textarea('measure_description', null, ['id'=>'measure_description', 'class'=>'form-control form-control-sm mousetrap', 'rows'=>5, 'placeholder'=>'Descripción de la medida']) !!}
                    <div class="form-control-feedback"></div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) }}
                <button type="button" class="btn btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
            {{ Form::close() }}

        </div>
    </div>
</div>
