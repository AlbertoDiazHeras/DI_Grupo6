@extends('usuarios.layout')

@section('content')
<h1>
  Pedidos
</h1>
<table class="table">
  <thead>
    <tr>
      <th>Número de pedido</th>
      <th>Fecha pedido</th>
      <th>Empresa de origen</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pedidos as $pedido)
    <tr>
      <td>{{$pedido->num}}</td>
      <td>{{$pedido->issue_date}}</td>
      <td>{{$pedido->OrigenCompania->name}}</td>th>
    </tr>
    @endforeach
  </tbody>
</table>
@stop