sassasa

@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
 {<div class="alert alert-success alert-dismissible" rote="alert">
   { Session::get('mensaje')}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
</div>
   }
@endif

<a data-bs-toggle="modal" data-bs-target="#nuevoregistro"  class="btn btn-success"> Registrar Nuevo Empleado </a>
<br>


<table class="table table-light">
  <thead>
   <tr>
    <th>Nro</th>
    <th>Foto</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Correo</th>
    <th>Aciones</th>
   </tr>
  </thead>
  <tbody>
   @foreach($empleados  as $empleado)
      <tr>
        <td>{{ $empleado->id }}</td>
        <td>
        <img src="{{ asset('storage').'/'.$empleado->Foto}}" width="100" att="">
        </td>

        <td>{{ $empleado->nombre }}</td>
        <td>{{ $empleado->ApellidoPaterno }}</td>
        <td>{{ $empleado->ApellidoMaterno }}</td>
        <td>{{ $empleado->Correo }}</td>
        <td>
        <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">
          Editar
        </a>
        |
         <form action="{{ url('/empleado/'.$empleado->id )}}" method="post" class="d-inline">
         @csrf
         {{method_field('DELETE')}}
         <input class="btn btn-danger" type="submit"onclick="return confirm('Quieres Borrar?')" value="Borrar">
         </form>
         </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!!$empleados->links()!!}
</div>
<!-- modal -->
<div class="modal fade" id="nuevoregistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Empleado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 30px 10px;">
            @include('empleado.form')
        </div>

      </div>
    </div>
</div>
@endsection
