@extends('layouts.main')

@section('title', 'Nueva compra')

@section('content')

    @include('item.modals.modal')

    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-file-text" aria-hidden="true"></i> Nueva compra</h3>

            {{ Form::open(['id' => 'formPurchase', 'class'=>'small', 'data-url' => url('purchase')]) }}

            <div class="row my-4">
                <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">

                    <div id="field_purchase_type_currency" class="form-group">
                        <label for="purchase_type_currency" class="form-control-label">Tipo de moneda:</label>
                        <span class="text-danger">*</span>
                        {!! Form::select('purchase_type_currency', [1=>'PEN (Soles)',2=>'USD (Dólares)'], null, ['id'=>'purchase_type_currency', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Tipo de moneda']) !!}
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                    <div id="field_paymentcondition_id" class="form-group">
                        <label for="paymentcondition_id" class="form-control-label">Condición de pago:</label>
                        <span class="text-danger">*</span>
                        {!! Form::select('paymentcondition_id', [], null, ['id'=>'paymentcondition_id', 'class'=>'form-control form-control-sm mousetrap', 'data-placeholder'=>'Condición de pago','data-url'=>url('dropdown-payment-conditions')]) !!}
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                </div>
                <div class="col-lg-4" style="border-right:1px solid rgba(0,0,0,.1)">
                    <div class="row">

                        <div id="field_supplier_id" class="form-group col-lg-4 suppliers">
                            <label for="supplier_id" class="form-control-label">Ruc:</label>
                            <span class="text-danger">*</span>
                            {!! Form::text('supplier_id', null, ['id'=>'supplier_id', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Ruc del proveedor', 'autocomplete'=>'off']) !!}
                            {{--<div class="form-control-feedback"></div>--}}
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="almacen_descripcion">Nombre/Razón social:</label>
                            <input type="text" class="form-control form-control-sm mousetrap" id="proveedor_nombre"
                                   name="proveedor_nombre" disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="almacen_descripcion">Dirección:</label>
                            <input type="text" class="form-control form-control-sm mousetrap" id="proveedor_direccion"
                                   name="proveedor_direccion" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">

                    <div id="field_purchase_document" class="form-group">
                        <label for="purchase_document" class="form-control-label">Tipo de documento:</label>
                        <span class="text-danger">*</span>
                        {!! Form::select('purchase_document', ['Factura'=>'Factura','Boleta'=>'Boleta','Proforma'=>'Proforma'], null, ['id'=>'purchase_document', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Tipo de documento']) !!}
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                    <div id="field_purchase_document_number" class="form-group">
                        <label for="purchase_document_number" class="form-control-label">Número:</label>
                        <span class="text-danger">*</span>
                        <div class="nro-factura">
                            {!! Form::text('purchase_document_number_series', null, ['id'=>'purchase_document_number_series', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Serie', 'autocomplete'=>'off']) !!}
                            {!! Form::text('purchase_document_number', null, ['id'=>'purchase_document_number', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Número', 'autocomplete'=>'off']) !!}
                        </div>
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                </div>
                <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">

                    <div id="field_purchase_igv" class="form-group">
                        <label for="purchase_igv" class="form-control-label">Incluir impuesto:</label>
                        <span class="text-danger">*</span>
                        {!! Form::select('purchase_igv', [1=>'Ítems con IGV',0=>'Ítems sin IGV'], null, ['id'=>'purchase_igv', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Incluir impuesto']) !!}
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                    <div id="field_purchase_guide_number" class="form-group">
                        <label for="purchase_guide_number" class="form-control-label">Número de Guía:</label>
                        <span class="text-danger">*</span>
                        <div class="nro-factura">
                            {!! Form::text('purchase_guide_number_series', null, ['id'=>'purchase_guide_number_series', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Serie', 'autocomplete'=>'off']) !!}
                            {!! Form::text('purchase_guide_number', null, ['id'=>'purchase_guide_number', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Número', 'autocomplete'=>'off']) !!}
                        </div>
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                </div>
                <div class="col-lg-2">

                    <div id="field_purchase_emission_date" class="form-group">
                        <label for="purchase_emission_date" class="form-control-label">Fecha de emisión:</label>
                        <span class="text-danger">*</span>
                        {!! Form::text('purchase_emission_date', null, ['id'=>'purchase_emission_date', 'class'=>'form-control form-control-sm mousetrap datepicker', 'placeholder'=>'Fecha']) !!}
                        {{--<div class="form-control-feedback"></div>--}}
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="search-item" class="search-item">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Buscar ítem:</label>
                        <input type="text" id="typeahead"
                               class="typeahead form-control form-control-sm mb-2 mr-sm-2 mb-sm-0">
                        <button type="button" class="btn btn-sm">Agregar ítem</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <table class="table table-sm-invoice table-striped" id="newInvoice">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <th class="text-center">Cant.</th>
                            <th class="text-right">Costo Unit.</th>
                            <th class="text-right">Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="products"></tbody>
                        <tfoot>
                        <tr class="font-weight-bold">
                            <td class="text-right font-weight-normal" colspan="4">Totales:</td>
                            <td id="total-items" class="text-center">0</td>
                            <td class="text-right">
                                <small>
                            </td>
                            <td class="text-right">
                                <small>S/.</small>
                                <span id="total-prize">0.00</span></td>
                            <td class="text-center"></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">

                    <div id="field_purchase_description" class="form-group">
                        <label for="purchase_description" class="form-control-label">Descripción:</label>
                        {!! Form::textarea('purchase_description', null, ['id'=>'purchase_description', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Ruc del proveedor', 'rows'=>3]) !!}
                        <div class="form-control-feedback"></div>
                    </div>

                </div>
                <div class="col-lg-3">

                    <div id="field_purchase_notes" class="form-group">
                        <label for="purchase_notes" class="form-control-label">Notas:</label>
                        <small class="text-muted"><i class="fa fa-question-circle"></i></small>
                        {!! Form::textarea('purchase_notes', null, ['id'=>'purchase_notes', 'class'=>'form-control form-control-sm mousetrap', 'placeholder'=>'Ruc del proveedor', 'rows'=>3]) !!}
                        <div class="form-control-feedback"></div>
                    </div>

                </div>
                <div class="col-lg-3 offset-lg-3">
                    <dl class="row totales">
                        <dt class="col-sm-5 text-right"><span class="align-middle">Sub-total</span></dt>
                        <dd class="col-sm-7">
                            <small class="text-muted">S/.</small>
                            <span id="total-sub">0.00</span></dd>

                        <dt class="col-sm-5 text-right"><span class="align-middle">I.G.V (18%)</span></dt>
                        <dd class="col-sm-7">
                            <small class="text-muted">S/.</small>
                            <span id="total-igv">0.00</span></dd>

                        <dt class="col-sm-5 text-right"><span class="align-middle">Total</span></dt>
                        <dd class="col-sm-7 total">
                            <small class="text-muted">S/.</small>
                            <span id="total">0.00</span></dd>
                    </dl>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-md-7 col-lg-12 text-right">
                    {{ Form::submit('Guardar y crear otro', ['name' => 'action', 'class' => 'btn btn-primary btn-sm']) }}
                    <button class="btn btn-sm">Cancelar</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('bqsales/js/typeahead.min.js') }}
    {{ Html::script('bqsales/js/purchase.js') }}

    <script type="text/javascript">
        $(document).ready(function () {
            urlParams();

            function getSupplier(a) {
                return void 0 !== a.length && 0 != a.lenght && void $.get("{{ url('/purchase/getsupplier') }}/" + a, function (a) {
                        var b = JSON.parse(JSON.stringify(a));
                        $("input[id=proveedor_nombre]").val(b.name), $("input[id=proveedor_direccion]").val(b.address)
                    })
            }

            function addRow(a) {
                rows += 1;
                var b = '<tr data-product-id="' + rows + '">';
                b += '<td data-product="id" style="font-weight: bold;"></td>', b += '<td data-product="code"><input name="item[]" type="hidden" value="' + a.id + '">' + a.code + "</td>", b += '<td data-product="description">' + a.description + "</td>", b += '<td data-product="brand">' + a.brand + "</td>", b += '<td class="text-center" data-product="quantity"><input name="quantity[]" type="number" min="0" class="form-control form-control-sm text-center" value="1"></td>', b += '<td data-product="prize"><input name="price[]" type="text" value="0.00" class="text-right form-control form-control-sm"></td>', b += '<td data-product="total-prize" class="text-right"><input type="text" value="0.00" class="text-right form-control form-control-sm"></td>', b += '<td class="text-center"><a onClick="deleteRow(\'' + rows + '\')"><i class="fa fa-close"></i></a></td>', b += "</tr>", $("#products").append(b), updateTable()
            }

            function updateTable() {
                var a = 0;
                $("td[data-product=quantity]").find("input").each(function () {
                    a += parseInt($(this).val())
                }), $("#total-items").html(a), $("#products").find("tr").each(function () {
                    var a = $(this).children("td[data-product=quantity]").children().val(), b = $(this).children("td[data-product=prize]").children().val(), c = "undefined" !== b.lenght && b > 0 ? b : 0, d = "undefined" !== a.lenght && a > 0 ? a : 0, e = Math.round(parseFloat(c) * parseInt(d) * 100) / 100;
                    $(this).children("td[data-product=total-prize]").children().val(e)
                });
                var b = 0;
                $("td[data-product=total-prize]").find("input").each(function () {
                    var a = $(this).val();
                    "undefined" !== a.lenght && a > 0 ? a : 0;
                    b = Math.round(100 * (b + parseFloat(a))) / 100
                }), $("#total-prize").html(b.toFixed(2));
                for (var c = document.getElementById("products"), d = c.getElementsByTagName("tr"), e = ("textContent" in document ? "textContent" : "innerText"), f = 0, g = d.length; f < g; f++)d[f].children[0][e] = f + 1;
                updateIgv(b)
            }

            function updateIgv(a) {
                var b = $("select[name=igv] option:selected").val();
                if (b == 1) {
                    var c = Math.round(100 * a / 118 * 100) / 100, d = Math.round(100 * (a - c)) / 100;
                    $("#total").html(a.toFixed(2)), $("#total-sub").html(c.toFixed(2)), $("#total-igv").html(d.toFixed(2))
                }
                if (b == 0) {
                    var e = Math.round(1.18 * a * 100) / 100, d = Math.round(100 * (e - a)) / 100;
                    $("#total").html(e.toFixed(2)), $("#total-sub").html(a.toFixed(2)), $("#total-igv").html(d.toFixed(2))
                }
                if (b == '') {
                    var e = 0;
                    var a = 0;
                    var d = 0;
                    $("#total").html(e.toFixed(2)), $("#total-sub").html(a.toFixed(2)), $("#total-igv").html(d.toFixed(2))
                }
            }

            function deleteRow(a) {
                $("tr[data-product-id=" + a + "]").remove(), updateTable()
            }

            var rows = 0;
            $(function () {
                $(document).keypress(function (a) {
                    13 == a.which && a.preventDefault()
                });
                var a = new Bloodhound({
                    datumTokenizer: function (a) {
                        var b = Bloodhound.tokenizers.whitespace(a);
                        return $.each(b, function (a, c) {
                            for (var d = 0; d + 1 < c.length;)b.push(c.substr(d, c.length)), d++
                        }), b
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: {url: "{{ url('/purchase/get/suppliers')}}", cache: !1}
                });
                $("#supplier_id").typeahead({highlight: !0}, {
                    name: "supplier",
                    source: a
                }).on("typeahead:selected", function (a, b) {
                    getSupplier(b)
                });
                $("select[name=igv]").on("change", function () {
                    updateIgv(parseFloat($("#total-prize").html()))
                }), $("#products").on("change", "tr > td > input", updateTable);
                var c = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {url: "{{ url('/purchase/get/items')}}?term=%QUERY", wildcard: "%QUERY"}
                }), d = $("#search-item > .typeahead").typeahead({minLength: 3, highlight: !0}, {
                    displayKey: "product",
                    name: "items",
                    source: c
                }).on("typeahead:selected", function (a, b) {
                    d.typeahead("val", ""), addRow(b)
                }).on("keyup", function (a) {
                    13 == a.which && $(".tt-dataset > .tt-suggestion:first-child").trigger("click")
                })
            });

            // datePicker
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: 'linked',
                language: "es",
                orientation: "bottom auto",
                autoclose: true,
                todayHighlight: true
            });

        });
    </script>
@endsection