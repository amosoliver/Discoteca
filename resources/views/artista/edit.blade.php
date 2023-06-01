@extends('layout.default')
@section('main')
    <div class="container border mt-5 ">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{ $title }}</h1>
                </div>
                <br>
            </div>
            <form action="{{ route('artista.destroy', $artista->id_artista) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-submit justify-text-center">EXCLUIR</button>
            </form>
        </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::model($artista, ['method' => 'PATCH', 'route' => ['artista.update', request('id_artista')]]) !!}
                {{ Form::label('ds_artista', 'Nome') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ds_artista', $artista->ds_artista, ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('historia', 'Historia') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('historia', $artista->historia, ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('id_genero', 'Genero', ['class' => 'control-label col-md-3 col-lg-2']) }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::select('id_genero', $generos) }}
                    {!! $errors->first('id_genero') !!}
                </div>
            </div>
            <br>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">SALVAR ALTERAÇÕES</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
