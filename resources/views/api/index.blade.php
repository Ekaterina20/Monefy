@extends('api.layout')

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

        {{--Расходы--}}

        <div class="card">
            <table class="table">
                <thead>
            <tr>
                <th>Ваш текущий баланс</th>
                <th>{{$balance}} сом</th>
            </tr>
                </thead>
                </table>
        </div>

        <div class="card">
            <strong>История платежей</strong><br>
            <table class="table">
                <thead>
                <tr>
                    <th>Иконка</th>
                    <th>Название</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                @foreach($expense_sites as $expense_site)
                    <tr>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            <img style="background-color: {{$expense_site->color}}" src="{{url("images/{$expense_site->icon}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        <td>{{$expense_site->name}}</td>
                        <td>{{$expense_site->amount}} сом</td>
                        <td>{{\Carbon\Carbon::parse($expense_site->created_at)->format('d m Y')}}</td>
                       </tr>
                @endforeach

                {{--Доходы--}}

                        @foreach($income_sites as $income_site)
                            <tr>
                                {{--чтобы отобразилась картинка, а не путь к ней--}}
                                <td>
                                    <img style="background-color: {{$income_site->color}}" src="{{url("images/{$income_site->icon}")}}"
                                         class="img-fluid admin-img" width="100" height="100">
                                </td>
                                <td>{{$income_site->name}}</td>
                                <td>{{$income_site->amount}} сом</td>
                                <td>{{\Carbon\Carbon::parse($income_site->created_at)->format('d m Y')}}</td>
                            </tr>
                        @endforeach

                </tbody>
            </table>
    </div>
    @endsection