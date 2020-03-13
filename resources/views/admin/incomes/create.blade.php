@extends('admin.layout')

@section ('title', 'Новая категория доходов')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['action'=>'Admin\IncomesController@store', 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}
            <div class="form-group row">

                {{--добавление надписи на форму--}}
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">

                    {{--добавление текстового поля на форму--}}
                    {!!Form::text('name', null, ['class'=> $errors->has('name') ? 'form-control is-invalid':'form-control'])!!}

                    {{--проверка если такое название уже есть--}}
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
            </div>

            {{--вставить выбор иконки--}}
            {{--  <div class="form-group row">
                  {!!Form::label('image', 'Изображение', ['class' => 'col-sm-10 form-control-label'])!!}
                  <div class="col-sm-10">
                      {!!Form::file('image', ['class'=> 'form-control'] )!!}
                  </div>
              </div>--}}

            {!!Form::submit('Создать', ['class'=> 'btn btn-primary'])!!}

            {!!Form::close()!!}
        </div>
    </div>

    @endsection