@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id='myTabs'>
            <li role="presentation" id="tabReception"  class="active"><a href="#reception" aria-controls="special" role="tab" data-toggle="tab">Recepcion de Documentos</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="reception">
                @include('operation.document.reception')
            </div>
        </div>
    </div>
</div>

@include('operation.document.modalParameters')
@include('operation.document.modalObservation')

{!!Html::script('js/Operation/document.js')!!}
@endsection