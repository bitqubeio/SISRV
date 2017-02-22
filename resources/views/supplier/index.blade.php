@extends('layouts.main')

@section('title', 'Proveedores')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-truck" aria-hidden="true"></i> Proveedores</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/supplier/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar proveedor</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="suppliers">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="desktop">Nombre / Razón Social</th>
                        <th class="min-mobile-l">Ruc</th>
                        <th class="min-mobile-l">Teléfono</th>
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
    {{ Html::script('/bqsales/js/supplier.js') }}
    <script>
        $(document).ready(function () {
            $('#suppliers').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/suppliers') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'supplier_businessname', name: 'supplier_businessname'},
                    {data: 'supplier_ruc', name: 'supplier_ruc'},
                    {data: 'supplier_phone', name: 'supplier_phone'},
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
