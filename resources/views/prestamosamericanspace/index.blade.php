@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Préstamos de salas de American Space</h1>
    <!-- boton que muestra el modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Prestar
        </button>
    </div>
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">buscar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('Prestamosspace.showspace', '1') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Buscar Usuario externo</label>
                        <input type="text" class="form-control" id="Nit" name="Nit" placeholder="Ingresar NIT">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="margin-right:10px;">Buscar usuario</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
    <!-- Código para la tabla que muestra los préstamos de espacio -->
    <div class="table-responsive">
        <table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col"># de Mesa</th>
                    <th scope="col"># de Puesto</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Institución</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Hora de Entrada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Prestamosspace::all() as $prestamo)
                <tr>
                    <td>{{ $prestamo->mesa }}</td>
                    <td>{{ $prestamo->puesto }}</td>
                    <td>{{ $prestamo->nit }}</td>
                    <td>{{ $prestamo->nombre }}</td>
                    <td>{{ $prestamo->institucion }}</td>
                    <td>{{ $prestamo->tipo }}</td>
                    <td>{{ $prestamo->hora_entrada }}</td>
                    <!-- Agrega las columnas restantes -->
                    <td>
                    <a href="{{ route('liberar.space', ['id' => $prestamo->id]) }}" class="btn btn-info">Liberar</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection