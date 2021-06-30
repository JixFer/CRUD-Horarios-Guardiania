<?php
    require_once("Procesos/Con_bd.php");
    require_once("Procesos/Funciones.php");
    if(isset($_POST['Btn_Solicitar'])){
        $User=$_POST['user'];
        $Pre=$_POST['Pregunta'];
        $Res=$_POST['Res'];
        $obj=new metodos();
        $obj->Verificar_Con($User,$Pre,$Res);

    }
?>
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
					<li><a href="#">Servicios</a></li>
					<li><a href="#">Horario Personal</a></li>
					<li id="Ingresar"><a href="Ingresar.php">Ingresar</a></li>
				</ul>
			</nav>
		</div>
    </header><!--Fin encabezado-->
    <div class="formulario">
        <div class="contenedor">
        <h2>RECUPERAR CONTRASEÑA</h2>
        <form action="" method="POST">
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" placeholder="Ingrese su usuario" name="user" required></td>
                    </tr>
                    <tr>
                        <td>
                        <select name="Pregunta" id="Pre" required>
                            <option value="1">¿Cuál es tu comida favorita?</option>
                            <option value="2">¿Cómo se llamaba tu primera mascota?</option>
                            <option value="3">¿En que ciudad se conocieron tus padres?</option>
                        </select>
                        </td>
                        <td><input type="text" placeholder="Ingrese su respuesta" name="Res" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Solicitar" name="Btn_Solicitar"></td>
                    </tr>
                </table>
            </form> <!--fin formulario-->
        </div>
    </div>
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