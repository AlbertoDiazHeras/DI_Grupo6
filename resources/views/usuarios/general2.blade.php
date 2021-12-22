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
                    <th colspan="4">{{$company->name}}</th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Id Familia</th>
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
                @foreach($articulos as $articulo)
                    @if($product->article_id == $articulo->id)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->family_id}}</td>
                            <td>{{$articulo->name}}</td>
                            <td>{{$articulo->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->color_name}}</td>
                            <td>{{$product->weight}}</td>
                            <td>{{$product->size}}</td> 
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </body>
</html>
