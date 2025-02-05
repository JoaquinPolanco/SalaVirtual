@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Préstamos de Salas de Estudio</h1>
        <!-- boton para abrir el modal -->
    <button type="button" class="custom-button" data-toggle="modal" data-target="#exampleModal">
        Prestar
    </button>
    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Prestar Sala de Estudio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="{{ route('prestamosalas.show', '1') }}" method="GET">
            <div class="form-group">
              <label for="exampleFormControlInput1">Buscar Usuario</label>
              <input type="text" class="form-control" id="carne" name="carne" placeholder="Ingresar carné">
            </div>
          </div>
            <div class="modal-footer">
              <button class="custom-button" style="margin-right:10px;">Buscar</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- tabla para mostrar los datos de peestamos-->
    <div class="table-responsive">
        <table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col"># de Sala</th>
                    <th scope="col"># de Puesto</th>
                    <th scope="col">Carné</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad</th>
                    <th scope="col">Hora De Entrada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamossala as $prestamosala)
                <tr data-id="{{ $prestamosala->id }}">
                    <td>{{$prestamosala->sala}}</td>
                    <td>{{$prestamosala->puesto}}</td>
                    <td>{{$prestamosala->carne }}</td>
                    <td>{{$prestamosala->nombre }}</td>
                    <td>{{$prestamosala->facultad }}</td>
                    <td>{{$prestamosala-> hora_prestamo }}</td>
                    <td>
                        <a href="{{route('liberarsala', ['id'=> $prestamosala->id, 'sala'=>$prestamosala->sala]) }}" class="custom-button">Liberar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
