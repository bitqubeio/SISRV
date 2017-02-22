$(document).ready(function () {
    urlParams();
});

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

$("#createCategory").click(function () {
    'use strict';
    var category_name = $("#category_name").val();
    var category_description = $("#category_description").val();
    var route = $('#formCategory').data('url');
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
            category_name: category_name,
            category_description: category_description
        },
        success: function (msg) {
            $("#modalAddCategory").modal('toggle');
            reloadCategory();
            saveAlert(msg.title, msg.message);
        },
        error: function (msg) {
            cleanAlert2(formCategory);
            dangerAlert2(msg);
        }
    });
});

$("#createBrand").click(function () {
    'use strict';
    var brand_name = $("#brand_name").val();
    var brand_description = $("#brand_description").val();
    var route = $('#formBrand').data('url');
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
            brand_name: brand_name,
            brand_description: brand_description
        },
        success: function (msg) {
            $("#modalAddBrand").modal('toggle');
            reloadBrand();
            saveAlert(msg.title, msg.message);
        },
        error: function (msg) {
            cleanAlert2(formBrand);
            dangerAlert2(msg);
        }
    });
});

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
            cleanAlert2(formMeasure);
            dangerAlert2(data);
        }
    });
}));

$("#createItem").click(function () {
    'use strict';
    var category_id = $("#category_id").val();
    var brand_id = $("#brand_id").val();
    var item_barcode = $("#item_barcode").val();
    var item_code = $("#item_code").val();
    var item_alternative_code = $("#item_alternative_code").val();
    var item_name = $("#item_name").val();
    var item_description = $("#item_description").val();
    var item_description_measure = $("#item_description_measure").val();
    var measure_id = $("#measure_id").val();
    var item_min_stock = $("#item_min_stock").val();
    var item_image = $("#item_image").val();
    var item_observations = $("#item_observations").val();

    var route = $('#formItem').data('url');
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
            category_id: category_id,
            brand_id: brand_id,
            item_barcode: item_barcode,
            item_code: item_code,
            item_alternative_code: item_alternative_code,
            item_name: item_name,
            item_description: item_description,
            item_description_measure: item_description_measure,
            measure_id: measure_id,
            item_min_stock: item_min_stock,
            item_image: item_image,
            item_observations: item_observations
        },
        success: function (msg) {
            saveAlert(msg.title, msg.message);
        },
        error: function (msg) {
            cleanAlert2(formItem);
            dangerAlert2(msg);
        }
    });
});


