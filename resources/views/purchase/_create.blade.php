@extends('layouts.main')

@section('title', 'Nuevo ítem')

@section('content')

    @include('item.modals.modal')

    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-file-text" aria-hidden="true"></i> Nueva compra</h3>
            <form>
                <div class="row small my-4">
                    <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">
                        <div class="form-group">
                            <label for="almacen_nombre">Tipo de moneda:</label>
                            <select placeholder="Forma de pago" class="form-control form-control-sm">
                                <option value="United States" selected>PEN (Soles)</option>
                                <option value="United Kingdom">USD (Dólares)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="almacen_ubicacion">Condiciones de pago: <span class="text-danger">*</span></label>
                            <select placeholder="Forma de pago" class="form-control form-control-sm">
                                <option value="United States" selected>Efectivo</option>
                                <option value="United Kingdom">Crédito 8 días</option>
                                <option value="Afghanistan">Crédito 15 días</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="border-right:1px solid rgba(0,0,0,.1)">
                        <div class="row">
                            <div class="form-group col-lg-4 suppliers">
                                <label for="almacen_descripcion">Ruc: <small><a href="#">+agregar</a></small></label>
                                <input type="text" class="form-control form-control-sm mousetrap" id="proveedor_ruc" name="proveedor_ruc" style="margin-right:-10px">
                            </div>
                            <div class="form-group col-lg-8">
                                <label for="almacen_descripcion">Nombre/Razón social:</label>
                                <input type="text" class="form-control form-control-sm mousetrap" id="proveedor_nombre" name="proveedor_nombre" disabled>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="almacen_descripcion">Dirección:</label>
                                <input type="text" class="form-control form-control-sm mousetrap" id="proveedor_direccion" name="proveedor_direccion" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">
                        <div class="form-group">
                            <label for="almacen_descripcion">Tipo de documento:</label>
                            <select placeholder="Tipo de documento" class="form-control form-control-sm">
                                <option value="United States" selected>Factura</option>
                                <option value="United Kingdom">Boleta</option>
                                <option value="Afghanistan">Proforma</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="almacen_descripcion">Número:</label>
                            <div class="nro-factura">
                                <input type="text" class="form-control form-control-sm mousetrap" id="almacen_nombre" name="almacen_nombre" value="F-001">
                                <input type="text" class="form-control form-control-sm mousetrap" id="almacen_nombre" name="almacen_nombre" value="003254">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2" style="border-right:1px solid rgba(0,0,0,.1)">
                        <div class="form-group">
                            <label for="almacen_descripcion">Incluir impuesto: <small><a href="#">+agregar</a></small></label>
                            <select name="igv" placeholder="Tipo de documento" class="form-control form-control-sm">
                                <option value="1" selected>Ítems con IGV</option>
                                <option value="0">Ítems sin IGV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="almacen_descripcion">Número de Guía:</label>
                            <div class="nro-factura">
                                <input type="text" class="form-control form-control-sm mousetrap" id="almacen_nombre" name="almacen_nombre" value="F-001">
                                <input type="text" class="form-control form-control-sm mousetrap" id="almacen_nombre" name="almacen_nombre" value="003254">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="almacen_descripcion">Fecha:</label>
                            <input type="text" class="form-control form-control-sm mousetrap datepicker" id="almacen_nombre" name="almacen_nombre" value="17-01-2017">
                        </div>
                        <div class="form-group">
                            <label for="almacen_descripcion">Fecha de vencimiento:</label>
                            <input type="text" class="form-control form-control-sm mousetrap datepicker" id="almacen_nombre" name="almacen_nombre" value="17-01-2017">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="search-item">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Buscar ítem:</label>
                            <input type="text" id="typeahead" class="typeahead form-control form-control-sm mb-2 mr-sm-2 mb-sm-0">
                            <button type="submit" class="btn btn-sm">Agregar ítem</button>
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
                                    <td class="text-right"><small></td>
                                    <td class="text-right"><small>S/.</small><span id="total-prize">0.00</span></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="almacen_descripcion">Observaciones:</label>
                            <textarea name="" id="" class="form-control form-control-sm" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="almacen_descripcion">Notas: <small class="text-muted"><i class="fa fa-question-circle"></i></small></label>
                            <textarea name="" id="" class="form-control form-control-sm" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-3">
                        <dl class="row totales">
                            <dt class="col-sm-5 text-right"><span class="align-middle">Sub-total</span></dt>
                            <dd class="col-sm-7"><small class="text-muted">S/.</small><span id="total-sub">0.00</span></dd>

                            <dt class="col-sm-5 text-right"><span class="align-middle">I.G.V (18%)</span></dt>
                            <dd class="col-sm-7"><small class="text-muted">S/.</small><span id="total-igv">0.00</span></dd>

                            <dt class="col-sm-5 text-right"><span class="align-middle">Total</span></dt>
                            <dd class="col-sm-7 total"><small class="text-muted">S/.</small><span id="total">0.00</span></dd>
                        </dl>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-7 col-lg-12 text-right">
                        <button class="btn btn-sm">Cancelar</button>
                        <button class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('sisrv/js/typeahead.min.js') }}
    <script type="text/javascript"> 
       function getSupplier(a){return void 0!==a.length&&0!=a.lenght&&void $.get("{{ url('/purchase/getsupplier') }}/"+a,function(a){var b=JSON.parse(JSON.stringify(a));$("input[id=proveedor_nombre]").val(b.name),$("input[id=proveedor_direccion]").val(b.address)})}function addRow(a){rows+=1;var b='<tr data-product-id="'+rows+'">';b+='<th data-product="id">'+rows+"</th>",b+='<td data-product="code">'+a.code+"</td>",b+='<td data-product="description">'+a.description+"</td>",b+='<td data-product="brand">'+a.brand+"</td>",b+='<td class="text-center" data-product="quantity"><input type="number" min="0" class="form-control form-control-sm text-center" value="1"></td>',b+='<td data-product="prize"><input type="text" value="0.00" class="text-right form-control form-control-sm"></td>',b+='<td data-product="total-prize" class="text-right"><input type="text" value="0.00" class="text-right form-control form-control-sm"></td>',b+='<td class="text-center"><a onClick="deleteRow(\''+rows+'\')"><i class="fa fa-close"></i></a></td>',b+="</tr>",$("#products").append(b),updateTable()}function updateTable(){var a=0;$("td[data-product=quantity]").find("input").each(function(){a+=parseInt($(this).val())}),$("#total-items").html(a),$("#products").find("tr").each(function(){var a=$(this).children("td[data-product=quantity]").children().val(),b=$(this).children("td[data-product=prize]").children().val(),c="undefined"!==b.lenght&&b>0?b:0,d="undefined"!==a.lenght&&a>0?a:0,e=Math.round(parseFloat(c)*parseInt(d)*100)/100;$(this).children("td[data-product=total-prize]").children().val(e)});var b=0;$("td[data-product=total-prize]").find("input").each(function(){var a=$(this).val();"undefined"!==a.lenght&&a>0?a:0;b=Math.round(100*(b+parseFloat(a)))/100}),$("#total-prize").html(b),updateIgv(b)}function updateIgv(a){var b=$("select[name=igv] option:selected").val();if(b>0){var c=Math.round(100*a/118*100)/100,d=Math.round(100*(a-c))/100;$("#total").html(a),$("#total-sub").html(c),$("#total-igv").html(d)}else{var e=Math.round(1.18*a*100)/100,d=Math.round(100*(e-a))/100;$("#total").html(e),$("#total-sub").html(a),$("#total-igv").html(d)}}function deleteRow(a){$("tr[data-product-id="+a+"]").remove(),updateTable()}var rows=0;$(function(){$(document).keypress(function(a){13==a.which&&a.preventDefault()});var a=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:{url:"{{ url('/purchase/get/suppliers')}}",cache:!1}});$("#proveedor_ruc").typeahead(null,{name:"supplier",source:a}).on("typeahead:selected",function(a,b){getSupplier(b)});$(".datepicker").datepicker({format:"dd/mm/yyyy"}),$("select[name=igv]").on("change",function(){updateIgv(parseFloat($("#total-prize").html()))}),$("#products").on("change","tr > td > input",updateTable);var c=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,remote:{url:"{{ url('/purchase/get/items')}}?term=%QUERY",wildcard:"%QUERY"}}),d=$("#search-item > .typeahead").typeahead({minLength:3,highlight:!0},{displayKey:"product",name:"items",source:c}).on("typeahead:selected",function(a,b){d.typeahead("val",""),addRow(b)}).on("keyup",function(a){13==a.which&&$(".tt-dataset > .tt-suggestion:first-child").trigger("click")})});
    </script>
@endsection