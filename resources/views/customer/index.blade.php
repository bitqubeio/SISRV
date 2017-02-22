@extends('layouts.main')

@section('title', 'Clientes')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-users" aria-hidden="true"></i> Clientes</h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-right">
                        <a href="{{ url('/customer/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar cliente</button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="customers">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="desktop">Nombre / Razón Social</th>
                        <th class="min-mobile-l">Ruc / Dni</th>
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
    {{ Html::script('/bqsales/js/customer.js') }}
    <script>
        $(document).ready(function () {
            $('#customers').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/customers') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'customer_businessname', name: 'customer_businessname'},
                    {data: 'customer_ruc_dni', name: 'customer_ruc_dni'},
                    {data: 'customer_phone', name: 'customer_phone'},
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
