@extends('layout.css')
@extends('layout.js')
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <br>
        </div>
    </div>
    {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'disco.store']) }}

    <div class="box-body">
{{--        <div class="form-group">--}}
{{--            {{ Form::label('id_genero', 'Genero', ['class' => 'control-label col-md-3 col-lg-2']) }}--}}
{{--            <div class="col-md-7 col-lg-7">--}}
{{--                {{ Form::select('id_genero',$artista)}}--}}
{{--                {!! $errors->first('id_genero')!!}--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group">
            {{ Form::label('ds_disco', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ds_disco', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_disco')!!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('historia', 'História', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('historia', null, ['class' => 'form-control']) }}
                {!! $errors->first('historia')!!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ano', 'Ano', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ano', null, ['class' => 'form-control']) }}
                {!! $errors->first('ano')!!}
            </div>
        </div>

    </div>
        <div class="box-footer">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">Cadastrar</button>
        </div>
        {{ Form::close() }}
    </div>

</div>



