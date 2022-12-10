<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>





<?php
   include_once('busqueda.php');
    ?>    
      <title>Niños Y Juguetes</title>
    </head>
    <body class="my-5 m-5">
       
        <table class="table table-striped-columns">
            
            <thead>
                <tr>
                    <th>NOMBRE NIÑO</th>
                    <th>APELLIDOS NIÑO</th>
                    <th>NOMBRE JUGUETE</th>
                </tr>
            </thead>
            <tbody>
<?php
            $id = $_POST['ninos'];
           
            $busqueda = new busqueda();
            $buscar = $busqueda->mostrarCatalogo1($id);
            while($fila=$buscar->fetch_assoc()){
?>
            <tr>
                <td><?php echo $fila['nombreNino']; ?></td>
                <td><?php echo $fila['apellidoNino']; ?></td>
                <td><?php echo $fila['nombreJuguete']; ?></td>            
            </tr>
<?php
            }
?>                
            </tbody>
        </table>

        <form action="ninoJuguete.php" method="POST">
 
 <label for="name">ID JUGUETE </label>
 <input type="text" id="name" name="idJuguete">
 <button type="submit" name="enviar">Añadir</button>
 
</form>
<br>


 <?php 




?>


        <br><br><a href="index.html"><button  class="btn btn-outline-dark" type="button">Volver al Inicio</button>
</body>
</html>