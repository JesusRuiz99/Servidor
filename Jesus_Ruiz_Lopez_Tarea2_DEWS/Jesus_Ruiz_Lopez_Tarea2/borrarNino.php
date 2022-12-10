<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<link rel="stylesheet" href="index.css">
    
    <title>Borrar</title>
</head>
<body>

    <h1>Eliminar un Niño</h1>

<form action="borrarNino.php" method="POST">
 
    <p>Introduzca la ID del niño a eliminar</p>
    <label for="idNino">ID NIÑO </label>
    <input type="number" id="idNino" name="idNino">
    <button class="btn btn-dark" type="submit" name="eliminar">Ejecutar</button>
    
</form>

<?php

include('ninos.php');
 
$ninos = new nino();
$borrar = $ninos->borrarNino();


?>


</body>
</html>

