
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    
    <title>Modificar</title>
</head>
<body>

    <h1>Modificar un Niño</h1>

<form action="modificarNino.php" method="POST">
    <label for="name">ID del niño a modificar </label>
    <input type="text" id="name" name="idNino"><br>
    <label for="name">Nombre </label>
    <input type="text" id="name" name="nombreNino">
    <label for="name">Apellido </label>
    <input type="text" id="name" name="apellidoNino">
    <label for="fecha">Fecha Nacimiento </label>
    <input type="text" id="fecha" name="fechaNacimiento">
    <label for="bueno">¿Ha sido bueno?</label>
    <input type="text" id="bueno" name="bueno">
    <button class="btn btn-dark" type="submit" name="actualizar">Actualizar</button>
    
</form>
<?php

 
include('ninos.php');
 
    $ninos = new nino();
    $modificar = $ninos->modificarNino();


?>
    
</body>
</html>
