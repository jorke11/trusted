@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id='myTabs'>
            <li role="presentation"  class="active" id="tabUplod"><a href="#access_control" aria-controls="special" role="tab" data-toggle="tab">Control Acceso</a></li>
            <li role="presentation" id="tabAuth"><a href="#authotization" aria-controls="special" role="tab" data-toggle="tab">Autorizaciones</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active " id="access_control">
                @include('operation.employee.form')
                @include('operation.employee.list')
            </div>
        </div>
    </div>
</div>

{!!Html::script('js/Operation/employee.js')!!}
@endsection