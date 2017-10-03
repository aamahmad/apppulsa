@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
    <div class='col-md-8'></div>
    <div class='col-md-4'>
        
        <p class="text-center"><b>App</b><font color="red">Pulsa</font></p>
        <p class="font-weight-bold">Login</p>

        {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail'])  !!}
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password'])  !!}
                </div>
            </div>
            
            <input type="submit" class="btn btn-sm btn-primary" value="login">
        
        {!! Form::close() !!}

        <a href="{{ url('/register') }}">Daftar</a> | <a href="{{ url('/password/reset') }}">Lupa password</a>

    </div>
</div>
@endsection
