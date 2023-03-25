<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
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
                            Genero
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artista as $art)
                        <tr>
                            <td>
                                {{$art->id_artista}}
                            </td>
                            <td>
                                <a href="{{route('artista.show',$art->id_artista)}}">
                                    {{$art->ds_artista}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






