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
                @foreach($genero as $gen)
                    <tr>
                        <td>
                            {{$gen->id_genero}}
                        </td>
                        <td>
                            <a href="#"
                               data-toggle="modal" data-target="#myModal">
                            {{$gen->ds_genero}}
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Título do modal</h4>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do modal -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>






