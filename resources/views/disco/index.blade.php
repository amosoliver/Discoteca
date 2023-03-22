@extends('layout.css')
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
                        <th width="1">
                            #
                        </th>
                        <th>
                            Disco
                        </th>
                        <th>
                            Ano
                        </th>
                        <th>
                            Artista
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($disco as $disc)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$disc->ds_disco}}
                            </td>
                            <td>
                                {{$disc->ano}}
                            </td>
                            <td>
                                {{$disc->artista->ds_artista}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





