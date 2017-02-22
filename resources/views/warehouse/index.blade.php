@extends('layouts.main')

@section('title', 'Almacenes')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-archive" aria-hidden="true"></i> Almacenes</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/warehouse/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar almacén</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="warehouses">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="all">Nombre</th>
                        <th class="desktop">Descripción</th>
                        <th class="min-mobile-l">Creado</th>
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
    {{ Html::script('/bqsales/js/warehouse.js') }}
    <script>
        $(document).ready(function () {
            $('#warehouses').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/warehouses') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'warehouse_name', name: 'warehouse_name'},
                    {data: 'warehouse_description', name: 'warehouse_description'},
                    {data: 'created_at', name: 'created_at'},
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