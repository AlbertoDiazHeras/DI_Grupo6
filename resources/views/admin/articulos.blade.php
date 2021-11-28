@extends('admin.layout')
@section('content')
<h1>
  Artículos registrados
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col" colspan="4" style="text-align:center;">Opciones</th>
      <td><button type="button" class="btn btn-success"><a href="{{route('articulo.crear')}}">Crear artículo</a></button></td>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $articulo)
    <tr>
      <th scope="row">{{$articulo->id}}</th>
      <td>{{$articulo->name}}</td>
      <td>{{$articulo->description}}</td>
        <td><button type="button" class="btn btn-danger"><a href="{{route('articulo.borrar',['id' => $articulo->id])}}">Borrar</a></button></td>
        <td><button type="button" class="btn btn-primary"><a href="{{route('articulo.actualizar',['id' => $articulo->id])}}">Actualizar</a></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop