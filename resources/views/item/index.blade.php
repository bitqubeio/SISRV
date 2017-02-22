@extends('layouts.main')

@section('title', 'Items')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-th-large" aria-hidden="true"></i> Ítems</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/item/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar ítem</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped responsive" id="items">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Img</th>
                        <th>Código</th>
                        <th>Código marca</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th class="text-center all">Acciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('/bqsales/libs/datatables/js/dataTables.keyTable.js') }}
    {{ Html::script('/bqsales/js/item.js') }}
    <script>
        $(document).ready(function () {
            $('#items').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/items') }}",
                "columns": [
                    {data: 'id', name: 'items.id', sClass: 'font-weight-bold'},
                    {data: 'item_image', name: 'items.item_image', sClass: 'text-center', orderable: false, searchable: false},
                    {data: 'item_barcode', name: 'items.item_barcode'},
                    {data: 'item_code', name: 'items.item_code'},
                    {data: 'item_description', name: 'items.item_description'},
                    {data: 'brand_name', name: 'brands.brand_name'},
                    {data: 'action', name: 'action', sClass: 'text-center', orderable: false, searchable: false}
                ],
                "language": {
                    "url": "{{ url('/bqsales/libs/datatables/json/Spanish.json') }}"
                },
                keys: true,
                stateSave: true
            });
        });
    </script>
@endsection
