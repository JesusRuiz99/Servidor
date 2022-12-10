<?php 
    include ('conexion.php');

    // Creamos la clase reyMago y creamos una funcion por cada rey mago
    class reyMago extends conexion{

       
        public function melchor(){

            // Muestra todos los juegues que reparte Melchor a cada niño
            $sql = "SELECT nombreNino, nombreJuguete, precio, bueno
            FROM ninos INNER JOIN ninoregalo ON idNino = idNinoFK
            INNER JOIN juguetes ON idJugueteFk = idJuguete 
            where idReyFK = 1";
            return $this->conexion->query($sql);

            
        }

        public function gaspar(){
        // Muestra todos los juegues que reparte Gaspar a cada niño
            $sql = "SELECT nombreNino, nombreJuguete, precio , bueno
            FROM ninos INNER JOIN ninoregalo ON idNino = idNinoFK
            INNER JOIN juguetes ON idJugueteFk = idJuguete 
            where idReyFK = 2";
            return $this->conexion->query($sql);

        }

        public function baltasar(){
            // Muestra todos los juegues que reparte Baltasar a cada niño
            $sql = "SELECT nombreNino, nombreJuguete , precio , bueno
            FROM ninos INNER JOIN ninoregalo ON idNino = idNinoFK
            INNER JOIN juguetes ON idJugueteFk = idJuguete 
            where idReyFK = 3"; 
             return $this->conexion->query($sql);

             
        }

        public function carbon(){

            $sql = "SELECT nombreJuguete from juguetes where idJuguete = 2";
            return $this->conexion->query($sql);
        }

        public function precio(){
           $sql = "SELECT precio from juguetes where idJuguete = 2";
            return $this->conexion->query($sql);

        }

        public function precioMelchor(){

            $sql = "SELECT SUM(precio) 
            FROM ninos INNER JOIN ninoregalo ON idNino = idNinoFK
            INNER JOIN juguetes ON idJugueteFK = idJuguete 
            where idReyFK = 1";
            return $this->conexion->query($sql);
          

        }
    }


?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
        <title>JUGUETES</title>
    </head>
    <body class="my-5 m-5">
       
        <table class="table table-striped-columns">  
            <thead>MELCHOR
                <tr>
                    <th>NIÑO</th>
                    <th>JUGUETE</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
<?php
            $rey = new reyMago();
            $filas = $rey->melchor();
            while($fila=$filas->fetch_assoc()){
?>
<!-- Creamos un bulce para que muestre todos los niños y si ha sido bueno o no
En el caso de que hayan sido buenos se muestra el juguete sino sale carbon esto lo repetimos por cada rey -->
            <tr>
                <td><?php echo $fila['nombreNino']; ?></td>
                <td><?php if( $fila['bueno'] == "NO"){
                    echo "Carbon";
                }else{
                    echo $fila['nombreJuguete']; 
                }?></td>
                <!-- Para el precio hacemos lo mismo en este caso el carbon valdria 0 -->
                <td><?php if( $fila['bueno'] == "NO"){
                    echo "0,00";
                }else{
                    echo $fila['precio']; 
                }?>€</td>
            </tr>
<?php
            }
?>                
            </tbody>
        </table>
        <p>PRECIO TOTAL</p>

        <br>
        <table class="table table-striped-columns">  
            <thead>GASPAR
                <tr>
                    <th>NIÑO</th>
                    <th>JUGUETE</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
<?php
            $rey = new reyMago();
            $filas = $rey->gaspar();
            while($fila=$filas->fetch_assoc()){
?>
            <tr>
                <td><?php echo $fila['nombreNino']; ?></td>
                <td><?php if($fila['bueno'] == "NO"){
                    echo  "Carbon";
                }else{
                    echo $fila['nombreJuguete']; 
                }?></td>
                <td><?php if( $fila['bueno'] == "NO"){
                    echo "0,00";
                }else{
                    echo $fila['precio']; 
                }?>€</td>
                
            </tr>
                
<?php
            }
?>                

            </tbody>
        </table>
            <p>PRECIO TOTAL</p>

        <br>
        <table class="table table-striped-columns">  
            <thead>BALTASAR
                <tr>
                    <th>NIÑO</th>
                    <th>JUGUETE</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
<?php
            $rey = new reyMago();
            $filas = $rey->baltasar();
            $filas1 = $rey->carbon();

            $filas2 = $rey->precio();
            while($fila=$filas->fetch_assoc()){
?>
            <tr>
                <td><?php echo $fila['nombreNino']; ?></td>
                <td><?php if($fila['bueno'] == "NO"){
                    echo  "Carbon";
                }else{
                    echo $fila['nombreJuguete']; 
                }?></td>
                <td><?php if( $fila['bueno'] == "NO"){
                    echo "0,00";
                }else{
                    echo $fila['precio']; 
                }?>€</td>
            </tr>
<?php
            }
?>                
            </tbody>
        </table>

       

   <br><br><a href="index.html"><button  class="btn btn-outline-dark" type="button">Volver al Inicio</button>
    </body>
</html>