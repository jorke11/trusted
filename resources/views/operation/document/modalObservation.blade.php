<div class="modal fade" role="dialog" id="modalObservation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Datos de entrega</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmObservation']) !!}
                <input type="hidden" class="form-control input-observation" id="document_id">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Quien recibe?</label>
                            <img id="img_delivery" name="img_delivery" style="width: 100%">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Observacion</label>
                            <textarea class="form-control input-observation" id="observation_delivery" name="observation_delivery"></textarea>
                            
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnAddObservation">Agregar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->