<!-- Creamos un html para mostrar el formulario y llamar a la funncion del metodo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="index.css">
    <title>Crear</title>
</head>
<body>

    <h1>Crear Juguete</h1>

<!-- Creamos el formulario -->
<form action="anadirJuguete.php" method="POST">
 
    <label for="name">Nombre </label>
    <input type="text" id="name" name="nombreJuguete">
    <label for="name">Precio </label>
    <input type="text" id="name" name="precio">
    <label for="name">Rey Mago </label>
    <input type="text" id="mago" name="reyMago">
    <button class="btn btn-dark" type="submit" name="enviar">Enviar</button>
    
</form>
<?php
// Incluimos el fichero 
include('juguetes.php');

// Llamamos a la funcion
$juguete = new juguete();
$insertar = $juguete->insertarJuguete();

?>

</body>
</html>

