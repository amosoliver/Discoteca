@extends('layout.css')
@extends('layout.js')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <br>
        </div>
    </div>
    {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'musica.store']) }}

    <div class="box-body">
        <div class="form-group">
            {{ Form::label('ds_musica', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <div class="col-md-4 col-lg-3">
                {{ Form::text('ds_musica', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_musica')!!}
            </div>
        </div>

    <div class="box-footer">
        <br>
        <button type="submit" class="btn btn-primary btn-submit ">Cadastrar</button>
    </div>
    {{ Form::close() }}
    </div>
</div>




