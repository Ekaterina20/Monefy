@extends('api.layout')

@section ('title', 'Добавьте новый расход')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['url'=>'api/expenses/store', 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}

            <div class="form-group row">
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">

                    {{--{!!Form::text('name', null, ['class'=> $errors->has('name') ? 'form-control is-invalid':'form-control'])!!}--}}
                    {!!Form::text('name', null, ['class'=> 'form-control'])!!}
                    {{--@if($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif--}}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('expense_id', 'Категория расходов', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">

                    {!!Form::select('expense_id',$expenses, null, ['class'=> 'form-control'])!!}
                    {{--{!!Form::select('expense_id',$expenses, null, ['class'=> $errors->has('expense_id') ? 'form-control is-invalid':'form-control'])!!}--}}
                    {{--@if($errors->has('expense_id'))
                        <div class="invalid-feedback">{{$errors->first('expense_id')}}</div>
                    @endif--}}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('amount', 'Сумма', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {{--{!!Form::text('amount', null, ['class'=> $errors->has('amount') ? 'form-control is-invalid':'form-control'])!!}--}}
                    {!!Form::text('amount', null, ['class'=> 'form-control'])!!}
                    {{--@if($errors->has('amount'))
                        <div class="invalid-feedback">{{$errors->first('amount')}}</div>
                    @endif--}}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('comment', 'Комментарий', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('comment', null, ['class'=> 'form-control'])!!}
                    {{--{!!Form::text('comment', null, ['class'=> $errors->has('comment') ? 'form-control is-invalid':'form-control'])!!}--}}
                    {{--@if($errors->has('comment'))
                        <div class="invalid-feedback">{{$errors->first('comment')}}</div>
                    @endif--}}
                </div>
            </div>

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