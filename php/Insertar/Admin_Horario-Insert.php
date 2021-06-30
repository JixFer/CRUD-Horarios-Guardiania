<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");
//Si existe datos en el btn_
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
    $obj->InsertarHorario($datos);
}
?>
<div class="contenedor">
<h2>INSERTAR NUEVO HORARIO</h2>
<h3>DATOS PRINCIPALES</h3>
<form action="" method="post">
    <div class="form-group">
        <select name="empleado" class="input__text" id="empleado" required>
            <option value=""  hidden selected>Seleccione Empleado </option>
            <?php
                $sql="select*from Vis_Empl_NoDesvinculado";
                $c=new conectar();
                $conexion=$c->conexion();
                $resultado=mysqli_query($conexion,$sql);
                //$valores=mysqli_fetch_array($resultado);
                while ($valores = mysqli_fetch_array($resultado)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['Cedula'].'">'.$valores['Nombre1']." ".$valores['Apellido1'].'</option>';
                }
            ?>
        </select>
        <select name="puesto" class="input__text" id="puesto" required>
            <option value="" hidden selected>Seleccione Puesto</option>
            <?php
                $sql="select*from Vis_puesto";
                $c=new conectar();
                $conexion=$c->conexion();
                $resultado=mysqli_query($conexion,$sql);
                //$valores=mysqli_fetch_array($resultado);
                while ($valores = mysqli_fetch_array($resultado)) {
                    echo '<option value="'.$valores['Id_puesto'].'">'.$valores['Nombre_puesto'].'</option>';
                }
            ?>
        </select>
        <span><label for="fecha">Fecha :</label></span>
        <input type="date" name="fecha" id="fecha" min="2019-01-01" max="2121-12-31" class="input__text">
    </div>
    <h3>DATOS ADICIONALES</h3>
    <div class="form-group">
        <span><label for="actividad">Actividad :</label></span>
        <select name="actividad" id="actividad" class="input__text" required>
            <option value="Turno">Turno</option>
            <option value="Descansa">Descansa</option>
            <option value="Permiso">Permiso</option>
            <option value="Falta">Falta</option>
            <option value="Vacaciones">Vacaciones</option>
        </select>
        <span><label for="jornada">Jornada :</label></span>
        <select name="jornada" id="jornada" class="input__text" required>
            <option value="Diurna">Diurna</option>
            <option value="Nocturna">Nocturna</option>
            <option value="24 Horas">24 Horas</option>
        </select>
    </div>
    <div class="form-group">
        <span><label for="obs">Observación :</label></span>
        <input type="text" name="obs" id="obs" placeholder="Agregue una observación" class="input__text" maxlength="1000" required>
    </div>
    <div class="btn__group__center">
        <a href="../Admin_Horario.php" class="btn btn__danger">Cancelar</a>
        <input type="submit" name="btn_guardar" value="Guardar" class="btn btn__primary">
    </div>
</form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>

