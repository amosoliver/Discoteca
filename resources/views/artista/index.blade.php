@extends('layout.css')
@extends('layout.js')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@include('layout.navbar')

<div class="container">
    <div class="row">
        @foreach($artista as $art)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-dark">
                    <img class="card-img-top img-fluid" src="{{ asset($art->imagem) }}" alt="Imagem do Card">
                    <div class="card-body">
                        <h5 class="card-title">{{$art->ds_artista}}</h5>
                        <p class="card-text">{{$art->historia}}</p>
                        <a href="{{ route('artista.show', $art->id_artista) }}" class="btn btn-primary">VER ARTISTA</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>






