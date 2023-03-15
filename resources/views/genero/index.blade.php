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
                @foreach($genero as $gen)
                    <tr>
                        <td>
                            {{$gen->id_genero}}
                        </td>
                        <td>
                            {{$gen->ds_genero}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>





