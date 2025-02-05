@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Prestar Computadoras</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/guardarpres" method="GET">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carne" class="form-label">Carné</label>
                        <input type="text" id="carne" name="carne" class="form-control" value="{{$usuario->carne}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$usuario->nombre}} {{$usuario->apellido}}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="facultad" class="form-label">Facultad</label>
                        <input type="text" id="facultad" name="facultad" class="form-control" value="{{$usuario->facultad}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="carrera" class="form-label">Carrera</label>
                        <input type="text" id="carrera" name="carrera" class="form-control" value="{{$usuario->carrera}}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Género</label>
                        <input type="text" id="genero" name="genero" class="form-control" value="{{$usuario->genero}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="compu" class="form-label">Computadoras Libres</label>
                        <select id="compu" name="compu" class="form-control" >
                            @foreach($compus as $compu)
                                @if($compu->estado == 0)
                                    <option value="{{ $compu->numero }}">{{ $compu->numero }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="custom-button">Prestar</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('prestamocompu.index') }}" class="custom-button">Regresar a Prestamos</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Espera a que el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');

        // Agrega un evento 'submit' al formulario
        form.addEventListener('submit', function() {
            // Después de enviar el formulario, imprimir la página actual
            window.print();
        });
    });
</script>

<style>
    .custom-button {
        background-color: #9D2720;
        color: #F6C03D;
        border: none;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }
    .custom-button:hover {
        background-color: #F6C03D;
        color: #9D2720;
        transition: 0.3s;
    }
</style>

@endsection