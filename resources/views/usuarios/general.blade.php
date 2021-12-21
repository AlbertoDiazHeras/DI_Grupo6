<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ficha de Empresa</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="5">Ficha de empresa</th>
                    <th>Código</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="5">Logotipo</td>
                    <td>Nombre</td>
                    <td colspan="4">{{$company->name}}</td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td colspan="4">{{$company->address}}</td>
                </tr>
                <tr>
                    <td>Población</td>
                    <td>{{$company->city}}</td>
                    <td>CIF/DNI</td>
                    <td colspan="2">{{$company->cif}}</td>                    
                </tr>
                <tr>
                    <td colspan="2">Persona de Contacto: </td>
                    <td colspan="3">Cargo: </td>
                </tr>
                <tr>
                    <td colspan="2">Correo electrónico: {{$company->email}}</td>
                    <td colspan="3">Teléfono: {{$company->phone}}</td>
                </tr>
                <tr> 
                    <td colspan="3">Plazo de entrega: {{$company->del_term_id}}</td>
                    <td colspan="3">Descuentos: {{$company->discount_id}}</td>
                </tr>
                <tr>
                    <td colspan="6">Portes: {{$company->transport_id}}</td>
                </tr>
                <tr>
                    <td colspan="6">Condiciones de pago: {{$company->payment_term_id}}</td>

                </tr>
                <tr>
                    <td colspan="6">Entidad bancaria: {{$company->bank_entity_id}}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
