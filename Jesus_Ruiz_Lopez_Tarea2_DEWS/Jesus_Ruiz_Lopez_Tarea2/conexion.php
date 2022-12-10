<?php 
     
// Creamos una conexion para que acceda a nuestra base de datos
     class conexion{

       
        protected $conexion;

        public function __construct(){
            
            $servidor = 'localhost';
            $usuario = 'studium';
            $clave = 'studium__';
            $bd = 'studium_dws_p2';
        

            $this->conexion = new mysqli($servidor, $usuario, $clave, $bd);
            if(mysqli_connect_error()){
                die("error al conectar");
            }else{
                return $this->conexion;
            }
        }


     }



?>