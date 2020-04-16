@extends('admin.layout')

@section ('title', 'Изменение категории расходов')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model(['url'=>"admin/categories/{$id}/edit", 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

            <div class="form-group row">
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">

                    {!!Form::text('name', null, ['class'=> $errors->has('name') ? 'form-control is-invalid':'form-control'])!!}
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

            {!!Form::submit('Изменить', ['class'=> 'btn btn-primary'])!!}

            {!!Form::close()!!}
        </div>
    </div>

@endsection
