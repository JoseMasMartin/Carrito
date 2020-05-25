<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Lista Proveedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Lista De Proveedores</h1>

    <div class="row float-right" style="margin: 0px 30px;">

        <a href="/providers/create" class="btn btn-primary">
            Crear Proveedor
        </a>
    </div>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Ubicacion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th></th>
            <th></th>

        </tr>
        @foreach($providers as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->address}}</td>
                <td>{{$p->location}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->email}}</td>
                <td><a href="/providers/{{$p->id}}/edit" class="btn btn-warning">
                        Editar
                    </a> </td>
                <td>
                    <form action="/providers/{{$p->id}}" method="post">
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
