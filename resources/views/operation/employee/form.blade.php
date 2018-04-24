<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open(['id'=>'frm','files' => true]) !!}
        <input id="id" name="id" type="hidden" class="input-product">
        <div class="row">
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading personal">
                        <h4 class="panel-title">Información</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="email" class="control-label">Archivo</label>
                                    <input type="file" class="form-control input-product input-sm" id="file_employee" name='file_employee'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-sm " id='btnSave' style="width: 100%;padding-left: 5px;background-color: rgba(0,0,0,0.2); 
                                border:1px solid #007bff;border-radius: 5px;
                                color:white;font-size: 17px">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"> Subir</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        {!!Form::close()!!}
    </div>
</div>

