@extends('admin.layout')

@section ('title', 'Расходы')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('admin/expenses/create')}}">Добавить категорию расходов</a>

    <div class="card">
        @if ($expenses->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Иконка</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>
                            <img style="background-color: {{$expense->color}}" src="{{url("images/{$expense->icon}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        <td style="color:{{$expense->color}};">{{$expense->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
        <p class="alert alert-info"> Расходов не существует </p>
            @endif
        </div>

    @endsection