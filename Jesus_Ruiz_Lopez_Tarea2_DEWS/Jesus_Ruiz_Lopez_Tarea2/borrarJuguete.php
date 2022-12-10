<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Borrar</title>
</head>
<body>

    <h1>Eliminar un Juguete</h1>

<form action="borrarJuguete.php" method="POST">
 
    <p>Introduzca la ID del juguete a eliminar</p>
    <label for="idJuguete">ID Juguete </label>
    <input type="number" id="idJuguete" name="idJuguete">
    <button class="btn btn-dark" type="submit" name="eliminar">Ejecutar</button>
    
</form>

<?php
include('juguetes.php');

$juguete = new juguete();
$borrar = $juguete->borrarJuguete();
?>


</body>
</html>

