function urlParams() {
    reloadPaymentConditions();
}

function reloadPaymentConditions() {
    var $select_elem = $("#paymentcondition_id");
    var url = $select_elem.data('url');
    $.getJSON(url, function (json) {
        $select_elem.empty();
        $select_elem.append('<option selected></option>');
        $.each(json, function (idx, obj) {
            $select_elem.append('<option value="' + obj.id + '">' + obj.paymentcondition_name + '</option>');
        });
        $select_elem.chosen({
            width: "100%"
        });
        //$select_elem.trigger('chosen:activate');
        $select_elem.trigger('chosen:updated');
    });
}

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
            //resetAll(formPurchase);
        },
        error: function (data) {
            console.log('error');
            cleanAlert(formPurchase);
            dangerAlert(data);
        }
    });
}));
