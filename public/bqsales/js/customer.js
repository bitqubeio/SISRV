/*
 |--------------------------------------------------------------------------
 | BQSales by BITQUBE.IO
 |--------------------------------------------------------------------------
 |
 | Created by Eddy on 14/01/2017.
 |
 */

function ReloadDataTable() {
    'use strict';
    var dataTable = $('#customers').DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDelete(btn) {
    'use strict';
    $("#deleteRow").val(btn.value);
}

function DeleteRow(btn) {
    'use strict';
    var route = "customer/" + btn.value;
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function (msg) {
            $("#modalQuestion").modal('toggle');
            ReloadDataTable();
            toastr.options = {
                "progressBar": false,
                "positionClass": "toast-bottom-left-orange",
                "preventDuplicates": false,
                "showDuration": 100,
                "hideDuration": 100,
                "timeOut": 5000,
                "extendedTimeOut": 100,
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
            };
            toastr.success(msg.message, msg.title);
        },
        error: function (msg) {
            $("#modalQuestion").modal('toggle');
            ReloadDataTable();
            toastr.options = {
                "progressBar": false,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "showDuration": 100,
                "hideDuration": 100,
                "timeOut": 5000,
                "extendedTimeOut": 100,
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
            };
            toastr.error('¡No pudo ser eliminado!', 'Cliente');
        }
    });
}
