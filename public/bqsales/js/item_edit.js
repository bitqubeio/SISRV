$(document).ready(function () {
    urlParams();
});

var action;

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
        //$select_elem.append('<option selected></option>');
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

function reloadBrand() {
    var $select_elem = $("#brand_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        //$select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.brand_name + '</option>');
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
        //$select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.measure_name + '</option>');
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

$("#formItem").on('submit', (function (e) {
    e.preventDefault();
    var route = $('#formItem').data('url');

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
            cleanAlert(formItem);
            dangerAlert(data);
        }
    });
}));