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

            {{--Иконка--}}

              <div class="form-group row">
                {!!Form::label('icon', 'Название иконки', ['class' => 'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('icon', null, ['class'=> 'form-control'])!!}
                </div>
            </div>

            {{--Цвет--}}
            <div class="form-group row">
                {!!Form::label('color', 'Цвет', ['class' => 'col-sm-2 form-control-label'])!!}
                <input type="color" name="color" class="form-control col-sm-1" id="exampleInputEmail1" placeholder="">
            </div>

        {!!Form::submit('Создать', ['class'=> 'btn btn-primary'])!!}

           {!!Form::close()!!}
        </div>
    </div>

    @endsection
