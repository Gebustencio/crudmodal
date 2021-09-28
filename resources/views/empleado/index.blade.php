@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('notification'))
    <div class="alert alert-success" role="alert">
        {{ session('notification') }}
    </div>
    @endif
    @if(count($errors)>0)
                <div class="alert alert-danger" rote="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> Error: No se registro {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
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
                <a id="id" href="{{ $empleado->id }}" data-bs-toggle="modal" data-bs-target="#edit"  class="btn btn-success">
                        editar
                </a>
                |

                <input class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{$empleado->id }}" value="Eliminar">

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<nav aria-label="...">
    <ul class="pagination">
      <li>{{ $empleados->links() }}</li>
    </ul>
  </nav>

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
            <div class="container">
                <form action="{{ url('empleado') }}" method="post"  >
                 @csrf
                 @include('empleado.form',['modo'=>'Crear']);
                </form>
            </div>
        </div>

      </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabe" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar datos del empleado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 30px 10px;">
            <div class="container">
                <form action=" {{ url('/empleado/'.$empleado->id)}}"  method="post" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PATCH')}}
                 @include('empleado.form',['modo'=>'Editar']);
                </form>

            </div>
        </div>

      </div>
    </div>
</div>

<!-- modal confirmacion -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Estas seguro de eliminar el registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form id ="formDelete" action="{{ url('/empleado/'.'10')}}" data-action="{{ url('/empleado/'.'10')}}" method="post"  >
            @csrf
         {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>

        </div>
      </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var id = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    var action =document.getElementById(formDelete).attr('data-action').$lice(0,-1);
    action+=id;
    document.getElementById(formDelete).attr('action',action);
    console.log(action);
    // Update the modal's content.
    var modalTitle = deleteModal.querySelector('.modal-title')

    modalTitle.textContent = 'Se va a eliminar el registro: ' + id

})
</script>
@endsection
