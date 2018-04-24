<div class="container-fluid">
    {!! Form::open(['id'=>'frm']) !!}

    <input id="id" name="id" type="hidden" class="input-user">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Noombres:</label>
                <input type="text" class="form-control input-user" id="name" name='name' required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Apellidos:</label>
                <input type="text" class="form-control input-user" id="last_name" name='last_name' required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Documento:</label>
                <input type="text" class="form-control input-user" id="document" name='document'>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Role:</label>
                <select id="role_id" name="role_id" class="form-control input-user" required>
                    <option value="0">Seleccione</option>
                    @foreach($roles as $rol)
                    <option value="{{$rol->code}}">{{$rol->description}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Password:</label>
                <input type="password" class="form-control input-user" id="password" name='password'>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Confirmation (password):</label>
                <input type="password" class="form-control input-user" id="confirmation" name='confirmation'>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control input-user" id="email" name='email' required>
            </div>
        </div>
        @if(Auth::user()->role_id==1)
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Stakeholder:</label>
                <select id="stakeholder_id" name="stakeholder_id" class="form-control input-user" data-api="/api/getStakeholder" required>
                </select>
            </div>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Area:</label>
                <select id="dependency_id" name="dependency_id" class="form-control input-user">
                    <option value="0">Ninguno</option>
                    @foreach($dependency as $rol)
                    <option value="{{$rol->code}}">{{$rol->description}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Jefe Area:</label>
                <input type="checkbox" class="form-control input-user" id="chief_area_id" name='chief_area_id'>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="email">Status</label>
                <input type="checkbox" class="form-control input-user" id="status_id" name='status_id'>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
</div>