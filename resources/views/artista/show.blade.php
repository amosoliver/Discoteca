@extends('layout.css')
@extends('layout.js')
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$artista->ds_artista}}</h1>
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
                            {{$artista->ds_artista}}
                        </td>
                        <td>
                            {{$artista->historia}}
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
                            <button type="button" onclick="window.location='{{ route('disco.create',$artista->id_artista)}}'">
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
                                <a href="{{route('disco.show', ['id_disco' => $disco->id_disco])}}">
                                {{$disco->ds_disco}}
                                </a>
                            </td>
                            <td>
                                {{$disco->ano}}
                            </td>
                        @empty
                            <td>Não há registros para exibir</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>



