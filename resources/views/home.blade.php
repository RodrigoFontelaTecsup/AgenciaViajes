@extends('layouts.app')

@section('content')
    <main>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            #promociones {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                text-decoration: underline;
            }
            #card-trip {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 1.5em;
            }

        </style>

        <h1 id="promociones">ULTIMAS PROMOCIONES !</h1>
        <!-- Modal gallery -->
        <section class="">
            <!-- Section: Images -->
            <section class="">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                            <img src="http://www.griceltravel.com/wp-content/uploads/2016/09/5.jpg" class="w-100" />
                            <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                            <img src="http://www.griceltravel.com/wp-content/uploads/2022/04/6-1.jpg" class="w-100" />
                            <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                            <img src="https://i.pinimg.com/originals/20/b3/d6/20b3d6d6e810cadb25eae7697776a58c.jpg" class="w-100" />
                            <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        <hr>
            <h1 style="text-align: center;">VIAJES AÑADIDOS!</h1>
            {{-- ALBUMS DE VIAJES --}}
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($fotos as $foto)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <br>
                                    <h3 style="text-align: center; text-decoration: underline; font-weight: 900">{{ $foto->destino }}</h3>
                                    <img height="200" src="/foto/{{ $foto->ruta }}" alt="Imagen">
                                    <div class="card-body" id="card-trip">
                                        <p class="card-text">Precio (dolares): ${{ $foto->precio }}</p>
                                        <p class="card-text">Precio (soles):  S/{{ ($foto->precio)/4 }}</p>
                                        <p class="card-text">Num de viajeros: {{ $foto->persona }}</p>
                                        <p class="card-text">Dias de estancia: {{ $foto->dias }}</p>
                                        <p class="card-text">Descripcion: {{ $foto->descripcion }}</p>
                                        <a href="https://htmlcolorcodes.com/es/" target="_blank"><button type="submit" id="button-more">Ver mas...</button></a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <p> <i class="bi bi-chat-dots"></i>
                                                    <button class="btn " type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExample{{ $foto->id }}"
                                                        aria-expanded="false" aria-controls="collapseExample">
                                                        <x-bi-chat class="text-primary" /> {{ count($foto->comentario) }}
                                                    </button>
                                                </p>
                                            </div>
                                            <small class="text-muted">{{ $foto->User->name }}</small>
                                        </div>
                                        <div class="collapse" id="collapseExample{{ $foto->id }}">
                                            @foreach ($foto->comentario as $comentario)
                                                <div class="card card-body">
                                                    {{ $comentario->comentario }}
                                                </div>
                                                <small class="text-muted">{{ $comentario->User->name }}</small>
                                            @endforeach
                                            <form method="POST" action="{{ route('subirComentario') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="mt-2 row g-3">
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="comentario"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Ingrese su comentario">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="hidden" name="id_foto"
                                                                value="{{ $foto->id }}">
                                                            <button type="submit" class="btn btn-primary">
                                                                <x-bi-send />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </main>

@endsection
