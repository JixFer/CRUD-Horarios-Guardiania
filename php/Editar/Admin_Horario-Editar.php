<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//////////////////////CARGAR DE DATOS//////////////////////
$Fecha=$_GET['Fe'];
$Id_Puesto=$_GET['IdPu'];
$Cedula=$_GET['Ci'];
$Actividad=$_GET['Ac'];
$Jornada=$_GET['Jor'];
$Observacion=$_GET['Obs'];
//var_dump($ver);
//////////////////////GUARDAR DATOS//////////////////////
//Si existe datos en el btn_guardar
if(isset($_POST['btn_guardar'])){
    //
    $Fec=$_POST['fecha'];
    $Ci=$_POST['empleado'];
    $Id_pues=$_POST['puesto'];
    $Act=$_POST['actividad'];
    $Jor=$_POST['jornada'];
    $Obs=$_POST['obs'];

    $datos=array(
        $Fec,
        $Ci,
        $Id_pues,
        $Act,
        $Jor,
        $Obs
                );
    //var_dump($datos);
    $obj=new metodos();
    $obj->ActualizarHorario($datos);
}
?>
<div class="contenedor">
<h2 style="text-transform: uppercase;">HORARIO "<?php echo"$Fecha"?>"   JORNADA "<?php echo"$Jornada"?>" </h2>
<h3>DATOS PRINCIPALES</h3>
<form action="" method="post">
    <div class="form-group">
        <select name="empleado" class="input__text" id="empleado" required>
            <?php
                $sql="select*from Vis_empleado";
                $c=new conectar();
                $conexion=$c->conexion();
                $resultado=mysqli_query($conexion,$sql);
                //$valores=mysqli_fetch_array($resultado);
                while ($valores = mysqli_fetch_array($resultado)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                
                    echo '<option  value="'.$valores['Cedula'].'"'.(($Cedula==$valores['Cedula'])?'selected="selected"':"").'>'.$valores['Nombre1']." ".$valores['Apellido1'].'</option>';
                }
            ?>
        </select>
        <select name="puesto" class="input__text" id="puesto" required>
            <?php
                $sql="select*from Vis_puesto";
                $c=new conectar();
                $conexion=$c->conexion();
                $resultado=mysqli_query($conexion,$sql);
                //$valores=mysqli_fetch_array($resultado);
                while ($valores = mysqli_fetch_array($resultado)) {
                    echo '<option  value="'.$valores['Id_puesto'].'"'.(($Id_Puesto==$valores['Id_puesto'])?'selected="selected"':"").'>'.$valores['Nombre_puesto'].'</option>';
                }
            ?>
        </select>
        <span><label for="fecha">Fecha :</label></span>
        <input type="date" name="fecha" id="fecha" value="<?php echo"$Fecha"?>" min="2019-01-01" max="2121-12-31" class="input__text" readonly="true">
    </div>
    <h3>DATOS ADICIONALES</h3>
    <div class="form-group">
        <span><label for="actividad">Actividad :</label></span>
        <select name="actividad" id="actividad" class="input__text" required>
            <option value="Turno" <?php if ($Actividad=="Turno") {echo "selected";}?>>Turno</option>
            <option value="Descansa" <?php if ($Actividad=="Descansa") {echo "selected";}?>>Descansa</option>
            <option value="Permiso" <?php if ($Actividad=="Permiso") {echo "selected";}?>>Permiso</option>
            <option value="Falta" <?php if ($Actividad=="Falta") {echo "selected";}?>>Falta</option>
            <option value="Vacaciones" <?php if ($Actividad=="Vacaciones") {echo "selected";}?>>Vacaciones</option>
        </select>
        <span><label for="jornada">Jornada :</label></span>
        <select name="jornada" id="jornada" class="input__text" required>
            <option value="Diurna" <?php if ($Jornada=="Diurna") {echo "selected";}?>>Diurna</option>
            <option value="Nocturna" <?php if ($Jornada=="Nocturna") {echo "selected";}?>>Nocturna</option>
            <option value="24 Horas" <?php if ($Jornada=="24 Horas") {echo "selected";}?>>24 Horas</option>
        </select>
    </div>
    <div class="form-group">
        <span><label for="obs">Observación :</label></span>
        <input type="text" name="obs" value="<?php echo"$Observacion"?>"id="obs" placeholder="Agregue una observación" class="input__text" maxlength="1000" required>
    </div>
    <div class="btn__group__center">
        <a href="javascript:history.back()" class="btn btn__danger">Cancelar</a>
        <input type="submit" name="btn_guardar" value="Actualizar" class="btn btn__primary">
    </div>
</form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>

