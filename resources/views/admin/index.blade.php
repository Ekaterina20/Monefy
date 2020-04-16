@extends('admin.layout')

@section ('title', 'Monefy - удобный учет расходов')

@section('content')

        <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>
    </section>

    <!-- Projects Section-->
    <section class="projects no-padding-top">
        <div class="container-fluid">

            <table class="table">
                <thead>
                <tr>
                    <th><h1>Иконка</h1></th>
                    <th><h1>Вид</h1></th>
                    <th><h1>Название</h1></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td style="color:{{$category->color}};">
                            <i class="material-icons">{{$category->icon}}</i>
                        </td>

                        <td style="color:{{$category->color}};">
                            @if($category->flag==0)
                                    <h3>Расход</h3>
                            @else   <h3>Доход</h3>
                            @endif
                        </td>

                        <td style="color:{{$category->color}};">
                            <h3>{{$category->name}}</h3>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
    @endsection
