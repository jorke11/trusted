@extends('layouts.app')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


{!!Html::style('/vendor/datetimepicker/css/jquery.datetimepicker.css')!!}
{!!Html::script('/vendor/datetimepicker/js/jquery.datetimepicker.full.min.js')!!}



<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id='myTabs'>
        <li role="presentation" class="active" id="tabList"><a href="#list" aria-controls="home" role="tab" data-toggle="tab">List</a></li>
        <li role="presentation" ><a href="#report" aria-controls="home" role="tab" data-toggle="tab">Detallado</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('Report.access.data')
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="report">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('Report.access.search')
                </div>
            </div>
        </div>

    </div>
</div>



{!!Html::script('js/Report/Access.js')!!}
@endsection