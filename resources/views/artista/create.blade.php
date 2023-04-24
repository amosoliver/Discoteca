@extends('layout.css')
@extends('layout.js')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@extends('layout.navbar')
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <br>
        </div>
    </div>
    {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'artista.store',
    'enctype' => 'multipart/form-data']) }}

    <div class="box-body">
        <div class="form-group">
            {{ Form::label('id_genero', 'Genero', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-7 col-lg-7">
                {{ Form::select('id_genero',$generos)}}
                {!! $errors->first('id_genero')!!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ds_artista', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ds_artista', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_artista')!!}
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
            {!! Form::label('imagem', 'Imagem') !!}
            {!! Form::file('imagem', ['class' => 'form-control']) !!}
        </div>

    </div>
        <div class="box-footer">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">Cadastrar</button>
        </div>
        {{ Form::close() }}
    </div>

</div>



