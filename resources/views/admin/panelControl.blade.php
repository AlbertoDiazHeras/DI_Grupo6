@extends('admin.layout')

@section('content')
<h1>
  Usuarios registrados
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Email</th>
      <th scope="col">Creado</th>
      <th scope="col">Activado</th>
      <th scope="col" colspan="4" style="text-align:center;">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->firstname}}</td>
      <td>{{$user->secondname}}</td>
      <th>{{$user->email}}</th>
      <th>{{$user->created_at}}</th>
      <td>{{$user->actived}}</td>
        <td><button type="button" class="btn btn-success"><a href="{{route('admin.activar',['id' => $user->id])}}">Activar</a></button></td>
        <td><button type="button" class="btn btn-warning"><a href="{{route('admin.desactivar',['id' => $user->id])}}">Desactivar</a></button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{route('admin.eliminar',['id' => $user->id])}}">Eliminar</a></button></td>
        <td><button type="button" class="btn btn-primary"><a href="{{route('admin.editar',['id' => $user->id])}}">Editar</a></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop