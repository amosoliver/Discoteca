@extends('layout.default')
@section('main')

    <div class="gradient-custom">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{$title}}</h1>
                </div>
                <br>
            </div>
        </div>
        {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'genero.store']) }}

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('ds_genero', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                <div class="col-md-4 col-lg-3">
                    {{ Form::text('ds_genero', null, ['class' => 'form-control']) }}
                    {!! $errors->first('ds_genero')!!}
                </div>
            </div>

            <div class="box-footer">
                <br>
                <button type="submit" class="btn btn-primary btn-submit ">Cadastrar</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection




