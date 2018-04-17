@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id='myTabs'>
            <li role="presentation"  class="active" id="tabUplod"><a href="#access_control" aria-controls="special" role="tab" data-toggle="tab">Control Acceso</a></li>
            <li role="presentation" id="tabReception" ><a href="#reception" aria-controls="special" role="tab" data-toggle="tab">Recepcion de Documentos</a></li>
            <li role="presentation" id="tabAuth"><a href="#authotization" aria-controls="special" role="tab" data-toggle="tab">Autorizaciones</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active " id="access_control">
                @include('operation.access.form')
                @include('operation.access.list')
            </div>
            <div role="tabpanel" class="tab-pane" id="reception">
                @include('operation.access.reception')
            </div>
            <div role="tabpanel" class="tab-pane" id="authotization">
                @include('operation.access.authorization')
            </div>

        </div>
    </div>
</div>

@include('operation.access.modalParameters')

{!!Html::script('js/Operation/access.js')!!}
@endsection