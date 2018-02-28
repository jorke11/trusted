@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id='myTabs'>
                <li role="presentation" class="active" id="tabList"><a href="#list" aria-controls="home" role="tab" data-toggle="tab">List</a></li>
                <li role="presentation" id="tabManagement"><a href="#management" aria-controls="profile" role="tab" data-toggle="tab">Management</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="list">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('operation.ticket.list')
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane " id="management">
                    @include('operation.ticket.management')
                </div>
            </div>
        </div>
    </div>
</div>





{!!Html::script('js/Operation/Ticket.js')!!}
@endsection