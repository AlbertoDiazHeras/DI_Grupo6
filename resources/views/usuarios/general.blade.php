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
                    <th>{{$company->id}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="5" align="center"><img src="data:image/jpeg;base64,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" height="100px" width="100px"></img></td>
                    <td><strong>Nombre</strong></td>
                    <td colspan="4">{{$company->name}}</td>
                </tr>
                <tr>
                    <td><strong>Dirección</strong></td>
                    <td colspan="4">{{$company->address}}</td>
                </tr>
                <tr>
                    <td><strong>Población</strong></td>
                    <td>{{$company->city}}</td>
                    <td><strong>CIF/DNI</strong></td>
                    <td colspan="2">{{$company->cif}}</td>                    
                </tr>
                    <tr>
                        <td colspan="2"><strong>Persona de contacto:</strong> {{$usuarioContacto }} </td>
                        <td colspan="3"><strong>Cargo:</strong> Gerente </td>
                    </tr>
                <tr>
                    <td colspan="2"><strong>Correo electrónico:</strong> {{$company->email}}</td>
                    <td colspan="3"><strong>Teléfono:</strong> {{$company->phone}}</td>
                </tr>
                <tr> 
                    <td colspan="3"><strong>Plazo de entrega:</strong> {{$plazo}}</td>
                    <td colspan="3"><strong>Descuento:</strong> {{$descuento}}</td>
                </tr>
                <tr>
                    <td colspan="6"><strong>Portes:</strong> {{$portes}}</td>
                </tr>
                <tr>
                    <td colspan="6"><strong>Condiciones de pago:</strong> {{$condicion}}</td>

                </tr>
                <tr>
                    <td colspan="6"><strong>Entidad bancaria:</strong> {{$banco}}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
