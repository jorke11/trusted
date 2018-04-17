<div class="panel panel-default">
    <div class="page-title" style="">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-primary btn-sm" id='btnNewReception'>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Limpiar</span>
                </button>
                <button class="btn btn-success btn-sm" id='btnSaveReception'>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Ingresar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmReception','files' => true]) !!}
        <input id="id" name="id" type="hidden" class="input-reception">
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
                                    <label for="email">Elemento Recibido</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-reception" id="reception_element_id" name='reception_element_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($elements_reception as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('element_reception', 'reception_element_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Remitente</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-reception" id="sender_id" name='sender_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($sender as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('sender', 'sender_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Dependencia</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-reception" id="dependency_id" name='dependency_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($dependency as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('dependency', 'dependency_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="control-label">Para</label>
                                    <input type="text" class="form-control input-reception input-sm" id="received_id" name='received_id' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title" class="control-label">Observacion</label>
                                    <textarea class="form-control  input-reception" id="observation" name="observation"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6">
                        <video id="camReception" width="400" height="300" autoplay="autoplay" style="border:1px solid #ccc;" >
                        </video>

                    </div>
                    <div class="col-lg-6 hidden" >
                        <canvas id="canvas" width="400" height="300" style="border:1px solid #ccc;">
                        </canvas>
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

                        <table class="table table-bordered table-condensed" id="tblReception">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Elemento Recibido</th>
                                    <th>Remitente</th>
                                    <th>Dependencia</th>
                                    <th>Para</th>
                                    <th>Observaciones</th>
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