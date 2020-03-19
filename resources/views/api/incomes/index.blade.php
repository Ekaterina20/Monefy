@extends('api.layout')

@section ('title', 'Доходы')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('api/incomes/create')}}">Добавить новый доход</a>

    <div class="card">
        @if ($income_sites->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Иконка</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Сумма</th>
                    <th>Комментарий</th>
                </tr>
                </thead>
                <tbody>
                @foreach($income_sites as $income_site)
                    <tr>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            <img style="background-color: {{$income_site->color}}" src="{{url("images/{$income_site->icon}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        <td>{{$income_site->name}}</td>
                        <td>{{$income_site->income->name}}</td>
                        <td>{{$income_site->amount}} сом</td>
                        <td>{{$income_site->comment}}</td>

                    {{--редактирование--}}
                     <td>
                         <a href="{{url("api/incomes/{$income_site->slug}/edit")}}">
                              <i class=" fa fa-pencil" aria-hidden="true"></i>
                         </a>

                         {{--чтобы нельзя было удалить категорию с адресной строки
                         только с админки, делаем форму--}}

                         {!! Form::open(['url'=>"api/incomes/{$income_site->slug}/delete", 'method'=> 'delete', 'class'=> 'd-inline-block']) !!}
                             <button type="submit" class="ml-3 form-button" href="{{url("api/incomes/{$income_site->slug}/delete")}}">
                                  <i class=" fa fa-trash" aria-hidden="true"></i>
                              </button>
                         {!! Form::close() !!}

                     </td>
                 </tr>
                @endforeach
                </tbody>
     </table>
     @else
        <p class="alert alert-info"> Доходов пока не существует </p>
    @endif
    </div>

    @endsection