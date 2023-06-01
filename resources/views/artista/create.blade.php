@extends('layout.default')
@section('main')
    <div class="container border mt-5 ">
        <div class="box mt-2">
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
                {{ Form::label('id_genero', 'Gênero', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::select('id_genero', ['' => 'Selecione um gênero'] + $generos, null, ['class' => 'form-select']) }}
                {!! $errors->first('id_genero') !!}
            </div>
            <div class="form-group">
                {{ Form::label('ds_artista', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('ds_artista', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_artista')!!}
            </div>
            <div class="form-group">
                {{ Form::label('historia', 'História', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::textarea('historia', null, ['class' => 'form-control', 'rows' => 4]) }}
                {!! $errors->first('historia')!!}
            </div>

            <div class="form-group">
                {!! Form::label('imagem', 'Imagem',['class' => 'control-label col-md-3 col-lg-2']) !!}
                {!! Form::file('imagem', ['class' => 'form-control']) !!}
            </div>

        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">ADICIONAR</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection




