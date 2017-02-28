@extends('layouts.main')

@section('title', 'Factura de compra: ')

@section('content')
    <section>
        <div class="container mt-4" id="container">
            <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <small class="text-muted">Factura:</small> {{ $purchase->purchase_document_number }}</h3>
            <div class="row my-3">
                <div class="col-lg-12 text-right">
                    <button class="btn btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                    <button class="btn btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Lista</button>
                </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>{{ $purchase->supplier_businessname }}</h3>
                            <p class="small"><b>Domicilio Fiscal:</b> {{ $purchase->supplier_legaladdress }}
                                <br>
                                <b>Teléfono:</b> {{ $purchase->supplier_phone }}
                                <br>
                                <b>Email:</b> {{ $purchase->supplier_email }}
                                <br>
                                <b>Observaciones:</b> {{ $purchase->supplier_observation }}
                            </p>
                            <div style="border: 1px solid #333;padding:.3rem;border-radius:.25rem">
                                <div class="row small">
                                    <div class="col-lg-6">
                                        <b>FECHA DE EMISIÓN:</b> {{ date('d-m-Y', strtotime($purchase->purchase_emission_date)) }}
                                        <br>
                                        <b>MONEDA:</b>
                                        @if($purchase->purchase_type_currency == 1)
                                            Soles (PEN)
                                        @else
                                            Dólares (USD)
                                        @endif
                                        <br>
                                        <b>CONDICIÓN DE PAGO:</b> {{ $purchase->paymentcondition_name }}
                                    </div>
                                    <div class="col-lg-6">
                                        <b>Nº DE GUÍA:</b> {{ $purchase->purchase_guide_number }}
                                        <br>
                                        <b>ITEMS CON IGV:</b>
                                        @if($purchase->purchase_igv)
                                            Sí
                                        @else
                                            No
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="fac-compra-nro">
                                <p>R.U.C. Nº {{ $purchase->supplier_ruc }}</p>
                                <h3>FACTURA DE COMPRA</h3>
                                <P>N° {{ $purchase->purchase_document_number }}</P>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>CÓDIGO</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>MARCA</th>
                                    <th class="text-center">CANT.</th>
                                    <th class="text-right">COSTO UNIT.</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $num = 1;
                                    $quantity = null;
                                    $total = null;
                                ?>
                                @foreach($purchaseDetails as $purchaseDetail)
                                    <?php
                                        $quantity += $purchaseDetail->purchase_quantity;
                                    ?>
                                    <tr>
                                    <th scope="row">{{ $num++ }}</th>
                                    <td>{{ $purchaseDetail->item_code }}</td>
                                    <td>{{ $purchaseDetail->item_description }}</td>
                                    <td>{{ $purchaseDetail->brand_name }}</td>
                                    <td class="text-center">{{ $purchaseDetail->purchase_quantity }}</td>
                                    <td class="text-right">
                                        @if($purchase->purchase_igv)
                                            {{ $purchaseDetail->purchase_price_with_igv }}
                                        @else
                                            {{ $purchaseDetail->purchase_price_without_igv }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if($purchase->purchase_igv)
                                            <?php
                                                $total += round($purchaseDetail->purchase_price_with_igv * $purchaseDetail->purchase_quantity, 2);
                                            ?>
                                            {{ number_format(round($purchaseDetail->purchase_price_with_igv * $purchaseDetail->purchase_quantity, 2),2) }}
                                        @else
                                            <?php
                                            $total += round($purchaseDetail->purchase_price_without_igv * $purchaseDetail->purchase_quantity, 2);
                                            ?>
                                            {{ number_format(round($purchaseDetail->purchase_price_without_igv * $purchaseDetail->purchase_quantity, 2),2) }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="font-weight-bold">
                                    <td class="text-right font-weight-normal" colspan="4">Totales:</td>
                                    <td class="text-center">{{ $quantity }}</td>
                                    <td class="text-right"><small></small></td>
                                    <td class="text-right">
                                        <small>
                                            @if($purchase->purchase_type_currency == 1)
                                                S/.
                                            @else
                                                $.
                                            @endif
                                        </small>{{ number_format($total,2) }}</td>
                                    <td class="text-center"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="almacen_descripcion">Descripción:</label>
                                <p class="text-muted small">{{ $purchase->purchase_description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="almacen_descripcion">Notas: <small class="text-muted"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Esta información se mostrará en la copia impresa"></i></small></label>
                                <p class="text-muted small">{{ $purchase->purchase_notes }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-3">
                            @if($purchase->purchase_igv)
                                <dl class="row totales">
                                    <dt class="col-sm-5 text-right"><span class="align-middle">Sub-total</span></dt>
                                    <dd class="col-sm-7"><small class="text-muted">S/.</small> {{ number_format(round($total/1.18,2),2) }}</dd>

                                    <dt class="col-sm-5 text-right"><span class="align-middle">I.G.V (18%)</span></dt>
                                    <dd class="col-sm-7"><small class="text-muted">S/.</small> {{ number_format(round($total - $total/1.18,2),2) }}</dd>

                                    <dt class="col-sm-5 text-right"><span class="align-middle">Total</span></dt>
                                    <dd class="col-sm-7 total"><small class="text-muted">S/.</small> {{ number_format($total,2) }}</dd>
                                </dl>
                            @else
                                <dl class="row totales">
                                    <dt class="col-sm-5 text-right"><span class="align-middle">Sub-total</span></dt>
                                    <dd class="col-sm-7"><small class="text-muted">S/.</small> {{ number_format($total,2) }}</dd>

                                    <dt class="col-sm-5 text-right"><span class="align-middle">I.G.V (18%)</span></dt>
                                    <dd class="col-sm-7"><small class="text-muted">S/.</small> {{ number_format(round($total*1.18 - $total,2),2) }}</dd>

                                    <dt class="col-sm-5 text-right"><span class="align-middle">Total</span></dt>
                                    <dd class="col-sm-7 total"><small class="text-muted">S/.</small> {{ number_format(round($total*1.18,2),2) }}</dd>
                                </dl>
                            @endif

                        </div>
                    </div>
                    <div class="row small">
                        <div class="col-lg-12 small text-muted2">
                            <b>Registrado por:</b> <a href="#">maxsullca</a>, el feb 23, 2017. Ultima actualización: mar 12, 2017
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
