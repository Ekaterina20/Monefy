<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monefy Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    {{--Material Icons--}}
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
</head>
<body>
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Monefy</h1>
                            </div>
                            <p>Система учета расходов</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            {!! Form::open(['route'=>'login', 'id'=>'login-form']) !!}
                            <div class="form-group">
                                {!! Form::text('email', null, ['class'=>'input-material', 'placeholder'=>'email']) !!}
                                @if ($errors->has('email'))
                                    <p>{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::password('password',['class'=>'input-material', 'placeholder'=>'Пароль']) !!}
                            </div>
                            @if ($errors->has('password'))
                                <p>{{$errors->first('password')}}</p>
                            @endif
                            {!! Form::submit('Войти', ['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                            {{-- <a href="#" class="forgot-pass">Forgot Password?</a><br>--}}
                            <small>Do not have an account?</small>

                            <a href="{{url('/register')}}" class="signup">Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
    </div>--}}
</div>
</body>
</html>