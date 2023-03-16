@extends('layout.css')
<section class="vh-100 gradient-custom">
    <link rel="stylesheet" href="/public/css/style.css">
    <div class="bg-secondary bg-gradient">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-primary text-white" >
                    <div class="card-body p-5 text-center">
                        <button type="button" onclick="window.location='{{ route('artista.index')}}'">
                            Artistas
                        </button>
                        <button type="button" onclick="window.location='{{ route('disco.index')}}'">
                            Discos
                        </button>
                        <button type="button" onclick="window.location='{{ route('genero.index')}}'">
                            Gêneros
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
