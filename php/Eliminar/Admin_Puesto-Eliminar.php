<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
//////////////////////CARGAR DE DATOS//////////////////////
$Del=$_GET['Delta'];
$Nom=$_GET['Nom'];
$Tel=$_GET['Tel'];
$Mail=$_GET['Mail'];
$vector1=array($Del,$Nom,$Tel,$Mail);
$obje=new metodos();
$id=$obje->VerificarId_Puesto($vector1);
//Funcion Eliminar
    $obj=new metodos();
    $obj->EliminarPuesto($id);
?>    
