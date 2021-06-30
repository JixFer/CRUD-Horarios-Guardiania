<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//////////////////////CARGAR DE DATOS//////////////////////
$Id=$_GET['id'];
$Usuario=$_GET['Usu'];
$Contra=$_GET['Con'];
$Rol=$_GET['Rol'];
//$vector1=array($Id,$Contra,$Rol);
if ($Id==1) {
    echo"<script>alert('Recuerde va a modificar el usuario predeterminado');</script>";//PENDIENTE
}
if(isset($_POST['btn_guardar'])){
    //
    $User=$_POST['Usua'];
    $Pass=$_POST['Con'];
    $Pr1=$_POST['Pr1'];
    $Pr2=$_POST['Pr2'];
    $Pr3=$_POST['Pr3'];
    $rol=$_POST['rol'];

    $array=array(
        $Id,
        $User,
        $Pass,
        $Pr1,
        $Pr2,
        $Pr3,
        $rol
    );
    //var_dump($array);
    $obj=new metodos();
    $obj->Actualizar_Usuario($array);
    if($obj){
        echo"<script> alert('Se ha actualizado correctamente los datos del Usuario');
        window.location='../Admin_User.php'</script>";
    }
}
?> 
<div class="contenedor">
<h3>FORMULARIO DE ACTUALIZACIÓN </h3><br>
    <form action="" method="post">
        <div class="form-group">
            <span><label for="In_Usua">Ingrese el Usuario y contraseña :</label></span>
            <input type="text" name="Usua" value="<?php echo $Usuario ?>" placeholder="Usuario" class="input__text" id="In_Usua" maxlength="30" required>
            <input type="text" name="Con" value="<?php echo $Contra ?>" placeholder="Contraseña" class="input__text" id="In_Con" maxlength="30" required>
        </div>
        <div class="form-group">
            <span><label for="Pr1">¿Cuál es tu comida favorita?</label></span>
            <input type="text" name="Pr1" value="<?php $obj=new metodos();$m=$obj->MostrarPreguntaUser($Id,1); echo"$m"?>" placeholder="Pregunta 1" class="input__text" id="Pr1"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="Pr2">¿Cómo se llama tu primera mascota?</label></span>
            <input type="text" name="Pr2" value="<?php $obj=new metodos();$m=$obj->MostrarPreguntaUser($Id,2); echo"$m"?>" placeholder="Pregunta 2" class="input__text" id="Pr2"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="Pr3">¿En que ciudad se conocieron tus padres?</label></span>
            <input type="text" name="Pr3" value="<?php $obj=new metodos();$m=$obj->MostrarPreguntaUser($Id,3); echo"$m"?>" placeholder="Pregunta 3" class="input__text" id="Pr3"  maxlength="160" required>
        </div>
        <div class="form-group">
            <span><label for="rol">Seleccione rol</label></span>
            <select name="rol" id="rol" class="input__text" required>
                <option value="1">Administrador</option>
            </select>
        </div>
        <div class="btn__group__center">
            <a href="../Admin_User.php" class="btn btn__danger">Cancelar</a>
            <input type="submit" name="btn_guardar" value="Guardar" class="btn btn__primary">
        </div>
    </form>
</div>
</body>
</html>