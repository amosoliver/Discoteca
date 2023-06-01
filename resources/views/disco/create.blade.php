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
    {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'disco.store',
    'enctype' => 'multipart/form-data']) }}

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('ds_disco', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('ds_disco', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_disco')!!}
         </div>
            <div class="form-group">
                {{ Form::label('ano', 'Ano', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('ano', null, ['class' => 'form-control']) }}
                {!! $errors->first('ano')!!}
            </div>
            <div class="form-group">
                {!! Form::label('imagem', 'Imagem') !!}
                {!! Form::file('imagem', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::model($artista, ['method' => 'POST', 'route' => 'disco.store']) !!}
                {{ Form::label('ds_artista', 'Artista') }}
            </div>
            <div class="form-group">
                {{ Form::select('ds_artista', $artista, ['autofocus']) }}
                {!! Form::hidden('id_artista', intval(request('id_artista'))) !!}
            </div>
            <div class="form-group ">
                {!! Form::model($genero, ['method' => 'POST', 'route' => 'disco.store']) !!}
                {{ Form::label('ds_genero', 'Genero') }}
            </div>
            <div class="form-group">
                    {{ Form::select('ds_artista', $genero, ['autofocus']) }}
                    {!! Form::hidden('id_genero', intval(request('id_genero'))) !!}
                </div>

        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">ADICIONAR</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection
