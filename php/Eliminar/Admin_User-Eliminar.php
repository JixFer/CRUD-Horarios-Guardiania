<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
//////////////////////CARGAR DE DATOS//////////////////////
$Id=$_GET['id'];
if ($Id==6) {
    echo"<script>alert('Por seguridad no se puede eliminar el Usuario Administrador');
    window.location= '../Admin_User.php';
    </script>";
}else{
    $obj=new metodos();
    $obj->EliminarUsuario($Id);
}
?>    