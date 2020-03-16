@extends('admin.layout')

@section ('title', 'Доходы')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('admin/incomes/create')}}">Добавить категорию доходов</a>

    <div class="card">
        @if ($incomes->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Иконка</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($incomes as $income)
                    <tr>
                        <td>
                            <img style="background-color: {{$income->color}}" src="{{url("files/storage/app/{$income->icon}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        <td style="color: {{$income->color}}"> {{$income->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-info"> Доходов не существует </p>
        @endif
    </div>

    @endsection