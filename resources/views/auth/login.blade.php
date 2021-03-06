<!-- -->
@extends('master')
@section('main')
<div class="col-md-8 col-md-offset-2 form-content container" style="margin-top: 70px;">
     <h1 class="title text-center">Login</h1>
    @foreach($errors->all() as $error)
    <p class="alert alert-danger modal-sm">{!!$error!!}</p>
    @endforeach
        {!!Form::open(['url'=>'/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group center-block">
            <input type="hidden" name="url" value="{!!$url!!}"/>
            {!! Form::label('email','Email:',['class'=>'text-light col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('email',Input::old('email'),['class'=>'form-control center-block','placeholder'=>'sample@micp.org']) !!}
            </div>
        </div>
        <div class="form-group ">
            {!! Form::label('password','Password:',['class'=>'text-light col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::password('password',['class'=>'form-control center-block','placeholder'=>'*******']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('Login',['class'=>'btn btn-lg btn-success'])!!}
        </div>
        {!!Form::close()!!}
</div>

@stop