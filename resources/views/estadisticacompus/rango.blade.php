@extends('layouts.app')

@section('content')


{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="https://kit.fontawesome.com/b64093b700.css" crossorigin="anonymous">

<div class="py-2">
        
    @include('estadistica.opciones')

    <div class="p-3 ">
      <form method="get" action="/estacompusrango" class="">
        <div class="d-flex flex-row pb-2">
          <div>
            <label for="">Fecha Inicial</label>
            <input type="date" class="form-control" id="inicio" name="inicio" required/>
          </div>
          <div class="pl-3">
            <label for="">Fecha Final</label>
            <input type="date" class="form-control" id="fin" name="fin" required/>
          </div>
        </div>
        <button class="btn btn-primary" style="margin-right:10px;">Buscar</button>
      </form>
    </div>
    <h2 class="text-center">Estadísticas por rango de fechas Préstamos de Computadoras</h2>
    <h3 class="text-center"><?php echo $inicio." - ".$fin ?></h2>
    {{-- <table id="trprestarpc" class="display responsive nowrap" style="width:100%"> --}}
  <div class="table-responsive px-3">
<table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
<thead class="table-dark">
    <tr >
      
     
      <th scope="col">Facultad</th>
      <th scope="col" class="text-center">Registros</th>
      

    </tr>
</thead>
<tbody>
    <?php 
     $facultades = array(
      "ciencias y humanidades",
      "ciencias de la salud",
      "ciencias empresariales",
      "ingenieria y arquitectura",
      "personal unicaes y visitantes"
     );
    ?>
    @foreach ($estacompus as $estacompus)
    <tr data-id="">
        <td>{{$estacompus->facultad}}</td>
        <td class="text-center">{{$estacompus->registros}}</td>
    </tr>
    @endforeach
    <tr>
        <td class="font-weight-bold">TOTAL</td>
        <td class="font-weight-bold text-center">{{$total}}</td>
    </tr>
</tbody>
</table>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://kit.fontawesome.com/b64093b700.js" crossorigin="anonymous"></script> 

<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js" defer></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>








<script src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>



<script>
       

$(document).ready(function() {

  $('#tprestarpc').DataTable( {
    responsive: true
} );



} );
    
    </script>




@endsection