<div class="modal fade" role="dialog" id="modalParameter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Configuración</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmAddParameter']) !!}
                <input type="hidden" class="form-control input-parameter" id="group_parameter" name='group_parameter'>
                <input type="hidden" class="form-control input-parameter" id="element_id">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Descripcion</label>
                            <input type="text" class="form-control input-parameter" id="description" name='description'>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnAddParameter">Agregar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->