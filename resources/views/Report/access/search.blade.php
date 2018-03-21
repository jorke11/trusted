<style>
    .huge {
        font-size: 18px;
    }

    .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: white;
        background-color: #5cb85c;
    }
    .panel-blue > .panel-heading {
        border-color: #4e859a;
        color: white;
        background-color: #4e859a;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">  
            <div class="row">
                <div class="col-lg-5">  
                    <div class="form-group">
                        <label for="exampleInputPassword1">Fecha Inicio</label>
                        <input type="text" class="form-control" id="finit" placeholder="Inicio" value="<?php echo date("Y-m") . "-01" ?>">
                    </div>
                </div>
                <div class="col-lg-5">  
                    <div class="form-group">
                        <label for="exampleInputPassword1">Fecha Fin</label>
                        <input type="text" class="form-control" id="fend" placeholder="Fin" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                </div>
                <div class="col-lg-2">  
                    <div class="form-group">
                        <button type="button" class="btn btn-success" id="btn-search">Buscar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">  
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