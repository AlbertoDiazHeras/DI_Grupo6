@extends('admin.layout')
@section('content')
<p>ELIMINAR ARTÍCULO</p>
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que deseas eliminar el registro {{$id}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger"><a href="{{route('articulo.borrar',$id)}}">Borrar</a></button>
      </div>
    </div>
  </div>
</div>
@stop