<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
//Funcion Eliminar
    $cedula=$_GET['ced'];
    $obj=new metodos();
    $obj->EliminarEmpl($cedula);
?>    
