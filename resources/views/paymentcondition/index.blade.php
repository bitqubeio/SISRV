@extends('layouts.main')

@section('title', 'Condiciones de pago')

@section('content')

    @include('partials.modalQuestion')

    <section>
        <div class="container mt-4">
            <h3><i class="fa fa-credit-card" aria-hidden="true"></i> Condiciones de pago</h3>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-right">
                        <a href="{{ url('/paymentcondition/create') }}">
                            <button type="button" class="btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>
                                Agregar condición de pago
                            </button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table table-ssm table-striped nowrap responsive" id="paymentconditions">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="all">Nombre</th>
                        <th class="text-center desktop">Modo de pago</th>
                        <th class="text-center min-mobile-l">Pagos</th>
                        <th class="text-center all">Plazo</th>
                        <th class="text-center sorting_desc_disabled sorting_asc_disabled all">Acciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    {{ Html::script('/bqsales/libs/datatables/js/dataTables.keyTable.js') }}
    {{ Html::script('/bqsales/js/paymentcondition.js') }}
    <script>
        $(document).ready(function () {
            $('#paymentconditions').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/paymentconditions') }}",
                "columns": [
                    {data: 'id', name: 'id', sClass: 'font-weight-bold'},
                    {data: 'paymentcondition_name', name: 'paymentcondition_name'},
                    {data: 'paymentcondition_mode', name: 'paymentcondition_mode', sClass: 'text-center'},
                    {data: 'paymentcondition_payments', name: 'paymentcondition_payments', sClass: 'text-center'},
                    {data: 'paymentcondition_term', name: 'paymentcondition_term', sClass: 'text-center'},
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