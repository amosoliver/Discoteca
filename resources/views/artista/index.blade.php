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
                                <button type="button" onclick="window.location='{{ route('artista.edit', $art->id_artista) }}'">
                                    EDITAR
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
