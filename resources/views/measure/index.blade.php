@extends('layouts.main')

@section('title', 'Medidas')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-sliders" aria-hidden="true"></i> Medidas</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/measure/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar medida</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="measures">
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
    {{ Html::script('/bqsales/js/measure.js') }}
    <script>
        $(document).ready(function () {
            $('#measures').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/measures') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'measure_name', name: 'measure_name'},
                    {data: 'measure_description', name: 'measure_description'},
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