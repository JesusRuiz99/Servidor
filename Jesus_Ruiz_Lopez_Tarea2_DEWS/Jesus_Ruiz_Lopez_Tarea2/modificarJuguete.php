
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

    <h1>Modificar un Juguete</h1>

<form action="modificarJuguete.php" method="POST">
    <label for="name">ID del juguete a modificar </label>
    <input type="text" id="name" name="idJuguete"><br>
    <label for="name">Nombre </label>
    <input type="text" id="name" name="nombreJuguete">
    <label for="name">precio </label>
    <input type="text" id="name" name="precio">
    <label for="number">Rey mago</label>
    <input type="text" id="fecha" name="idReyFK">
    <button  class="btn btn-dark" type="submit" name="actualizar">Actualizar</button>
    
</form>
<?php

 
include('juguetes.php');
 
    $juguete = new juguete();
    $modificar = $juguete->modificarJuguete();


?>
    
</body>
</html>
