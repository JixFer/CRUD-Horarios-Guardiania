<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Centiseg</title>
	<link rel="stylesheet" href="../css/Normalizar.css">
    <link rel="stylesheet" href="../css/Estilos.css">
    <link rel="stylesheet" href="../css/Ingresar.css">
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
					<li><a href="Public_Horario.php">Horario Personal</a></li>
					<li id="Ingresar"><a href="#">Ingresar</a></li>
				</ul>
			</nav>
		</div>
    </header><!--Fin encabezado-->
    <div class="formulario">
        <div class="contenedor">
        <h2>INGRESE LOS DATOS CORRESPONDIENTES</h2>
            <form action="Loguear.php" method="POST">
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" placeholder="Ingrese su usuario" name="user" required></td>
                    </tr>
                    <tr>
                        <td>contraseña</td>
                        <td><input type="password" placeholder="Ingrese su contraseña" name="pass" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Ingresar" name=""></td>
                    </tr>
                </table>
            </form> <!--fin formulario-->
            <a href="Olvide_contraseña.php" class="Contraseña">¿Olvide mi contraseña?</a>
            <span>
                <?php
                    require_once("Procesos/Con_bd.php");
                    $c=new conectar();
                    $conexion=$c->conexion();
                    if($conexion-> connect_error){
                        echo("Conexion fallida");
                    }
                    else{
                        echo("Conexion exitosa");
                    }
                ?>
            </span>
        </div><!--Fin Contenedor-->
        <img src="../images/Logo_2.jpg" id="Img">
    </div> <!--Fin formulario -->
    <footer class="piepagina">
		<div class="contenedor">
			<small>Jixon Mora Copyright © Centiseg 2020  todos los derechos reservados</small>
			<nav>
				<ul>
					<li><a href="#">Politcas del sitio</a></li>
					<li><a href="#">Preguntas frecuentes</a></li>
					<li><a href="#">Contactanos</a></li>
				</ul>
			</nav>
		</div>
	</footer><!--Pie de pagina-->
</body>
</html>