<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route('administrador.xml')}}">
        @csrf
        <input type="text" name="nombre">
        <input type="text" name="apellido">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>