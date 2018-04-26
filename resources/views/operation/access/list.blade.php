<div class="row" style="padding-bottom: 1%">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" id='myTabsIntern'>
                        <li role="presentation"  class="active" id="tabList"><a href="#list_access_control" aria-controls="special" role="tab" data-toggle="tab">Visitantes</a></li>
                        <li role="presentation" id="tabPersonal"><a href="#authotization" aria-controls="special" role="tab" data-toggle="tab">Personal</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="list_access_control">
                            <table class="table table-bordered table-condensed" id="tbl">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Primer Nombre</th>
                                        <th>Segundo Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Documento</th>
                                        <th>EPS</th>
                                        <th>ARL</th>
                                        <th>Ingreso</th>
                                        <th>Salida</th>
                                        <th>Tipo de Sangre</th>
                                        <th>Lugar</th>
                                        <th>Përsona Autorizacion</th>
                                        <th>img</th>
                                        <th>Estado</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="authotization">
                            <table class="table table-bordered table-condensed" id="tblPersonal">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Documento</th>
                                        <th>Ingresar</th>
                                        <th>Salida</th>
                                        <th>Estado</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modalphoto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Foto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="" id="srcphoto" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->