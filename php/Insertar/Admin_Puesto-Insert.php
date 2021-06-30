<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//Si existe datos en el btn_
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
    $obj->InsertarPuesto($datos);

}
?>
<div class="contenedor">
<h2>INSERTAR NUEVO PUESTO</h2>
<h3>DATOS PRINCIPALES</h3>
<form action="" method="post">
    <!-- <div class="form-group">
        <span><label for="num_delta">Ingrese el numero de delta :</label></span>
    </div> -->
    <div class="form-group">
        <input type="text" name="delta" placeholder="Número de delta" class="input__text" maxlength="3" required onkeypress='return validaNumericos(event)'>
        <input type="text" name="nombre" placeholder="Nombre de puesto" class="input__text"  maxlength="30" required>
        <input type="text" name="telefono" placeholder="Teléfono" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)' required>
        <input type="email" name="email" placeholder="E-mail" class="input__text" maxlength="30" required>
    </div>
    
    <h3>DIRECCIÓN</h3>
    <div class="form-group">
        <input type="text" name="cod_dir" placeholder="Código de direccion Ej: Oe9-79" class="input__text" maxlength="10" required>
        <input type="text" name="calle_pr" placeholder="Calle principal" class="input__text" maxlength="50" required>
        <input type="text" name="calle_se" placeholder="Calle secundaria" class="input__text" maxlength="50" required>
        <input type="text" name="sector" placeholder="Sector" class="input__text" maxlength="100">
    </div>
    <div class="form-group">
        <input type="text" name="ref" placeholder="Referencia de su domicilio" class="input__text" maxlength="300">
    </div>
    <h3>DATOS DE CLIENTE</h3>
    <div class="form-group">
        <input type="text" name="nombre_cli" placeholder="Nombre Cliente" class="input__text" maxlength="30">
        <input type="text" name="telefono1_cli" placeholder="Teléfono 1" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
        <input type="text" name="telefono2_cli" placeholder="Teléfono 2" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
    </div>
    <div class="form-group">
        <input type="text" name="obs" placeholder="Observación" class="input__text" maxlength="100">
    </div>
    <div class="btn__group__center">
        <a href="../Admin_Puesto.php" class="btn btn__danger">Cancelar</a>
        <input type="submit" name="btn_guardar" value="Guardar" class="btn btn__primary">
    </div>
</form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>

