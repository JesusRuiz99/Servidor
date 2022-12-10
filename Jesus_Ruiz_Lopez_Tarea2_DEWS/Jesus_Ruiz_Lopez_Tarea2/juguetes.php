<?php
require_once('conexion.php');


class juguete extends conexion{
       
     //Funcion para mostrar los juguetes
     public function mostrarTablaJuguete(){
       
       $sql = "SELECT idJuguete, nombreJuguete, precio, idReyFK FROM juguetes";
       
         return $this->conexion->query($sql);
     }
    
     //Funcion para añadir un Juguete nuevo
       public function insertarJuguete(){

    if(isset($_POST['enviar'])){
               
         //Recoge del formulario, con strlen obligamos a rellenar los campos
        if(strlen($_POST['nombreJuguete']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['reyMago']) >= 1){

            $nombreJuguete = trim($_POST['nombreJuguete']);
            $precio = trim($_POST['precio']);
            $reyMago = trim($_POST['reyMago']);
            //Creamos la sentencia para insertar
            $sql = "INSERT INTO juguetes(nombreJuguete, precio, idReyFK) 
            VALUES ('$nombreJuguete','$precio','$reyMago')";
           //Llamados a la clase conexion
           $conex = new conexion();
           $conex = $conex->__construct(); 
            $sql = mysqli_query($conex, $sql);
            if($sql){
                ?>
                <h2>Se ha registrado correctamente</h2>   
                <a href="juguetes.php"><button class="btn btn-dark"  type="button">Actualizar Tabla</button>             
                <?php
            }else{
                ?>
                <h2>No se ha registrado correctamente</h2>
                <?php
            }
    }else{
        ?>
        <h2>Complete todos los campos</h2>
        <?php

    }

 }
 }
         //Funcion para borrar los juguetes
       public function borrarJuguete(){
        if(isset($_POST['eliminar'])){

              //Recoge el valor del formulario, con strlen obligamos a rellenar los campos
            if(strlen($_POST['idJuguete']) >= 1){
    
                $idJuguete = trim($_POST['idJuguete']);
    
               $sql = "DELETE FROM juguetes where idJuguete = ('$idJuguete')";
    
               $conex = new conexion();
               $conex = $conex->__construct(); 
                $sql = mysqli_query($conex, $sql);
                if($sql){
                    ?>
                    <h2>Se ha borrado correctamente</h2>  
                    <a href="juguetes.php"><button class="btn btn-dark"  type="button">Actualizar Tabla</button>              
                    <?php
                }else{
                    ?>
                    <h2>No se ha borrado correctamente</h2>
                    <?php
                }
        }else{
            ?>
            <h2>Complete todos los campos</h2>
            <?php
    
        }
       
     }
    
       }

       //Funcion para modificar un juguete
      public function modificarJuguete(){

        if(isset($_POST['actualizar'])){
                    
            //Recoge el valor del formulario, con strlen obligamos a rellenar los campos
            if(strlen($_POST['nombreJuguete']) >= 1 && strlen($_POST['precio']) >= 1 &&
            strlen($_POST['idReyFK']) >= 1 &&  strlen($_POST['idJuguete']) >= 1){
                //Guardamos en variables los introducido en el formulario
                $nombreJuguete = trim($_POST['nombreJuguete']);
                $precio = trim($_POST['precio']);
                $idReyFK = trim($_POST['idReyFK']);
                $idJuguete = trim($_POST['idJuguete']);
                $sql = "UPDATE juguetes SET nombreJuguete ='$nombreJuguete', precio= '$precio',
                idReyFK =' $idReyFK' WHERE idJuguete = '$idJuguete'" ;
                //
               $conex = new conexion();
               $conex = $conex->__construct(); 
                $sql = mysqli_query($conex, $sql);
                if($sql){
                    ?>
                    <p>Se ha actualizado correctamente</p>   
                    <a href="juguetes.php"><button class="btn btn-dark" type="button">Actualizar Tabla</button>             
                    <?php
                }else{
                    ?>
                    <p>No se ha actualizado correctamente</p>
                    <?php
                }
        }else{
            ?>
            <h2>Complete todos los campos</h2>
            <?php
        
        }
        
        }



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
        <h3>DATOS JUGUETES</h3>
       
        <table class="table table-striped-columns">
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>Precio</th>
                    <th>REY MAGO</th>
                    <!-- <th></th> -->
                    <!-- <th></th>
                    <th></th> -->
                </tr>
            </thead>
            <tbody>
<?php
            $juguete = new juguete();
            $filas = $juguete->mostrarTablaJuguete();
            while($fila=$filas->fetch_assoc()){
?>
            <tr>
                <td><?php echo $fila['idJuguete']; ?></td>
                <td><?php echo $fila['nombreJuguete']; ?></td>
                <td><?php echo $fila['precio']; ?> €</td>
                <td><?php echo $fila['idReyFK']; ?></td>
               
            </tr>
<?php
            }
?>                
            </tbody>
        </table>


       
<?php
    
          


?>  
    <br><a href="anadirJuguete.php"><button  class="btn btn-dark" type="button">Añadir Juguete</button>
         <a href="modificarJuguete.php"><button  class="btn btn-dark" type="button">Modificar Juguete</button>
        <a href="borrarJuguete.php"><button class="btn btn-dark" type="button">Borrar Juguete</button>
        
        <br>

        

   <br><br><a href="index.html"><button  class="btn btn-dark" type="button">Volver al Inicio</button>
    </body>
</html>