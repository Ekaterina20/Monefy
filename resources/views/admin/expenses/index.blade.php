@extends('admin.layout')

@section ('title', 'Категории расходов')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('admin/expenses/create')}}">Добавить категорию расходов</a>

    <div class="card">
        @if ($categories->first())
            <table class="table">
                <thead>
                <tr>
                    <th><h3>Иконка</h3></th>
                    <th><h3>Название</h3></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category->flag==0)
                    <tr>
                        <td style="color:{{$category->color}};">
                            <i class="material-icons">{{$category->icon}}</i>
                        </td>

                        <td style="color:{{$category->color}};">
                            <h3>{{$category->name}}</h3>
                        </td>

                        {{--редактирование--}}
                        <td>
                            <a href="{{url("admin/expenses/{$category->id}/edit")}}">
                                <i class=" fa fa-pencil" aria-hidden="true"></i>
                            </a>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            @else
        <p class="alert alert-info"> Расходов не существует </p>
            @endif
        </div>
    @endsection
