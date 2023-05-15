




@extends('layout.default')

@section('main')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="container-fluid mt-2 ml-3 mr-3">
        <div class="d-flex justify-content-end">

    </div>
    <div class="container-fluid-center mb-6 mx-3 mt-3 pb-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-lg-4 row-cols-xl-6 row-cols-xxl-6 row-cols-sm-2 ">
            @foreach($disco as $disc)
                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($disc->imagem) }}" alt="Imagem do Card" style="height: 200px;">
                        <div class="card-body" style="min-height: 140px">
                            <h5 class="card-title"><a href="{{ route('disco.show', $disc->id_disco) }}">{{ $disc->ds_disco }}</a></h5>
                            <h6 class="card-subtitle mb-2">{{ $disc->ano }}</h6>
                            <p class="card-text">{{$disc->artista->ds_artista}}</p>
                        </div>

                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

