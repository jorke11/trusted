@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        {!! Form::open(['id'=>'frm']) !!}
        <input type="hidden" id="id" name="id" class="input-city">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="email">Titulo</label>
                    <input name="title_main" id="title_main" class="form-control" value="{{$title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="email">Code</label>
                    <input type="text" class="form-control input-city" id="code" name='code' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="email">Description</label>
                    <input type="text" class="form-control input-city" id="description" name='description' required>
                </div>
            </div>
        </div>
    </div>
</div>


{!!Form::close()!!}

{!!Html::script('js/Administration/Customer.js')!!}
@endsection