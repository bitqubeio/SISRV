@extends('layouts.main')

@section('title', 'Ítem: ' . $item->item_barcode)

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <h3><i class="fa fa-eye" aria-hidden="true"></i> <small class="text-muted">Ítem:</small> {{ $item->item_barcode }}</h3>
                    <p class="float-right">
                        <a href="{{ url('/item/' . $item->id . '/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a href="{{ url('/item/create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{ url('/item') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ol" aria-hidden="true"></i> Ítems</a>
                    </p>
                    <table class="table table-view-sm">
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <td>Código</td>
                            <td>{{ $item->item_barcode }}</td>
                        </tr>
                        <tr>
                            <td>Código de barras</td>
                            <td>
                                <div class="text-center" style="display: inline-block">
                                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG("$item->item_barcode", "C128", 2, 50) }}" class="img-fluid" title="{{ $item->item_barcode }}"   />
                                    <br><small>{{ $item->item_barcode }}</small>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Código de marca</td>
                            <td>{{ $item->item_code }}</td>
                        </tr>
                        <tr>
                            <td>Código de fabrica</td>
                            <td>{{ $item->item_alternative_code }}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td>{{ $item->item_description }}</td>
                        </tr>
                        <tr>
                            <td>Medidas</td>
                            <td>{{ $item->item_description_measure }}</td>
                        </tr>
                        <tr>
                            <td>Categoría</td>
                            <td>{{ $item->category_name }}</td>
                        </tr>
                        <tr>
                            <td>Marca</td>
                            <td>{{ $item->brand_name }}</td>
                        </tr>
                        <tr>
                            <td>Unidad de medida</td>
                            <td>{{ $item->measure_name }}</td>
                        </tr>
                        <tr>
                            <td>Observaciones</td>
                            <td>{{ $item->item_observations }}</td>
                        </tr>
                        <tr>
                            <td>Stock minimo</td>
                            <td>
                                {{ $item->item_min_stock }} <small class="text-muted"><i data-toggle="tooltip" data-placement="right" title="" class="fa fa-question-circle" aria-hidden="true" data-original-title="Se te notificará cuando el stock de este ítem llegue a esta cantidad en tu almacén." aria-describedby="tooltip82400"></i></small>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagen</td>
                            <td>
                                <div class="gallery">
                                    <ul>
                                        <li><img src="{{ url('images/item/thumbnail/' . $item->item_image) }}"></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                @if($item->item_status)
                                    <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                    <span class="badge badge-pill badge-default">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td>{{ $item->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{ $item->updated_at->toFormattedDateString() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
