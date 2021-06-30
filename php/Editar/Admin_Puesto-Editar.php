<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//////////////////////CARGAR DE DATOS//////////////////////
    $Del=$_GET['Delta'];
    $Nom=$_GET['Nom'];
    $Tel=$_GET['Tel'];
    $Mail=$_GET['Mail'];
    $vector1=array($Del,$Nom,$Tel,$Mail);
    $obje=new metodos();
    $id=$obje->VerificarId_Puesto($vector1);
    //var_dump($id);

    $sql="CALL Sp_DatosPuesto('$id')";
    //No se crea funcion Debido a que no se puede convertir un objeto en un array (no retorna un array).
    $c=new conectar();
    $conexion=$c->conexion();
    $resultado=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($resultado);
    //var_dump($ver); 
//////////////////////GUARDAR DATOS//////////////////////
if(isset($_POST['btn_guardar'])){
    //Puesto
    $Delta=$_POST['delta'];
    $Nombre=$_POST['nombre'];
    $Telefono=$_POST['telefono'];
    $Email=$_POST['email'];
    //Direccion
    $Cod_dir=$_POST['cod_dir'];
    $Calle_prin=$_POST['calle_pr'];
    $Calle_sec=$_POST['calle_se'];
    $Sector=$_POST['sector'];
    $Referencia=$_POST['ref'];
    //Cliente
    $NombreCli=$_POST['nombre_cli'];
    $Tel1_Cli=$_POST['telefono1_cli'];
    $Tel2_Cli=$_POST['telefono2_cli'];
    $Obs=$_POST['obs'];


    $datos=array(
        $id,
        $Delta,
        $Nombre,
        $Telefono,
        $Email,
        $Cod_dir,
        $Calle_prin,
        $Calle_sec,
        $Sector,
        $Referencia,
        $NombreCli,
        $Tel1_Cli,
        $Tel2_Cli,
        $Obs
                );
    $obj=new metodos();
    $obj->ActualizarPuesto($datos);//ACTUALIZAR PENDIENTE

}
?>
<div class="contenedor">
<h2 style="text-transform: uppercase;">ACTUALIZAR DATOS DE PUESTO : <?php echo $ver[2]?></h2>
<h3>DATOS PRINCIPALES</h3>
<form action="" method="post">
    <!-- <div class="form-group">
        <span><label for="num_delta">Ingrese el numero de delta :</label></span>
    </div> -->
    <div class="form-group">
        <input type="text" value="<?php echo $ver[1]?>" name="delta" placeholder="Número de delta" class="input__text" maxlength="3" required onkeypress='return validaNumericos(event)'>
        <input type="text" value="<?php echo $ver[2]?>" name="nombre" placeholder="Nombre de puesto" class="input__text"  maxlength="30" required>
        <input type="text" value="<?php echo $ver[3]?>" name="telefono" placeholder="Teléfono" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)' required>
        <input type="email" value="<?php echo $ver[4]?>" name="email" placeholder="E-mail" class="input__text" maxlength="30" required>
    </div>
    
    <h3>DIRECCIÓN</h3>
    <div class="form-group">
        <input type="text" value="<?php echo $ver[5]?>" name="cod_dir" placeholder="Código de direccion Ej: Oe9-79" class="input__text" maxlength="10" required>
        <input type="text" value="<?php echo $ver[6]?>" name="calle_pr" placeholder="Calle principal" class="input__text" maxlength="50" required>
        <input type="text" value="<?php echo $ver[7]?>" name="calle_se" placeholder="Calle secundaria" class="input__text" maxlength="50" required>
        <input type="text" value="<?php echo $ver[8]?>" name="sector" placeholder="Sector" class="input__text" maxlength="100">
    </div>
    <div class="form-group">
        <input type="text" value="<?php echo $ver[9]?>" name="ref" placeholder="Referencia de su domicilio" class="input__text" maxlength="300">
    </div>
    <h3>DATOS DE CLIENTE</h3>
    <div class="form-group">
        <input type="text" value="<?php echo $ver[10]?>" name="nombre_cli" placeholder="Nombre Cliente" class="input__text" maxlength="30">
        <input type="text" value="<?php echo $ver[11]?>" name="telefono1_cli" placeholder="Teléfono 1" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
        <input type="text" value="<?php echo $ver[12]?>" name="telefono2_cli" placeholder="Teléfono 2" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
    </div>
    <div class="form-group">
        <input type="text" value="<?php echo $ver[13]?>"name="obs" placeholder="Observación" class="input__text" maxlength="100">
    </div>
    <div class="btn__group__center">
        <a href="../Admin_Puesto.php" class="btn btn__danger">Cancelar</a>
        <input type="submit" name="btn_guardar" value="Actualizar" class="btn btn__primary">
    </div>
</form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>