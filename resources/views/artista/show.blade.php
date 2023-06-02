@extends('layout.default')

@section('main')

    <div class="jumbotron bg-dark">
        <div class="row">
            <div class="col-md-2 mb-3 mt-3">
                <div style="padding-left: 20px;">
                    <img src="{{ $base64Images[$artista->id_artista] }}" alt="Imagem do artista"
                         class="img-fluid rounded border" width="300">
                </div>
            </div>
            <div class="col-md-5">
                <div class="">
                    <h1 class="display-4 text-light mt-5">{{ $artista->ds_artista }}</h1>
                    <div class="text-light mt-2">
                        <p>{{ $artista->historia }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <br>
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <td>
                            <button type="button"
                                    onclick="window.location='{{ route('disco.create', ['id_artista' => $artista->id_artista, 'id_genero' => $artista->id_genero]) }}'">
                                Adicionar
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th width="100">
                            <h3 class="text-center">Discografia</h3>
                        </th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <th width="100">
                            Titulo
                        </th>
                        <th width="300">
                            Ano
                        </th>
                    </tr>
                    <tbody>
                    @forelse($artista->disco as $disco)
                        <tr>
                            <td>
                                <a href="{{ route('disco.show', ['id_disco' => $disco->id_disco]) }}">
                                    {{ $disco->ds_disco }}
                                </a>
                            </td>
                            <td>
                                {{ $disco->ano }}
                            </td>
                            <td>
                                <button type="button"
                                        onclick="window.location='{{ route('disco.edit', [
                                            'id_disco' => $disco->id_disco,
                                            'id_artista' => $disco->id_artista,
                                            'id_genero' => $disco->id_genero,
                                        ]) }}'">EDITAR
                                </button>
                            </td>
                            @empty
                                <td>Não há registros para exibir</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
@endsection
