@extends('layout.css')
@extends('layout.js')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@include('layout.navbar')

<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{ $title }}</h1>
            </div>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 d-flex justify-content-between flex-wrap no-gutters">
            @foreach($artista as $art)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset($art->imagem) }}"
                             alt="Imagem do Card">
                        <br>
                        <div class="card-deck">
                            <h5 class="card-title">{{$art->ds_artista}}</h5>
                            <br>
                            <p class="card-text">{{$art->historia}}</p>
                        </div>
                        <br>
                        <a href="{{ route('artista.show', ['id_artista' => $art->id_artista ]) }}"
                           class="btn btn-primary">Ver Artista</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



