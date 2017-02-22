function dangerAlert(msg) {
    var errorText = '';
    var errors = msg.responseJSON;
    if (errors) {
        $.each(errors, function (i) {
            errorText = errors[i];
            $('#field_' + i).addClass('has-danger');
            $('#field_' + i + ' .form-control-feedback').html(errorText);
        });
    }
}

function cleanAlert(oForm) {
    for (var i = 1; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        if (field) {
            //console.log(field);
            $('#field_' + field).removeClass('has-danger');
            $('#field_' + field + ' .form-control-feedback').html('');
        }
    }
}

function resetAll(oForm) {
    var frm = oForm.getAttribute('id');
    urlParams();
    $('#' + frm)[0].reset();
    for (var i = 1; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        if (field) {
            //console.log(field);
            $('#field_' + field).removeClass('has-danger');
            $('#field_' + field + ' .form-control-feedback').html('');
        }
    }
}

function saveAlert(title, message) {
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
    toastr.success(message, title);
}
