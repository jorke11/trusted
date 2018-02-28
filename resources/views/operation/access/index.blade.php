@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id='myTabs'>
            <li role="presentation"  class="active" id="tabUplod"><a href="#upload" aria-controls="special" role="tab" data-toggle="tab">Management</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active " id="upload">
                @include('operation.access.form')
                @include('operation.access.list')
            </div>

        </div>
    </div>
</div>
{!!Html::script('js/Operation/access.js')!!}
@endsection