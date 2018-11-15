<!DOCTYPE html>
<html lang=&quot;es&quot;>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot; />
    <meta name=&quot;description&quot; content=&quot;Esta Tienda está desarrollada con PrestaShop&quot; />
    <title> Error 401</title>
</head>
<body>
<div class="col-md-12" style="height: 10px">
    <img  style="height:500px; width:auto; padding:50px;  " class="img-responsive center-block" src="{{asset('imagenes/errores/error401.jpg')}}">
    <button class="btn btn-info" style="position:absolute; bottom: -350px;right: 740px;padding: 5px;"> <a href="{{route('home')}}">Regresar a la pagina principal</a>  </button>
    <h4 style="position:absolute; bottom: -400px;right: 740px;padding: 5px;" id=''></h4>

</div>
<script language="JavaScript">

    /* Determinamos el tiempo total en segundos */
    var totalTiempo=7;
    /* Determinamos la url donde redireccionar */
    var url="/home";

    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Redireccionando en "+totalTiempo+" segundos";

        if(totalTiempo==0)
        {
            window.location=url;
        }else{
            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("updateReloj()",1000);
        }
    }

    window.onload=updateReloj;

</script>
</body>
</html>