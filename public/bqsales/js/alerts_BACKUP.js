function dangerAlert(msg) {
    'use strict';
    var errorText = '';
    var errors = msg.responseJSON;
    if (errors) {
        $.each(errors, function (i) {
            errorText = errors[i];
            //$('#' + i).parent().removeClass('has-success');
            $('#' + i).parent().addClass('has-danger');
            $('#' + i + '~.form-control-feedback').html(errorText);
        });
    }
}

function dangerAlert2(msg) {
    'use strict';
    var errorText = '';
    var errors = msg.responseJSON;
    if (errors) {
        $.each(errors, function (i) {
            errorText = errors[i];
            //$('#' + i).parent().removeClass('has-success');
            $('#field_' + i).addClass('has-danger');
            $('#field_' + i + ' .form-control-feedback').html(errorText);
            //field_category_id
        });
    }
}

function cleanAlert2(oForm) {
    'use strict';
    for (var i = 2; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        if (field) {
            console.log(field);
            $('#field_' + field).removeClass('has-danger');
            $('#field_' + field + ' .form-control-feedback').html('');
            //$('#field_' + field).addClass('has-success');
        }
    }
}

function cleanAlert(oForm) {
    'use strict';
    for (var i = 2; i < oForm.length, oForm.elements[i].getAttribute("type") !== 'button'; i++) {
        var field = oForm.elements[i].name;
        console.log(field);
        $('#' + field).parent().removeClass('has-danger');
        $('#' + field + '~.form-control-feedback').html('');
        //$('#' + field).parent().addClass('has-success');
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
