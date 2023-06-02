@extends('layout.default')

@section('main')
    <div class="gradient-custom">
        <div class="box">
            <div class="box-header">

                <div class="jumbotron text-center bg-dark">
                    <div class="row align-items-center">
                        <div class="col-md-3 mb-3 mt-3">
                            <img src="{{ $base64Images[$artista->id_artista] }}" alt="Imagem do artista"
                                class="img-fluid rounded border" width="350">
                        </div>
                        <div class="col-md-2 d-flex align-items-start">
                            <h1 class="display-4 text-light">{{ $artista->ds_artista }}</h1>
                            <div class="row">
                            <div class="text-light">
                                <p>{{ $artista->historia }}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <br>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="100">
                                Artista
                            </th>
                            <th width="300">
                                História
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $artista->ds_artista }}
                            </td>
                            <td>
                                {{ $artista->historia }}
                            </td>
                            <td>
                                <img src="{{ $base64Images[$artista->id_artista] }}" alt="Imagem do artista">

                            </td>

                        </tr>
                    </tbody>
                </table>
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
                                        ]) }}'">EDITAR</button>
                                </td>
                            @empty
                                <td>Não há registros para exibir</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endsection
