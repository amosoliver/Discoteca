@extends('layout.default')
@section('main')

    <div class="jumbotron bg-dark " style="height: 250px">
        <div class="row">
            <div class="col-md-2 mb-3 mt-3">
                <div style="padding-left: 20px;">
                    <img src="{{ $base64Images[$artista->id_artista] }}" alt="Imagem do artista"
                         class="img-fluid rounded border" style="height: 200px; width: 200px;">
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
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                      git add .

                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{$disco->ds_disco}}
                            </td>
                            <td>
                                {{$disco->ano}}
                            </td>
                            <td>
                                <img src="{{ $base64Images[$disco->id_disco] }}" alt="Imagem do artista">

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

@endsection

