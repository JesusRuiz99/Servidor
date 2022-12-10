
<?php 
    include ('conexion.php');
    
    //Creamos la clase busqueda

    class busqueda extends conexion{
        //funcion con una consulta para mostrar tooos los valores de niño

        function selectall(){

        $sql = "SELECT idNino, nombreNino, apellidoNino, fechaNacimiento, bueno FROM ninos ORDER BY nombreNino";
        return $this->conexion->query($sql);
    
     }

     
    //  Creamos una funcion para mostrar que regalo corresponde a cada niño
        function mostrarCatalogo1($id){
        
                    $sql = "SELECT nombreNino, apellidoNino, nombreJuguete 
                    FROM ninos INNER JOIN ninoregalo ON idNino = idNinoFK
                    INNER JOIN juguetes ON idJugueteFk = idJuguete
                    WHERE idNino = $id";
                   
                   return $this->conexion->query($sql);
                                  
         }

         public function insertar($id){

       
            if(isset($_POST['enviar'])){
           
                //Recoge los valores que hemos introducido en el formulario y obligamos a rellenar los campos
                if(strlen($_POST['idJugueteFK']) >= 1 ){
                    
                    $idJuguete = trim($_POST['idJuguete']);
                    //Hacemos la consulta para insertar los nuevos datos de los niños
                    $sql = "INSERT INTO ninoJuguete(idJugueteFK, idNinoFK) 
                    VALUES ($idJuguete, $id) where idJuguete = ('$idJuguete)" ;
                   
                   //Llamamos a la clase conexion para acceder a la base de datos
                   $conex = new conexion();
                   $conex = $conex->__construct(); 
                    $sql = mysqli_query($conex, $sql);
                    if($sql){
                        ?>
                        <p>Se ha registrado correctamente</p>   
                        <a href="ninos.php"><button type="button">Actualizar Tabla</button>             
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
    
     }

     
    
    ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body class="mx-5 pt-5">

<table>
        <thead>
            <tr>
                <th>
                    <form action="ninoJuguete.php" method="POST">
                        <h2>Nombre del Niño</h2>
                        <br>
                        <label for="busqueda">Seleccionar Niño</label>                    
                    
                      <?php
                       $busqueda = new busqueda();
                        $buscar = $busqueda->selectall();
                        while($valor = mysqli_fetch_array($buscar)){

                        }
                      ?>  
                      <select name="ninos">

<?php 
                        $busqueda = new busqueda();
                        $ninos = $busqueda->selectall();
                        while($valor = mysqli_fetch_array($ninos)){
                            echo '<option value="' .$valor['idNino'].'">' . $valor['nombreNino']. " " .$valor['apellidoNino'].'<option>';
                        }

?>  
                   
                    </select>
                        <input type="submit" value="enviar">
                    </form>            
                </th>
            </tr>
        </thead>


</table>
<br><a href="index.html"><button class="btn btn-dark" type="button">Volver al Inicio</button>
</body>
</html>


