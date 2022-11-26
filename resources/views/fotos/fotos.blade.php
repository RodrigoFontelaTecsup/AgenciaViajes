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

            #form-register {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 1.3em;
            }

            #contenedor {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 20px;
            }
        </style>
        <div class="album py-3 bg-light">
            <div id="contenedor" class="container">
                <form id="form-register" action="{{ route('subirFoto') }}" method="POST" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <label for="staticEmail2">Registrar viaje</label>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Destino</label>
                        <input style="font-size: 1em;" id="placeholder" type="text" class="form-control" name="destino"
                            placeholder="Ingrese destino de viaje">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Precio</label>
                        <input style="font-size: 1em;" id="placeholder" type="number" class="form-control" name="precio"
                            placeholder="Precio del viaje">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cantidad de viajeros</label>
                        <input style="font-size: 1em;" id="placeholder" type="number" class="form-control" name="persona"
                            placeholder="Numero de aventureros">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dias de estancia</label>
                        <input style="font-size: 1em;" id="placeholder" type="text" class="form-control" name="dias"
                            placeholder="Ingrese los dias">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Descripcion</label>
                        <input style="font-size: 1em;" id="placeholder" type="text" class="form-control" name="descripcion"
                            placeholder="Agregue una descripcion">
                    </div>
                    <div class="col-auto">
                        <input style="font-size: 1em;" id="placeholder" class="form-control" type="file" name="foto">
                    </div>
                    <div class="col-auto">
                        <button style="font-size: 1em;" type="submit" class="btn btn-primary mb-3">Subir</button>
                    </div>
                </form>
                <br>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($fotos as $foto)
                        <div class="col">
                            <div class="card shadow-sm">
                                <h3 style="text-align: center; text-decoration: underline;">{{ $foto->destino }}</h3>
                                <img height="200" src="/foto/{{ $foto->ruta }}" alt="Imagen">
                                <div class="card-body"">
                                    <p class="card-text">Precio (dolares):$ {{ $foto->precio }}</p>
                                    <p class="card-text">Precio (soles): S/{{ $foto->precio / 4 }}</p>
                                    <p class="card-text">Num de viajeros: {{ $foto->persona }}</p>
                                    <p class="card-text">Dias de estancia: {{ $foto->dias }}</p>
                                    <p class="card-text">Descripcion: {{ $foto->descripcion }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form method="POST" action="{{ route('eliminarFoto') }}">
                                            @csrf
                                            <div class="btn-group">
                                                <input type="hidden" name="id_foto" value="{{ $foto->id }}">
                                                <button type="submit" style="font-size: 20px;"
                                                    class="btn btn-sm btn-outline-danger">Eliminar</button>
                                            </div>
                                        </form>
                                        <small class="text-muted">{{ $foto->created_at }}</small>
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
