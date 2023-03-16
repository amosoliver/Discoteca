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
        <div class="form-group">
            {{ Form::label('ds_disco', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ds_disco', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_disco')!!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ano', 'Ano', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ano', null, ['class' => 'form-control']) }}
                {!! $errors->first('ano')!!}
            </div>
        </div>
            {!! Form::model($artistas, ['method' => 'PATCH', 'route' => ['disco.create', request('id_artista')]]) !!}
        <div class="form-group">
            {{ Form::label('id_genero', 'Genero', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-7 col-lg-7">
                {{ Form::select('id_genero',$generos)}}
                {!! $errors->first('id_genero')!!}
            </div>
            {{ Form::close() }}
        </div>
        <div class="form-group">
            {{ Form::label('id_artista', 'Artista', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-7 col-lg-7">
                {{ Form::select('id_artista',$artistas)}}
                {!! $errors->first('id_artista')!!}
            </div>
        </div>
        {{ Form::close() }}

    </div>

    <div class="box-footer">
        <br>
        <button type="submit" class="btn btn-primary btn-submit ">Cadastrar</button>
    </div>
    {{ Form::close() }}
</div>




