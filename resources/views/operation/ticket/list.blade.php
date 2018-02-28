<div class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-3">List Ticket</div>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-bordered table-condensed" id="tbl">
                <thead>
                    <tr>
                        <th></th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Priority</th>
                        <th>Dependency</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modalAssociate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmAssociate']) !!}
                <input type="hidden" id="order_id" name="order_id">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Usuario</label>
                            <select class="form-control input-laboral input-sm" id="user_id" name="user_id" required="">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="btnAssociate">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->