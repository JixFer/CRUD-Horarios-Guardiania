<?php
require_once("Procesos/Con_bd.php");
require_once("Procesos/Funciones.php");
include("Encabezado.php");

    $obj=new metodos();
    $datos=$obj->mostrarDatos_Usu();
//////////////////////GUARDAR DATOS//////////////////////
//Si existe datos en el btn_guardar
if(isset($_POST['btn_guardar'])){
    //
    $User=$_POST['Usua'];
    $Pass=$_POST['Con'];
    $Pr1=$_POST['Pr1'];
    $Pr2=$_POST['Pr2'];
    $Pr3=$_POST['Pr3'];
    $rol=$_POST['rol'];

    $array=array(
        $User,
        $Pass,
        $Pr1,
        $Pr2,
        $Pr3,
        $rol
    );
    //var_dump($array);
    $obj=new metodos();
    $obj->GuardarDatos_Usu($array);
    if($obj){
        echo"<script> alert('Se ha registrado correctamente los datos del Usuario');
        window.location='Admin_User.php'</script>";
    }
}
?>


<div class="contenedor">
    <h1>USUARIOS</h1><br>
    <h3>USUARIOS REGISTRADOS</h3>
    <table>
        <tr class="head">
            <td>Id</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Rol</td>
            <td colspan="2">Accion</td>
        </tr>
        <?php 
            foreach ($datos as $mostrar) {
        ?>
            <tr>
            <td><?php echo $mostrar['Id_User']; ?></td>
                <td><?php echo $mostrar['Usuario']; ?></td>
                <td><?php echo $mostrar['Contra']; ?></td>
                <td><?php echo $mostrar['Rol']; ?></td>
                <td class="Opcion"> <a href=" Editar/Admin_User-Editar.php?id=<?php echo $mostrar['Id_User']; ?>&Usu=<?php echo $mostrar['Usuario']; ?>&Con=<?php echo $mostrar['Contra']; ?>&Rol=<?php echo $mostrar['Rol']; ?>" class="btn__update"><img src="../images/Editar.png" alt="Editar" width="15"></a></td>
                <td class="Opcion"> <a href="Eliminar/Admin_User-Eliminar.php?id=<?php echo $mostrar['Id_User']; ?>" class="btn__delete"><img src="../images/Eliminar.png" alt="Eliminar" width="15"></a></td>
            </tr>
        <?php }?>
    </table>
    <br><br>
    <h3>FORMULARIO DE REGISTRO</h3><br>
    <form action="" method="post">
        <div class="form-group">
            <span><label for="In_Usua">Ingrese el Usuario y contraseña :</label></span>
            <input type="text" name="Usua" placeholder="Usuario" class="input__text" id="In_Usua" maxlength="30" required>
            <input type="text" name="Con" placeholder="Contraseña" class="input__text" id="In_Con" maxlength="30" required>
        </div>
        <div class="form-group">
            <span><label for="Pr1">¿Cuál es tu comida favorita?</label></span>
            <input type="text" name="Pr1" placeholder="Pregunta 1" class="input__text" id="Pr1"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="Pr2">¿Cómo se llama tu primera mascota?</label></span>
            <input type="text" name="Pr2" placeholder="Pregunta 2" class="input__text" id="Pr2"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="Pr3">¿En que ciudad se conocieron tus padres?</label></span>
            <input type="text" name="Pr3" placeholder="Pregunta 3" class="input__text" id="Pr3"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="rol">Seleccione rol</label></span>
            <select name="rol" id="rol" class="input__text" required>
                <option value="1">Administrador</option>
            </select>
        </div>
        <div class="form-group" id="User_Guardar">
            <input type="submit" name="btn_guardar" value="Guardar" class="btn btn__primary"><!--///PENDIENTE-->
        </div>
    </form>
</div><!--contenedor-->
</body>
</html>

