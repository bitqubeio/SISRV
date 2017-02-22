/**
 * Created by edyde on 31/01/2017.
 */

$("#paymentcondition_mode").on('change', function () {
    if ($(this).val() == 'CONTADO') {
        $('#hidden').hide();
        $('#hidden input').prop("disabled", true);
    } else {
        $('#hidden').show();
        $('#hidden input').prop("disabled", false);
    }
});
if ($('#paymentcondition_mode').val() == 'CONTADO') {
    $('#hidden').hide();
    $('#hidden input').prop("disabled", true);
} else {
    $('#hidden').show();
    $('#hidden input').prop("disabled", false);
}