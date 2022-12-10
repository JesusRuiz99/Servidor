<?php


//Incluimos en require para poder llamar a la clase de conexion
require_once('conexion.php');


class nino extends conexion{
          
    
   //Funcion para mostrar los niños
     public function mostrarTablaNino(){
        
        // Muestra los niños para que salgan ordenados alfabeticamente 
       $sql = "SELECT idNino, nombreNino, apellidoNino, fechaNacimiento, bueno FROM ninos ORDER BY nombreNino";
        
         return $this->conexion->query($sql);
     }
    
    //Funcion para mostrar por id
    public function select($id){ 

        if(!empty($id)){

           //Muestra todos los datods de la tabla niño cuando coincide por la id;
            $sql= "SELECT * FROM ninos WHERE idNino=" .$id;
            

            $resultado=$this->conexion->query($sql);
            if($resultado->num_rows){
                return $resultado->fetch_assoc();
            }
           }else{
               return 0;
           }
       }

       //Funcion para añadir un Niño nuevo
       public function insertarNino(){

       
        if(isset($_POST['enviar'])){
       
            //Recoge los valores que hemos introducido en el formulario y obligamos a rellenar los campos
            if(strlen($_POST['nombreNino']) >= 1 && strlen($_POST['apellidoNino']) >= 1 &&
            strlen($_POST['fechaNacimiento']) >= 1 && strlen($_POST['bueno']) >= 1){
                
                $nombreNino = trim($_POST['nombreNino']);
                $apellidoNino = trim($_POST['apellidoNino']);
                $fechaNacimiento = trim($_POST['fechaNacimiento']);
                $bueno = trim($_POST['bueno']);
                //Hacemos la consulta para insertar los nuevos datos de los niños
                $sql = "INSERT INTO ninos(nombreNino, apellidoNino, fechaNacimiento, bueno) 
                VALUES ('$nombreNino','$apellidoNino','$fechaNacimiento','$bueno')";
               
               //Llamamos a la clase conexion para acceder a la base de datos
               $conex = new conexion();
               $conex = $conex->__construct(); 
                $sql = mysqli_query($conex, $sql);
                if($sql){
                    ?>
                    <p>Se ha registrado correctamente</p>   
                    <a href="ninos.php"><button class="btn btn-dark"  type="button">Actualizar Tabla</button>             
                    <?php
                }else{
                    ?>
                    <p>No se ha registrado correctamente</p>
                    <?php
                }
        }else{
            ?>
            <h2>Complete todos los campos</h2>
            <?php
    
        }
    
     }

    }
    //Funcion para borrar un Niño nuevo
    public function borrarNino(){
        
      
        if(isset($_POST['eliminar'])){
         //Recoge los valores que hemos introducido en el formulario y obligamos a rellenar los campos
            if(strlen($_POST['idNino']) >= 1){
    
                $idNino = trim($_POST['idNino']);
                 //Hacemos la consulta para borrar los datos de los niños
               $sql = "DELETE FROM ninos where idNino = ('$idNino')";
                //Llamamos a la clase conexion para acceder a la base de datos
               $conex = new conexion();
               $conex = $conex->__construct(); 
                $sql = mysqli_query($conex, $sql);
                if($sql){
                    ?>
                    <p>Se ha borrado correctamente</p> 
                    <a href="ninos.php"><button class="btn btn-dark"  type="button">Actualizar Tabla</button>               
                    <?php
                }else{
                    ?>
                    <p>No se ha borrado correctamente</p>
                    <?php
                }
        }else{
            ?>
            <h2>Complete todos los campos</h2>
            <?php
    
        }
       
     }

    }
    //Funcion para modificar un Niño 
    public function modificarNino(){
        
        if(isset($_POST['actualizar'])){
         //Recoge los valores que hemos introducido en el formulario, con strlen obligamos a rellenar los campos
            if(strlen($_POST['nombreNino']) >= 1 && strlen($_POST['apellidoNino']) >= 1 &&
            strlen($_POST['fechaNacimiento']) >= 1 && strlen($_POST['bueno']) >= 1 && strlen($_POST['idNino']) >= 1){
        
                $nombreNino = trim($_POST['nombreNino']);
                $apellidoNino = trim($_POST['apellidoNino']);
                $fechaNacimiento = trim($_POST['fechaNacimiento']);
                $bueno = trim($_POST['bueno']);
                $idNino = trim($_POST['idNino']);
                  //Hacemos la consulta para borrar los datos de los niños
                $sql = "UPDATE ninos SET nombreNino ='$nombreNino', apellidoNino= '$apellidoNino',
                fechaNacimiento =' $fechaNacimiento', bueno='$bueno' WHERE idNino = '$idNino'" ;
             //Llamamos a la clase conexion para acceder a la base de datos
               $conex = new conexion();
               $conex = $conex->__construct(); 
                $sql = mysqli_query($conex, $sql);
                if($sql){
                    ?>
                    <p>Se ha actualizado correctamente</p>   
                    <a href="ninos.php"><button class="btn btn-dark" type="button">Actualizar Tabla</button>             
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
        <link rel="stylesheet" href="index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <title>NIÑOS</title>
    </head>
    <body class="mx-5 my-5">
        <h3>DATOS NIÑOS</h3>
        
       <!-- Creamos un una tabla -->
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>BUENO</th>
                </tr>
            </thead>
            <tbody>
<?php       
// Creamos un bucle llamando a la funcion de la clase niño mostrar tabla
            $ninos = new nino();
            $nino = $ninos->mostrarTablaNino();
            while($fila=$nino->fetch_assoc()){
?>

                <!--El bucle  va creando una tabla con cada dato de los niños-->
            <tr>
                <td><?php echo $fila['idNino']; ?></td>
                <td><?php echo $fila['nombreNino']; ?></td>
                <td><?php echo $fila['apellidoNino']; ?></td>
                <td><?php echo $fila['fechaNacimiento']; ?></td>
                <td><?php echo $fila['bueno']; ?></td>
            </tr>
<?php
            }
?>                
            </tbody>
        </table>

<?php
           

?>  <br>
        <!-- Introducimos un par de botones para añadir, modificar o borrar -->
        <a href="anadirNino.php"><button class="btn btn-dark" type="button">Añadir Niño</button>
        <a href="modificarNino.php"><button class="btn btn-dark" type="button">Modificar Niño</button>
        <a href="borrarNino.php"><button class="btn btn-dark" type="button">Borrar Niño</button>
       
        

<br>
            <!-- Boton para volver a la pagina principal -->
   <br><br><a href="index.html"><button class="btn btn-dark" type="button">Volver al Inicio</button>
   
</body>
</html>