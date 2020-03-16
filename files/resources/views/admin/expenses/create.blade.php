@extends('admin.layout')

@section ('title', 'Новая категория расходов')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['action'=>'Admin\ExpensesController@store', 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}
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
               {!!Form::label('icon', 'Иконка', ['class' => 'col-sm-10 form-control-label'])!!}
               <div class="col-sm-10">
                   {!!Form::file('icon', ['class'=> 'form-control'] )!!}
               </div>
           </div>

            {{--Цвет--}}
            <div class="form-group row">
                <label for="exampleInputEmail1">Цвет</label>
                <input type="color" name="color" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>

        {!!Form::submit('Создать', ['class'=> 'btn btn-primary'])!!}

           {!!Form::close()!!}
        </div>
    </div>

    @endsection