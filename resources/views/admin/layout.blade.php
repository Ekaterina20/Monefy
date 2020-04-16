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
<div class="page home-page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <a href="{{url('admin')}}" class="navbar-brand">
                            <div class="brand-text brand-big"><strong>Главная</strong></div>
                            {{--<div class="brand-text brand-small"><strong>BD</strong></div>--}}
                        </a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                        <!-- Search-->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i
                                        class="icon-search"></i></a></li>

                    <!-- Logout    -->
                        {!! Form::open(['action'=>'Auth\LoginController@logout', 'method'=>'post', 'class'=>'nav-item', 'files'=>true]) !!}
                        {!!Form::submit('Выйти', ['class'=> 'btn btn-primary'])!!}
                        @csrf
                        {!! Form::close() !!}

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch page-layout">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">

            </div>
            <!-- Sidebar Navidation Menus-->
            <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/expenses')}}"><h3><i class="material-icons">add</i>Категории расходов</h3></a></li>
                <li class="active"><a href="{{url('admin/incomes')}}"><h3><i class="material-icons">add</i>Категории доходов</h3></a></li>
            </ul>
        </nav>
        <div class="content-inner">

            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">@yield('title')</h2>
                </div>
            </header>
            <div class="content-wrap">
                @yield('content')
        </div>
    </div>
    </div>
</div>
</body>
</html>
