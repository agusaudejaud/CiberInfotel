<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de articulos</title>
    <style>
    
        table{
            border:1 px solid #333;
            width:100%;

        }
        td{
            border:1px solid #333;
            padding:5px;
            text-align:center;
        }
        th{
            background:black;
            color: white;
            text-align:center;
        }
        h2{
            text-align:center;

        }
    </style>
</head>
<body>
    <H2>Listado de Articulos</H2>
    <table>
        <thead>
        <tr>
            <th>Nombre del articulo</th>
            <th>Marca</th>
            <th>Disponibilidad</th>
            <th>Precio venta</th>
            <th>Descripcion</th>
            </tr>
        </thead>
    <tbody>
    @foreach ($articulos as $articulo)
            <tr>
            <td class="text-center">
            {{$articulo->nombre}}
            </td>
            <td class="text-center">
            {{$articulo->nombreMarca}}
            </td>
            <td class="text-center">
            {{$articulo->Stock}}
            </td>
            <td class="text-center">
            {{$articulo->precio_venta}}
            </td>
            <td class="text-center">
            {{$articulo->descripcion}}
            </td>
            </tr>
            @endforeach
    </tbody>
 
    </table>
</body>
</html>