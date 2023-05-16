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
            <form id="genreForm" action="{{ route('artista.index') }}">
                @csrf
                <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 row-cols-sm-2">
                    @foreach($genero as $gen)
                        <div class="col">
                            <div class="card">
                                <h5 class="card-title justify-content-between">
                                    <label class="justify-content-end">
                                        <input type="checkbox" name="id_genero[]" value="{{ $gen->id_genero }}">
                                        {{ $gen->ds_genero }}
                                    </label>
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submeter
                    </button>
                </div>
            </form>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">O que deseja ver dos gêneros selecionados:</h4>
                    </div>
                    <div class="modal-body text-center">
                        <button type="button" class="btn btn-primary btn-block" onclick="redirectToArtista()">
                            Artista
                        </button>
                        <button type="button" class="btn btn-primary btn-block" onclick="redirectToDisco()">
                            Disco
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function redirectToArtista() {
                redirectToRoute('artista.index');
            }

            function redirectToDisco() {
                redirectToRoute('disco.index');
            }

            function redirectToRoute(route) {
                var genreIds = [];
                $('input[name="id_genero[]"]:checked').each(function() {
                    genreIds.push($(this).val());
                });

                // Construir a URL da rota com os parâmetros
                var url;
                if (route === 'artista.index') {
                    url = '{{ route('artista.index', ['id_genero' => 'GENRE_IDS']) }}';
                } else if (route === 'disco.index') {
                    url = '{{ route('disco.index', ['id_genero' => 'GENRE_IDS']) }}';
                }
                url = url.replace('GENRE_IDS', genreIds.join(','));

                // Redirecionar para a URL
                window.location.href = url;
            }

        </script>

@endsection
