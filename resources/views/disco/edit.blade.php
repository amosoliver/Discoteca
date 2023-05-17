@extends('layout.default')
@section('main')
< <div class="container border mt-5 ">
    <div class="box mt-2">
        <div class="box-header">
            <div class="box-title">
                <h1>{{ $title }}</h1>
            </div>
            <br>
        </div>
        <form action="{{ route('disco.destroy', $disco->id_artista) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-submit justify-text-center">EXCLUIR</button>
        </form>
    </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::model($disco, ['method' => 'PATCH', 'route' => ['disco.update',$disco->id_disco]]) !!}
                {{ Form::label('ds_disco', 'Nome') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ds_disco',$disco->ds_disco , ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('ano', 'Ano') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ano',$disco->ano , ['autofocus']) }}
                </div>
            </div>
           {{Form::hidden('id_artista',request('id_artista'))}}
           {{Form::hidden('id_genero',request('id_genero'))}}
            <br>
            <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-submit">SALVAR ALTERAÇÕES</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection


