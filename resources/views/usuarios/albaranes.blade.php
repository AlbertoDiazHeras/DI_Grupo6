@extends('usuarios.layout')

@section('content')
<h1>
  Albaranes
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Número de pedido</th>
      <th scope="col">Numero de albarán</th>
      <th scope="col">Fecha de emisión</th>
    </tr>
  </thead>
  <tbody>
    @foreach($albaranes as $albaran)
    <tr>
      <td>{{$albaran->order_id}}</td>
      <td>{{$albaran->num}}</td>
      <td>{{$albaran->issue_date}}</th>

    </tr>
    @endforeach
  </tbody>
</table>
@stop