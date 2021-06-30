<?php
require_once("Procesos/Con_bd.php");
require_once("Procesos/Funciones.php");

if(isset($_POST['btn_consultar'])){
    $inicio=$_POST['f_inicio'];
    $fin=$_POST['f_fin'];
    $Ced=$_POST['Ci'];
    $obj=new metodos();
    $datos1=$obj->mostrarHor_Publico($inicio,$fin,$Ced);
    //var_dump($datos1);
    if (empty($datos1)) {
        echo"<script> alert('No se encontro datos')
        window.location= 'Public_Horario.php';</script>";
    }
    else{
        $datos2=$datos1;//En el caso de que exista datos se pasa a la variable datos2 
                        //Debido a que el foreach detecta a esta variable $datos2
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Centiseg</title>
	<link rel="stylesheet" href="../css/Normalizar.css">
	<link rel="stylesheet" href="../css/Estilos.css">
    <link rel="stylesheet" href="../css/Admin/Estilo_Horario.css">
    <link rel="stylesheet" href="../css/Admin/Estilo_general.css">
</head>
<body>
	<header class="encabezado">
		<div class="contenedor">
			<a href="../index.html" class="logo">
				<img src="../images/logo.png" alt="Logo de centiseg" width="100">
			</a>
			<nav>
				<ul>
					<li><a href="../servicio.html">Servicios</a></li>
					<li id="Elegido"><a href="#">Horario Personal</a></li>
					<li><a href="Ingresar.php">Ingresar</a></li>
				</ul>
			</nav>
		</div>
	</header><!--Fin encabezado-->
    <div class="contenedor-horario"><br>
    <h1>HORARIO</h1>
    <div class="datos-superior">
        <form action="" method="post">
            <div class="form-group">
                <span><label for="Ci">Ingrese su numero de cedula :</label></span>
                <input type="text" name="Ci" id="Ci" class="input__text" placeholder="Cedula" maxlength="10" required onkeypress='return validaNumericos(event)'>
            </div>
            <div class="formulario">
                <div class="form-group">
                    <span><label for="f_inicio">Desde</label></span>
                    <input type="date" name="f_inicio" id="f_inicio" min="2019-01-01" max="2121-12-31" class="input__text" required >
                    <span><label for="f_fin">Hasta</label></span>
                    <input type="date" name="f_fin" id="f_fin" min="2019-01-01" max="2121-12-31" class="input__text"  required>
                </div>
                <div class="btn__group">
                    <input type="submit" class="btn" name="btn_consultar" value="Consultar">
                </div>
            </div>
        </form>
    </div><br><br>
    <?php 
        if(isset($_POST['btn_consultar'])){
    ?>
    <table>
        <tr class="head">
            <td>Fecha</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Puesto</td>
            <td>Delta</td>
            <td>Actividad</td>
            <td>Jornada</td>
            <td>Observación</td>
        </tr>
        <?php 
                foreach ($datos2 as $mostrar) {

        ?>
            <tr >
                <td><?php echo $mostrar['Fecha']; ?></td>
                <td><?php echo $mostrar['Nombre1']; ?></td>
                <td><?php echo $mostrar['Apellido1']; ?></td>
                <td><?php echo $mostrar['Nombre_puesto']; ?></td>
                <td><?php echo $mostrar['N_delta']; ?></td>
                <td><?php echo $mostrar['Actividad']; ?></td>
                <td><?php echo $mostrar['Jornada']; ?></td>
                <td><?php echo $mostrar['Observacion']; ?></td>
                
            </tr>
        <?php }} ?>
    </table>
    <script src="../js/Procesos.js"></script>
</body>
</html>