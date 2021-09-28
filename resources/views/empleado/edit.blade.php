@extends('layouts.app')
@section('content')
<!-- modal -->
<div class="modal fade" id="nuevoedit" tabindex="-1" aria-labelledby="nuevoedit" aria-hidden="false">
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

@endsection
