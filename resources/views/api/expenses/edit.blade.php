@extends('api.layout')

@section ('title', 'Изменение расхода')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($expense_site, ['url'=>"api/expenses/{$expense_site->slug}/edit", 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

            <div class="form-group row">
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('name', null, ['class'=> 'form-control'])!!}
                </div>
            </div>

            {{--чтобы отобразить картинку--}}

            <img style="background-color: {{$expense_site->color}}" src="{{url("images/{$expense_site->icon}")}}" class="img-fluid my-4">

            <div class="form-group row">
                {!!Form::label('icon', 'Изображение', ['class' => 'col-sm-10 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::file('icon', ['class'=> 'form-control'] )!!}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('expense_id', 'Категория расходов', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::select('expense_id',$expenses, null, ['class'=> 'form-control'])!!}
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
                    {!!Form::textarea('comment', null, ['class'=> 'form-control'])!!}

                </div>
            </div>

            {{--Цвет--}}
            <div class="form-group row">
                <label for="exampleInputEmail1">Цвет</label>
                <input type="color" name="color" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>

            {!!Form::submit('Изменить', ['class'=> 'btn btn-primary'])!!}

            {!!Form::close()!!}
        </div>
    </div>

@endsection