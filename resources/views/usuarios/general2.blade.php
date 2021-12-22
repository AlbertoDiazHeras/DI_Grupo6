<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Catálogo</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="4">CATÁLOGO de productos de la empresa</th>
                    <th colspan="4">Nombre de la empresa</th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Nombre familia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Peso</th>
                    <th>Tamaño</th>
                </tr>
            </thead>
            <tbody>
            @foreach($productos as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->article_id}}</td>
                    <td>{{$product->company_id}}</td>
                    <td>{{$product->article_description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->color_name}}</td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->size}}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
