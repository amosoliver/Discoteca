@php use Illuminate\Support\Str; @endphp
@extends('layout.default')

@section('main')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


<<<<<<< HEAD
<div class="container-fluid mt-4">
    <div class="row row-cols-2 row-cols-md-3 g-4 row-cols-lg-6">
            @foreach($artista as $art)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($art->imagem) }}" alt="Imagem do Card"
                         style="height: 200px;">
                    <div class="card-body" style="min-height: 140px">
                        <h5 class="card-title"><a href="{{ route('artista.show', $art->id_artista) }}">
                                {{$art->ds_artista}}</a></h5>
                        <p class="card-text">{{ Str::limit($art->historia) }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
=======
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-deck d-flex flex-wrap">
                @foreach($artista as $art)
                    <div class="card text-dark col-md-12 col-lg-3 mb-3 mb-md-4 mx-3">
                        <img class="card-img-top img-fluid" src="{{ asset($art->imagem) }}" alt="Imagem do Card">
                        <div class="card-body">
                            <h5 class="card-title">{{$art->ds_artista}}</h5>
                            <p class="card-text">{{$art->historia}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
>>>>>>> 5f890194309fc8973c1aa5c876b8558f958b5973
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection


