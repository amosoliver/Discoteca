@extends('layout.default')
@section('main')

    <div class="jumbotron bg-dark " style="height: 250px">
        <div class="row">
            <div class="col-md-2 mb-3 mt-3">
                <div style="padding-left: 20px;">
                    <img src="{{ $base64Images[$disco->id_disco] }}" alt="Imagem do disco"
                         class="img-fluid rounded border" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="col-md-5">
                <div class="">
                    <h1 class="display-4 text-light mt-5">{{ $disco->ds_disco }}</h1>
                    <div class="text-light mt-2">
                        <p class="muted">{{ $disco->ano }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" onclick="window.location='{{ route('musica.create',$disco->id_disco) }}'" class="btn btn-success mt-3 mb-3">
        ADICIONAR
    </button>

        <br>
        <div class="box">
            <div class="box-body">

                <div class="table-responsive">

                    <table class="datatable table table-bordered table-striped ps-2">
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

                            </thead>
                    </thead>
                    <tbody>
                    @foreach($disco->musica as $musica)
                    <tr>
                        <td>

                        </td>
                            <td class="col-md-3">
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

@endsection

