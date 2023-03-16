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
        <div class="box-body">
            <div class="form-group">
                {!! Form::model($artista, ['method' => 'PATCH', 'route' => ['artista.update', request('id_artista')]]) !!}
                {{ Form::label('ds_artista', 'Nome') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ds_artista',$artista->ds_artista , ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('historia', 'Historia') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('historia',$artista->historia , ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('id_genero', 'Genero', ['class' => 'control-label col-md-3 col-lg-2']) }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::select('id_genero',$generos)}}
                    {!! $errors->first('id_genero')!!}
                </div>
            </div>
            <br>
            <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-submit">SALVAR ALTERAÇÕES</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>


