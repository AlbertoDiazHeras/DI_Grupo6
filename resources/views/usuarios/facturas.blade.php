@extends('usuarios.layout')

@section('content')
<h1>
  Facturas
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Número de albaran</th>
      <th scope="col">Numero de factura</th>
      <th scope="col">Fecha de emisión</th>
    </tr>
  </thead>
  <tbody>
    @foreach($facturas as $factura)
    <tr>
      <td>{{$factura->delivery_note_id}}</td>
      <td>{{$factura->num}}</td>
      <td>{{$factura->issue_date}}</th>

    </tr>
    @endforeach
  </tbody>
</table>
@stop