@extends('layouts.main')

@section('title', 'Facturas de compras')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-files-o" aria-hidden="true"></i> Facturas de compras</h3>
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
                <table class="table table-ssm table-striped responsive" id="purchases">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Factura N°</th>
                        <th>Ruc</th>
                        <th>Razón social</th>
                        <th>F. Emisión</th>
                        <th>Cond. Pago</th>
                        <th>T. Moneda</th>
                        <th>Total</th>
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
            $('#purchases').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/purchases') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'purchase_document_number', name: 'items.purchase_document_number', sClass: 'text-center', orderable: false, searchable: false},
                    {data: 'supplier_ruc', name: 'supplier_ruc'},
                    {data: 'supplier_businessname', name: 'supplier_businessname'},
                    {data: 'purchase_emission_date', name: 'purchase_emission_date'},
                    {data: 'paymentcondition_name', name: 'paymentcondition_name'},
                    {data: 'purchase_type_currency', name: 'purchase_type_currency'},
                    {data: 'total', name: 'total'},
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
