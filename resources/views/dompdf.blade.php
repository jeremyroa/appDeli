<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            font-size: 18pt;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>TRASTEVERE - RESTAURANT</h1>
    <p>Pedido #{{$pedido->id}}</p>
    <p>Cedula Cliente {{$pedido->dni_cliente}}</p>
    <h1 style="font-size: 14pt">Platos</h1>
    @foreach (json_decode($pedido->id_comidas) as $item)
        <p>{{$item->name_comida}}</p>
        <p>{{$item->cant_pedido_comida}}</p>
        <p>{{$item->price_comida}}</p>
    @endforeach
</body>
</html>