<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Products</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Registrar Productos</h1>
    <div class="container">
    <form method="post" action="/products" class="form-horizontal" id="form_products" enctype="multipart/form-data">
        @csrf

        <div class="col-lg-6">

            <div class="form-group">
                <label for="provider" class="control-label">Proveedor:</label>
                <select type="text" name="provider" id="provider" class="form-control">
                    <option value="">[Seleccione]</option>

                @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="name" class="control-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="cantidad" class="control-label">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="stock" class="control-label">Stock:</label>
                <input type="text" name="stock" id="stock" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="tipo" class="control-label">Tipo:</label>
                <select type="text" name="tipo" id="tipo" class="form-control">
                    <option value="">[Seleccione]</option>
                    <option value="1">Ropa</option>
                    <option value="2">Abarrotes</option>
                    <option value="3">Cosméticos</option>
                    <option value="4">Electrónica</option>
                </select>
            </div>
        </div>


        <div class="col-lg-6">

            <div class="form-group">
                <label for="price" class="control-label">Precio Unitario:</label>
                <input type="numeric"  id="price" name="price" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="description" class="control-label">Descripcion:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="city" class="control-label">Ciudad:</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="country" class="control-label">Pais:</label>
                <input type="text" name="country" id="country" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label for="foto" class="control-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
        </div>
        <input type="submit" name="enviar" id="btn_enviar" value="Guardar" class="btn-success">
    </form>

    </div>
</div>

</body>
</html>
