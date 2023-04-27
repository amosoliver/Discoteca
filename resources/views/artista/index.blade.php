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
    <div class="col-sm-12">
        <div class="card-deck d-flex flex-wrap justify-content-center">
            @foreach($artista as $art)
                <div class="card text-dark col-sm-3 mb-3 mb-4">
                    <img class="card-img-top img-fluid" src="{{ asset($art->imagem) }}" alt="Imagem do Card">
                    <div class="card-body">
                        <h5 class="card-title">{{$art->ds_artista}}</h5>
                        <p class="card-text">{{$art->historia}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>





