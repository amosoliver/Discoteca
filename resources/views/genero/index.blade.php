@extends('layout.modal')
@extends('layout.default')
@section('main')

    <div class="container border mt-5 ">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{$title}}</h1>
                </div>
                <br>
            </div>
        </div>
        <div class="container-fluid-center mb-6 mx-3 mt-3 pb-5">
            <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 row-cols-sm-2 ">
                @foreach($genero as $gen)
                    <div class="col">
                        <div class="card">
                            <h5 class="card-title text-center">
                                <a href=""
                                   data-toggle="modal" data-target="#myModal" data-id="{{$gen->id_genero}}">
                                    {{$gen->ds_genero}}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $('#myModal').on('show.bs.modal', function (event) {
            var link = $(event.relatedTarget);
            var genreId = link.data('id');
            $('#genre-id').text(genreId);
        });
    </script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">O que deseja ver do genero <span
                            id="#genre-id"></span>
                    </h4>
                </div>
                <div class="modal-body">
                    <button type="button" onclick="window.location='{{ route('artista.index',[])}}'">
                        Artista
                    </button>
                    <button type="button" onclick="window.location='{{ route('disco.index')}}'">
                        Disco
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
@endsection
