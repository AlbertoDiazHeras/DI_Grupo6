@extends('admin.layout')

@section('content')
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
        <td><button type="button" class="btn btn-success"><a href="{{ url('/admin/activar') }}"">Activar</a></button></td>
        <td><button type="button" class="btn btn-warning">Desactivar</button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{ url('/admin/eliminar') }}">Eliminar</a></button></td>
        <td><button type="button" class="btn btn-primary">Editar</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop