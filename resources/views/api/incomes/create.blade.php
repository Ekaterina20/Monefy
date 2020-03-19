@extends('api.layout')

@section ('title', 'Добавьте новый доход')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['url'=>'api/incomes/store', 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}

            <div class="form-group row">
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('name', null, ['class'=> 'form-control'])!!}

                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('income_id', 'Категория доходов', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">

                    {!!Form::select('income_id',$incomes, null, ['class'=> 'form-control'])!!}

                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('amount', 'Сумма', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('amount', null, ['class'=> 'form-control'])!!}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('comment', 'Комментарий', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('comment', null, ['class'=> 'form-control'])!!}
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