@extends('layouts.main')

@section('title', 'Categorías')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-object-group" aria-hidden="true"></i> Categorías</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/category/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar marca</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="categories">
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
    {{ Html::script('/bqsales/js/category.js') }}
    <script>
        $(document).ready(function () {
            $('#categories').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/categories') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'category_name', name: 'category_name'},
                    {data: 'category_description', name: 'category_description'},
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
