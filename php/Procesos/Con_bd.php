<?php

    class conectar{
        private $servidor='localhost';
        private $usuario='root';
        private $contras='';
        private $bd='CENTISEG';
        public function conexion(){
            $conexion=mysqli_connect($this->servidor,
                                    $this->usuario,
                                    $this->contras,
                                    $this->bd);
            if($conexion->connect_error){
                die("Conexion fallida: ".$conexion->connect_error); 
            }   
            else
            {
                return $conexion;
            }                  
        }
    }
    /*//Verificacion de conexiòn
    $obj=new conectar();
    if($obj->conexion()){
        echo "Conectado con exito";
    }
    else{
        echo "Fallo al conectar";
    }*/
?>