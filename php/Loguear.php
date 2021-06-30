<?php
    require_once('Procesos/Con_bd.php');
    $User=$_POST['user'];
    $Pass=$_POST['pass'];
    session_start(); 
    $_SESSION['usuario']=$User;

    $con=new conectar();
    $conexion=$con->conexion();
    $consulta="CALL Sp_VerificarUsuario('$User','$Pass')";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);
    if ($filas){
        header("location: Admin_Emp.php");
    }
    else{
        ?>
        <?php
        include("Ingresar.php");
        ?>
        <script> alert('Error en la autentificación, Intente nuevamente'); </script>
        <!-- <span class="Error"> ERROR EN LA AUTENTIFICACION </span> -->
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
