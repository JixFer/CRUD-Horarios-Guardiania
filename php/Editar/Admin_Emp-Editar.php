<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//////////////////////CARGAR DE DATOS//////////////////////
    $id=$_GET['id'];
    $sql="CALL Sp_DatosEmpl('$id')";
    //No se crea funcion Debido a que no se puede convertir un objeto en un array (no retorna un array).
    $c=new conectar();
    $conexion=$c->conexion();
    $resultado=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($resultado);
    //var_dump($ver); 
//////////////////////GUARDAR DATOS//////////////////////
    //Si existe datos en el btn_guardar
    if(isset($_POST['btn_guardar'])){
        //Direccion
        $Cod_dir=$_POST['cod_dir'];
        $Calle_prin=$_POST['calle_pr'];
        $Calle_sec=$_POST['calle_se'];
        $Sector=$_POST['sector'];
        $Referencia=$_POST['ref'];
        //Empleado
        $Cedula=$_POST['cedula'];
        $Apellido1=$_POST['apellido1'];
        $Apellido2=$_POST['apellido2'];
        $Nombre1=$_POST['nombre1'];
        $Nombre2=$_POST['nombre2'];
        $F_nac=$_POST['F_nac'];
        $Tipo_sangre=$_POST['T_sangre'];
        $Telefono1=$_POST['Telefono1'];
        $Telefono2=$_POST['Telefono2'];
        $E_mail=$_POST['Email'];
        $Estado_civil=$_POST['E_civil'];
        //Fk
        $Cargo=$_POST['cargo'];
        //$Cod_dir=$_POST[''];
        //Estudios
        $instruccion=$_POST['instruccion'];
        $capacitacion=$_POST['capacitacion'];
        $reentrenamiento=$_POST['reentrenamiento'];

        $datos=array(
            $Cod_dir,
            $Calle_prin,
            $Calle_sec,
            $Sector,
            $Referencia,
            $Cedula,//array posicion 5
            $Apellido1,
            $Apellido2,
            $Nombre1,
            $Nombre2,
            $F_nac,
            $Tipo_sangre,
            $Telefono1,
            $Telefono2,
            $E_mail,
            $Estado_civil,
            $Cargo,//array posicion 16
            $instruccion,
            $capacitacion,
            $reentrenamiento
            );
        $obj2=new metodos();
        $obj2->ActualizarEmpl($datos);
    }

?>
<div class="contenedor">
    <h2 style="text-transform: uppercase;">ACTUALIZAR DATOS DE : <?php echo"$ver[3] $ver[1]"?></h2>
    <h3>DATOS PRINCIPALES</h3>
    <form action="" method="post">
        <div class="form-group">
            <span><label for="num_cedula">Ingrese el numero de cedula :</label></span>
            <input readonly type="text" value="<?php echo $ver[0]?>" name="cedula" placeholder="Cedula" class="input__text" id="num_cedula" maxlength="10" required onkeypress='return validaNumericos(event)'>
        </div>
        <div class="form-group">
            <input type="text" value="<?php echo $ver[1]?>" name="apellido1" placeholder="Apellido Paterno" class="input__text"  maxlength="30" required>
            <input type="text" value="<?php echo $ver[2]?>" name="apellido2" placeholder="Apellido Materno" class="input__text" maxlength="30" required>
            <input type="text" value="<?php echo $ver[3]?>" name="nombre1" placeholder="Primer Nombre" class="input__text" maxlength="30" required>
            <input type="text" value="<?php echo $ver[4]?>" name="nombre2" placeholder="Segundo Nombre" class="input__text" maxlength="30" required>
        </div>
        <div class="form-group">
            <span> <label for="fecha_nac"> Ingrese fecha de nacimiento :</label></span>
            <input type="date" value="<?php echo $ver[5]?>" name="F_nac" placeholder="Fecha de nacimiento" id="fecha_nac" class="input__text" required>
            <span> <label for="tipo_sangre" >Ingrese tipo de sangre :</span>
            <select name="T_sangre" class="input__text" id="tipo_sangre" required>
                <option value="O+" <?php if ($ver[6]=="O+") {echo "selected";}?>>O+</option>
                <option value="O-" <?php if ($ver[6]=="O-") {echo "selected";}?>>O-</option>
                <option value="A+" <?php if ($ver[6]=="A+") {echo "selected";}?>>A+</option>
                <option value="A-" <?php if ($ver[6]=="A-") {echo "selected";}?>>A-</option>
                <option value="B+" <?php if ($ver[6]=="B+") {echo "selected";}?>>B+</option>
                <option value="B-" <?php if ($ver[6]=="B-") {echo "selected";}?>>B-</option>
                <option value="AB+" <?php if ($ver[6]=="AB+") {echo "selected";}?>>AB+</option>
                <option value="AB-" <?php if ($ver[6]=="AB-") {echo "selected";}?>>AB-</option>
            </select>
        </div>
        <div class="form-group">
            <span> <label for="estado_civil"> Ingrese su estado civil :</label></span>
            <select name="E_civil" id="estado_civil" class="input__text" required>
                <option value="Soltero" <?php if ($ver[10]=="Soltero") {echo "selected";}?>>Soltero</option>
                <option value="Casado"  <?php if ($ver[10]=="Casado") {echo "selected";}?>>Casado</option>
                <option value="Unión libre"  <?php if ($ver[10]=="Unión libre") {echo "selected";}?>>Unión libre</option>
                <option value="Separado"  <?php if ($ver[10]=="Separado") {echo "selected";}?>>Separado</option>
                <option value="Divorciado" <?php if ($ver[10]=="Divorciado") {echo "selected";}?>>Divorciado</option>
                <option value="Viudo" <?php if ($ver[10]=="Viudo") {echo "selected";}?>>Viudo</option>
            </select>
            <input type="tel" name="Telefono1" value="<?php echo $ver[7]?>" placeholder="Teléfono 1" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
            <input type="tel" name="Telefono2" value="<?php echo $ver[8]?>" placeholder="Teléfono 2" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
        </div>
        <div class="form-group">
            <input type="email" name="Email" value="<?php echo $ver[9]?>" placeholder="Correo electronico" class="input__text" maxlength="40">
        </div>
        <h3>DIRECCIÓN</h3>
        <div class="form-group">
            <input type="text" name="cod_dir" value="<?php echo $ver[12]?>" placeholder="Código de direccion Ej: Oe9-79" class="input__text" maxlength="10" required>
            <input type="text" name="calle_pr" value="<?php echo $ver[13]?>" placeholder="Calle principal" class="input__text" maxlength="50" required>
            <input type="text" name="calle_se" value="<?php echo $ver[14]?>" placeholder="Calle secundaria" class="input__text" maxlength="50" required>
            <input type="text" name="sector" value="<?php echo $ver[15]?>" placeholder="Sector" class="input__text" maxlength="50">
        </div>
        <div class="form-group">
            <input type="text" name="ref" value="<?php echo $ver[16]?>" placeholder="Referencia de su domicilio" class="input__text" maxlength="300">
        </div>
        <h3>ESTUDIOS</h3>
        <div class="form-group">
            <span> <label for="instruccion_formal"> Ingrese su grado academico :</label></span>
            <select name="instruccion" id="instruccion_formal" class="input__text" required>
                <option value="Primaria" <?php if ($ver[18]=="Primaria") {echo "selected";}?>>Primaria</option>
                <option value="Bachiller" <?php if ($ver[18]=="Bachiller") {echo "selected";}?>>Bachiller</option>
                <option value="Tercer nivel" <?php if ($ver[18]=="Tercer nivel") {echo "selected";}?>>Tercer nivel</option>
            </select>
            <input type="text" name="capacitacion" value="<?php echo $ver[19]?>" placeholder="Curso de capacitacion" class="input__text" maxlength="30">
            <input type="text" name="reentrenamiento" value="<?php echo $ver[20]?>" placeholder="Reentrenamiento" class="input__text" maxlength="30">
        </div>
        <h3>CARGO A ASIGNAR DE EMPLEADO</h3>
        <div class="form-group">
            <span> <label for="asig_cargo"> Cargo que se que se asignara : </label></span>
            <select name="cargo" id="asig_cargo" class="input__text" maxlength="40" requied>
                <option value="Fijo" <?php if ($ver[11]=="Fi") {echo "selected";}?>>Fijo</option>
                <option value="Sacafranco" <?php if ($ver[11]=="Sa") {echo "selected";}?>>Sacafranco</option>
                <option value="Practicante" <?php if ($ver[11]=="Pr") {echo "selected";}?>>Practicante</option>
                <option value="Desvinculado" <?php if ($ver[11]=="De") {echo "selected";}?>>Desvinculado</option>
            </select>
        </div>
        <div class="btn__group__center">
            <a href="../Admin_Emp.php" class="btn btn__danger">Cancelar</a>
            <input type="submit" name="btn_guardar" value="Actualizar" class="btn btn__primary">
        </div>
    </form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>

