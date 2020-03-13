@extends('admin.layout')

@section ('title', 'Monefy - удобный учет расходов')

@section('content')
        <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistics -->
               {{-- <div class="statistics col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong>{{$categoriesCount}}</strong><br>
                            <small>Количество категорий на сайте</small>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                        <div class="text"><strong>{{$productsCount}}</strong><br>
                            <small>Количество продуктов</small>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    <!-- Projects Section-->
    <section class="projects no-padding-top">
        <div class="container-fluid">
       {{--     @foreach($products as $product)
                <!-- Project-->
                <div class="project">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="image has-shadow"><img src="/files/storage/app/{{$product->image}}" alt="..."
                                                               class="img-fluid"></div>
                            <div class="text">
                                <h3 class="h4">{{$product->name}}</h3>
                                <small>{{$product->short_des}}</small>
                            </div>
                        </div>
                        <div class="project-date"><span class="hidden-sm-down">{{\Carbon\Carbon::parse($product->created_at)->format('d F Y')}}</span></div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="time"><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($product->created_at)->format('H:m')}}</div>
                    </div>
                </div>
            </div>
                @endforeach--}}
        </div>
    </section>
    @endsection