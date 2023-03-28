@extends('layout.css')
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
                <h1>{{ $title }}</h1>
            </div>
            <br>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th width="100">
                            Artista
                        </th>
                        <th width="300">
                            História
                        </th>
                        <th>
                            <button type="button" onclick="window.location='{{ route('artista.create') }}'">
                                ADICIONAR
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artista as $art)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td width="300">
                                <div class="botton">
                                    <a href="{{route('artista.show',['id_artista' => $art->id_artista])}}">
                                        {{$art->ds_artista}}
                                    </a>
                                </div>
                            </td>
                            <td width="1490">
                                {{$art->historia}}
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#myModal" data-id="{{$art->id_artista}}"> EDITAR</button>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idArtista = button.data('id');
        $('#genre-id').text(idArtista);
        $('#id_artista').val(idArtista);
    });

</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">O que deseja ver do genero <span id="genre-id"></span></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::model($artista, ['method' => 'PATCH', 'route' => ['artista.update', $idArtista], 'class' => 'form-horizontal']) !!}
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
                {{ Form::hidden('id_artista', null, ['id' => 'id_artista']) }}
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
