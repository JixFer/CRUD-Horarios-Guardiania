<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
//////////////////////CARGAR DE DATOS//////////////////////
$Fecha=$_GET['Fe'];
$Cedula=$_GET['Ci'];
$Id_Puesto=$_GET['IdPu'];
$Jornada=$_GET['Jor'];
$vector1=array($Fecha,$Cedula,$Id_Puesto,$Jornada);
//var_dump($vector1);
//Funcion Eliminar
    $obj=new metodos();
    $obj->EliminarHorario($vector1);
?>    