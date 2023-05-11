@php use Illuminate\Support\Str; @endphp
@extends('layout.default')

@section('main')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif



<div class="container-fluid-center mx-3 mt-4">
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

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    @endsection

