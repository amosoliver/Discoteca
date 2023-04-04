@extends('layout.css')
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$disco->ds_disco}}</h1>
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
                            Titulo
                        </th>
                        <th width="300">
                            Ano
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$disco->ds_disco}}
                        </td>
                        <td>
                            {{$disco->ano}}
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
                            <th width="100">
                                <h3>Faixas</h3>
                            </th>
                        </tr>
                            <thead>

                            <tr>
                                <th width="100">
                                  Titulo
                                </th>
                            </tr>
                                <button type="button" onclick="window.location='{{ route('musica.create',$disco->id_disco) }}'">
                                    ADICIONAR
                                </button>

                            </thead>
                    </thead>
                    <tbody>
                    @foreach($disco->musica as $musica)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                            <td>
                                {{$musica->ds_musica}}
                            </td>
                    <td>
                        <button type="button" onclick="window.location='{{ route('musica.edit',$musica->id_musica) }}'">
                            EDITAR
                        </button>
                    </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>



