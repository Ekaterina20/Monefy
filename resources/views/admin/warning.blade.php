<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warning message</title>
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
      <div class="content-wrap">
          <h1>Доступ к данному разделу имеют только администраторы</h1>
      </div>
    {!! Form::open(['action'=>'Auth\LoginController@logout', 'method'=>'post', 'class'=>'nav-item', 'files'=>true]) !!}
    {!!Form::submit('Выйти', ['class'=> 'btn btn-primary body'])!!}
    @csrf
    {!! Form::close() !!}

</body>
</html>