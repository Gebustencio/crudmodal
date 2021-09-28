
<div class="mb-3">
   <label for="nombre" class="col-form-label">Nombre</label>
   <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres"  required>
</div>
 <div class="form-row">
      <div class="form-group col-md-6">
          <label for="ApellidoPaterno" class="col-form-label">Apellido Paterno</label>
          <input type="text" class="form-control" id="ApellidoPaterno" name="ApellidoPaterno" placeholder="ApellidoPaterno" required
          {{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}>
      </div>
      <div class="form-group col-md-6">
          <label for="ApellidoMaterno" class="col-form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="ApellidoMaterno" name="ApellidoMaterno" placeholder="ApellidoMaterno"  required>
      </div>
</div>
<div class="mb-3">
    <label for="Correo" class="col-form-label">Correo</label>
    <input type="email" class="form-control" id="Correo" name="Correo" placeholder="Correo"  required>
</div>
<div class="modal-footer" >
      <button type="submit" class="btn btn-danger btn-raised btn-xs" style="margin-bottom: 15px;" data-bs-dismiss="modal" > Cancelar  </button>
      <button type="submit" class="btn btn-success btn-raised btn-xs" style="margin-bottom: 15px;"> Registar </button>
</div>

