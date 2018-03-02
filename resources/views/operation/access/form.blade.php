
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
                                    <select class="form-control input-product" id="eps_id" name='eps_id'>
                                        <option value="0">Seleccione</option>
                                        @foreach($eps as $val)
                                        <option value="{{$val->code}}">{{$val->description}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">ARL</label>
                                    <select class="form-control input-product" id="arl_id" name='arl_id'>
                                        <option value="0">Seleccione</option>
                                        @foreach($arl as $val)
                                        <option value="{{$val->code}}">{{$val->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Dependencia</label>
                                    <select class="form-control input-product" id="dependency_id" name='dependency_id'>
                                        <option value="0">Seleccione</option>
                                        @foreach($dependency as $val)
                                        <option value="{{$val->code}}">{{$val->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Persona quien autoriza</label>
                                    <input type="text" class="form-control input-product" id="authorization_person" name='authorization_person'>
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
                    <div class="col-lg-6">
                        <canvas id="canvas" width="400" height="300" style="border:1px solid #ccc;">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>


        {!!Form::close()!!}
    </div>
</div>