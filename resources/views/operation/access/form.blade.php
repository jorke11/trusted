
<div class="panel panel-default">
    <div class="page-title" style="">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success btn-sm" id='btnNew'>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Ingresar</span>
                </button>
                <button class="btn btn-success btn-sm" id='btnSave'>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Salida</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frm','files' => true]) !!}
        <input id="id" name="id" type="hidden" class="input-product">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading personal">
                        <h4 class="panel-title">Información</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title" class="control-label">Documento*</label>
                                    <input type="text" class="form-control input-product input-sm input-number" id="document" name='document' required autofocus="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="description" class="control-label">Primer Apellido*</label>
                                    <input type="text" class="form-control input-product input-sm" id="last_name" name='last_name' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Segundo Apellido*</label>
                                    <input type="text" class="form-control input-product input-sm" id="second_surname" name='second_surname' required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Primero Nombre*</label>
                                    <input type="text" class="form-control input-product input-sm" id="first_name" name='first_name' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Segundo Nombre*</label>
                                    <input type="text" class="form-control input-product input-sm" id="second_name" name='second_name' required data-type="number">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Genero*</label>
                                    <input type="text" class="form-control input-product input-sm" id="gender" name='gender' required data-type="number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Fecha de nacimiento</label>
                                    <input type="text" class="form-control input-product input-number" id="birth_date" name='birth_date' required input-number placeholder="ddmmyyyy">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Tipo de Sangre</label>
                                    <input type="text" class="form-control input-product" id="type_blood" name='type_blood'>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">EPS</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-product" id="eps_id" name='eps_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($eps as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('eps', 'eps_id')">
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
                                    <label for="email">ARL</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-product" id="arl_id" name='arl_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($arl as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('arl', 'arl_id')">
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
                                        <select class="form-control input-product" id="dependency_id" name='dependency_id'>
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Persona quien autoriza</label>
                                    <input type="text" class="form-control input-product" id="authorization_person" name='authorization_person'>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Elemento</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-product" id="element_id" name='element_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($element as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('element', 'element_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Marca</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control input-product" id="mark_id" name='mark_id'>
                                            <option value="0">Seleccione</option>
                                            @foreach($mark as $val)
                                            <option value="{{$val->code}}">{{$val->description}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="obj.showModalParameter('mark', 'mark_id')">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Serie</label>
                                    <input type="text" class="form-control input-product" id="text_serie" name='text_serie'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Persona de contacto</label>
                                    <input type="text" class="form-control input-product" id="person_contact" name='person_contact'>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Telefono de contacto</label>
                                    <input type="text" class="form-control input-product" id="phone_contact" name='phone_contact'>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Toma algun Medicamento</label>
                                    <input type="text" class="form-control input-product" id="medicine" name='medicine'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <video id="cam" width="400" height="300" autoplay="autoplay" style="border:1px solid #ccc;" >
                        </video>

                    </div>
                    <div class="col-lg-6 hidden" >
                        <canvas id="canvas" width="400" height="300" style="border:1px solid #ccc;">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>


        {!!Form::close()!!}
    </div>
</div>

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