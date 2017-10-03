<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            body, html {
                height: 100%;
                margin: 0;
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .bg {
                /* The image used */
                background-image: url("http://localhost:8000/img/education.jpg");

                /* Full height */
                height: 100%; 

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
<body class="bg">
    <div class="container"> 
        <div class="row">
            <div class='col-md-8'></div>
            <div class='col-md-4'>
                <div class="jumbotron">
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
        </div>
</body>
</html>
