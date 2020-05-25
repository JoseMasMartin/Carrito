<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Buscador</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="navbar-nav mr-sm-2">
           <a id="show_car" class="nav-item nav-link active" href="#">
               <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span id="car">Carrito</span></a>

       </div>
    </div>
</nav>
<div class="container">

    <h1>Buscador de productos</h1>

    <div class="navbar navbar-light bg-light">
        <form class="form-inline">
            <input  name="buscador" class="form-control mr-sm-2" style="width: 150px; height: 25px;" type="search" placeholder="buscar por nombre" aria-label="Search">
            <div class="form-group">
                <label for="tipo" class="control-label" style="margin: 20px;">Tipo:</label>
                <select  type="text" name="tipo" id="tipo" class="form-control">
                    <option value="">[Seleccione]</option>
                    <option value="1">Ropa</option>
                    <option value="2">Abarrotes</option>
                    <option value="3">Cosméticos</option>
                    <option value="4">Electrónica</option>
                </select>
            </div>
            <input  name="ciudad" class="form-control mr-sm-2" style="width: 100px; height: 25px; margin: 10px" type="search" placeholder="buscar por ciudad" aria-label="Search">
            <input  name="pais" class="form-control mr-sm-2" style="width: 100px; height: 25px; margin: 10px" type="search" placeholder="buscar por pais" aria-label="Search">

            <button class="btn btn-success" type="submit" style="margin: 20px;">Search</button>

        </form>
    </div>

@foreach($products as $p)

            <div class="row row-list">

                <div class="col-md-3">
                    <img class="img" src="{{asset('storage').'/'.$p->foto}}">
                </div>
                <div class="col-md-6">
                    <h4 class="country">{{$p->city}}</h4>
                    <h4 class="city">{{$p->country}},</h4>
                    <h2 class="name">{{$p->name}}</h2>
                    <p class="description"> {{$p->description}}</p>
                </div>

                <div class="col-md-3">
                    <div class="col-md-12">
                        <h3>${{$p->unit_price}}</h3>
                    </div>
                    <div class="col-md-12">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        Envio Gratis
                    </div>
                    @if($p->is_new)
                    <div class="col-md-12" style="margin-top: 4px">
                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        Es Nuevo
                    </div>
                    @endif
                    <div class="col-md-12" style="margin-top: 5px;">
                        <input dataproduct="{{$p->id}}" type="button" class=" add_car btn btn-primary btn-block" value="Agregar a Carrito">
                    </div>

                </div>
            </div>

    @endforeach
    </div>
</body>
<script type="text/javascript">
    var products_add=[];
    $(document).ready(function () {
        $('.add_car').on('click',function(){
        products_add.push($(this).data('product'));
        $('span#car').html("Carrito ("+products_add.length+")");
        console.log(products_add);
        })

        $('#show_car').on('click',function () {
            $.ajax({
                  url:'/products/show_car',
                type: 'get',
                dataType: 'json',
                content: 'aplication/json; charset=utf-8',
                data:{'products':products_add},
                async: true,
                success:function (data,textStatus,xhr) {
                },
                error: function (xhr, textStatus, errorThrow) {

                }
                });
        })
    });
</script>

</html>
