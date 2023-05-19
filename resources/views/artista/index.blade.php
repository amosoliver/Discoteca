@php use Illuminate\Support\Str; @endphp
@extends('layout.default')

@section('main')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="container-fluid border mt-2 pb-5">
<div class="container-fluid mt-2 ml-3 mr-3">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <div>
                <a href="{{ route('artista.create') }}" class="btn btn-success">Adicionar</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid-center mb-6 mx-3 mt-3 pb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-lg-4 row-cols-xl-6 row-cols-xxl-6 row-cols-sm-2 ">
        @foreach($artista as $art)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($art->imagem) }}" alt="Imagem do Card" style="height: 200px;">
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
</div>

    @endsection

