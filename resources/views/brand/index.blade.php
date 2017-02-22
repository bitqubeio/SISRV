@extends('layouts.main')

@section('title', 'Marcas')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-cubes" aria-hidden="true"></i> Marcas</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/brand/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar marca</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="brands">
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
    {{ Html::script('/bqsales/js/brand.js') }}
    <script>
        $(document).ready(function () {
            $('#brands').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/brands') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'brand_description', name: 'brand_description'},
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