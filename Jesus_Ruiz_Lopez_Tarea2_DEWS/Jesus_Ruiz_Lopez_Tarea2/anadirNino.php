<!-- Creamos el hmtl -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<link rel="stylesheet" href="index.css">
    <title>Crear</title>
</head>
<body>

    <h1>Crear un Niño</h1>
<!-- Introducimos el formulario -->
<form action="anadirNino.php" method="POST">
 
    <label for="name">Nombre </label>
    <input type="text" id="name" name="nombreNino">
    <label for="name">Apellido </label>
    <input type="text" id="name" name="apellidoNino">
    <label for="fecha">Fecha Nacimiento </label>
    <input type="text" id="fecha" name="fechaNacimiento">
    <label for="bueno">¿Ha sido bueno?</label>
    <input type="text" id="bueno" name="bueno">
    <button class="btn btn-dark" type="submit" name="enviar">Añadir</button>
    
</form>
<?php

include('ninos.php');
 //Llamamos a la funcion
    $ninos = new nino();
    $anadir = $ninos->insertarNino();


?>

       
    
</body>
</html>

