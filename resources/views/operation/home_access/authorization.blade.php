
<div class="panel panel-default">
    <div class="page-title" style="">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success btn-sm" id='btnNewAuth'>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Limpiar</span>
                </button>
                <button class="btn btn-success btn-sm" id='btnSaveAuth'>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Salida</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmAuthorization','files' => true]) !!}
        <input id="id" name="id" type="hidden" class="input-auth">
        <div class="row">
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading personal">
                        <h4 class="panel-title">Información</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title" class="control-label">Documento*</label>
                                    <input type="text" class="form-control input-auth input-sm input-number" id="document" name='document' required autofocus="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="description" class="control-label">Motivo</label>
                                    <input type="text" class="form-control input-auth input-sm" id="reason" name='reason' required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="email">Estado</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-auth" id="status_access_id" name='status_access_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($status_access as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('status_access', 'status_access_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-3">Listado</div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-condensed" id="tblAuth">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Documento</th>
                                    <th>Motivo</th>
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


        {!!Form::close()!!}
    </div>
</div>

