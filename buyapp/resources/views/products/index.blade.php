<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Lista Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Lista De Productos</h1>
    <div class="row float-right" style="margin-bottom: 2px;">

        <a href="/products/search" class="btn btn-primary">
            Buscar
        </a>

    </div>

    <div class="row float-right" style="margin: 0px 30px;">

        <a href="/providers/create" class="btn btn-success">
            Proveedores
        </a>

    </div>
    <div class="row float-right" style="margin: 0px 10px;">

        <a href="/products/create" class="btn btn-primary">
            Crear Producto
        </a>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Cantidad</th>
            <th>Stock</th>
            <th>Precio Unitario</th>
            <th>Description</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Foto</th>
            <th>Proveedor</th>

            <th></th>
            <th></th>

        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->cantidad}}</td>
                <td>{{$p->stock}}</td>
                <td>{{$p->unit_price}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->city}}</td>
                <td>{{$p->country}}</td>
                <td>
                    <img src="{{asset('storage').'/'.$p->foto}}" alt="" width="200">

                </td>
                <td>{{$p->provider->name}}</td>
                <td><a href="/products/{{$p->id}}/edit" class="btn btn-warning">
                         Editar
                     </a> </td>
            <td>
                    <form action="/products/{{$p->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" name="eliminar" class="btn btn-danger" value="eliminar">
                    </form>
            </td>
            </tr>
        @endforeach
    </table>
</div>

</body>
</html>
