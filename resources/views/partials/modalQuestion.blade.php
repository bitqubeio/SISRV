<div class="modal fade malert" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="modalQuestion"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Eliminar ítem</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <table style="width:100%" align="center">
                    <tbody>
                    <tr>
                        <td class="text-right">
                            <small><i class="fa fa-exclamation-circle fa-3x" aria-hidden="true"></i></small>
                        </td>
                        <td class="align-middle">
                            <small>¿Está seguro de eliminar este ítem?<br>Esta acción no se puede deshacer.</small>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <button type="button" class="btn btn-primary btn-sm" id="deleteRow" value=""
                        onclick="DeleteRow(this); return false;">Si
                </button>
                <button type="button" class="btn btn-sm" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
