@section('content')
<!-- modal -->
<div class="modal fade" id="nuevoregistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Empleado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 30px 10px;">
          <form action="{{ url('/empleado') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="Nombre" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="Nombre" name="Nombre" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ApellidoPaterno" class="col-form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="ApellidoPaterno" name="ApellidoPaterno">
                </div>
                <div class="form-group col-md-6">
                    <label for="ApellidoMaterno" class="col-form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="ApellidoMaterno" name="ApellidoMaterno">
                </div>
            </div>
            <div class="mb-3">
              <label for="Correo" class="col-form-label">Correo</label>
              <input type="text" class="form-control" id="Correo" name="Correo" required>
            </div>
            <div class="mb-3">
                <label for="Foto" class="col-form-label">Foto</label>
                <<input type="text" class="form-control" id="Foto" name="Foto" >
            </div>
            <div class="modal-footer" >
                <button type="submit" class="btn btn-danger btn-raised btn-xs" style="margin-bottom: 15px;" data-bs-dismiss="modal" > Cancelar  </button>
                <button type="submit" class="btn btn-success btn-raised btn-xs" style="margin-bottom: 15px;"> Registadddddddr </button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>
@endsection
