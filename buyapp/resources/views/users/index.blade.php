<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Usuarios</title>
</head>
<body>
<div class="container">
    <h1>Lista De Usuarios</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>EMAIL</th>
        </tr>
        @foreach($users as $u)
            <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->firt_name}}</td>
            <td>{{$u->last_name}}</td>
            <td>{{$u->email}}</td>

        </tr>
        @endforeach
    </table>
</div>

</body>
</html>
