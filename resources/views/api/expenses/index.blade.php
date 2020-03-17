@extends('api.layout')

@section ('title', 'Расходы')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('api/expenses/create')}}">Добавить новый расход</a>

    <div class="card">
        @if ($expense_sites->first())
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
                @foreach($expense_sites as $expense_site)
                    <tr>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            <img style="background-color: {{$expense_site->color}}" src="{{url("images/{$expense_site->icon}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        <td>{{$expense_site->name}}</td>
                        <td>{{$expense_site->expense->name}}</td>
                        <td>{{$expense_site->amount}} сом</td>
                        <td>{{$expense_site->comment}}</td>

                    {{--редактирование--}}
                    {{-- <td>
                         <a href="{{url("admin/products/{$product->slug}/edit")}}">
                              <i class=" fa fa-pencil" aria-hidden="true"></i>
                         </a>

                         --}}{{--чтобы нельзя было удалить категорию с адресной строки
                         только с админки, делаем форму--}}{{--

                         {!! Form::open(['url'=>"admin/products/{$product->slug}/delete", 'method'=> 'delete', 'class'=> 'd-inline-block']) !!}
                             <button type="submit" class="ml-3 form-button" href="{{url("admin/products/{$product->slug}/delete")}}">
                                  <i class=" fa fa-trash" aria-hidden="true"></i>
                              </button>
                         {!! Form::close() !!}


                     </td>
                 </tr>--}}
                @endforeach
                </tbody>
     </table>
     @else
        <p class="alert alert-info"> Расходов пока не существует </p>
    @endif
    </div>

    @endsection