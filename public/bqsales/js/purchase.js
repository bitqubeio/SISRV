function urlParams() {
    reloadCategory();
    reloadBrand();
    reloadMeasure();
}

function reloadCategory() {
    var $select_elem = $("#category_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.category_name + '</option>');
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:activate');
        $select_elem.trigger('chosen:updated');
    });
}

function reloadCategorySelected(id) {
    var $select_elem = $("#category_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $.each(json, function (idx, obj) {
            if (id == obj.id) {
                $select_elem.append('<option value="' + obj.id + '" selected>' + obj.category_name + '</option>');
            } else {
                $select_elem.append('<option value="' + obj.id + '">' + obj.category_name + '</option>');
            }
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:updated');
    });
}

function reloadBrand() {
    var $select_elem = $("#brand_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.brand_name + '</option>');
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:updated');
    });
}

function reloadBrandSelected(id) {
    var $select_elem = $("#brand_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $.each(json, function (idx, obj) {
            if (id == obj.id) {
                $select_elem.append('<option value="' + obj.id + '" selected>' + obj.brand_name + '</option>');
            } else {
                $select_elem.append('<option value="' + obj.id + '">' + obj.brand_name + '</option>');
            }
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:updated');
    });
}

function reloadMeasure() {
    var $select_elem = $("#measure_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.measure_name + '</option>');
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:updated');
    });
}

function reloadMeasureSelected(id) {
    var $select_elem = $("#measure_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $.each(json, function (idx, obj) {
            if (id == obj.id) {
                $select_elem.append('<option value="' + obj.id + '" selected>' + obj.measure_name + '</option>');
            } else {
                $select_elem.append('<option value="' + obj.id + '">' + obj.measure_name + '</option>');
            }
        });
        $select_elem.chosen({
            width: "100%"
        });
        $select_elem.trigger('chosen:updated');
    });
}

$("#formCategory").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formCategory').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $("#modalAddCategory").modal('toggle');
            reloadCategory();
            saveAlert(data.title, data.message);
        },
        error: function (data) {
            cleanAlert(formCategory);
            dangerAlert(data);
        }
    });
}));

$("#formBrand").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formBrand').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $("#modalAddBrand").modal('toggle');
            reloadBrand();
            saveAlert(data.title, data.message);
        },
        error: function (data) {
            cleanAlert(formBrand);
            dangerAlert(data);
        }
    });
}));

$("#formMeasure").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formMeasure').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $("#modalAddMeasure").modal('toggle');
            reloadMeasure();
            saveAlert(data.title, data.message);
        },
        error: function (data) {
            cleanAlert(formMeasure);
            dangerAlert(data);
        }
    });
}));

$("#formPurchase").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formPurchase').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            saveAlert(data.title, data.message);
            resetAll(formItem);
        },
        error: function (data) {
            console.log('error');
            cleanAlert(formPurchase);
            dangerAlert(data);
        }
    });
}));

$("#formItemUpdate").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formItemUpdate').data('url');

    $.ajax({
        url: route,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            saveAlert(data.title, data.message);
        },
        error: function (data) {
            cleanAlert(formItemUpdate);
            dangerAlert(data);
        }
    });
}));

function ReloadDataTable() {
    'use strict';
    var dataTable = $('#items').DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDelete(btn) {
    'use strict';
    $("#deleteRow").val(btn.value);
}

function DeleteRow(btn) {
    'use strict';
    var route = "item/" + btn.value;
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
            toastr.error('¡No pudo ser eliminado!', 'Item');
        }
    });
}
