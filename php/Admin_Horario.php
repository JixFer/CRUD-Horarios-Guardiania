<?php
require_once("Procesos/Con_bd.php");
require_once("Procesos/Funciones.php");
include("Encabezado.php");

if(isset($_POST['btn_consultar'])){
    $inicio=$_POST['f_inicio'];
    $fin=$_POST['f_fin'];
    $obj=new metodos();
    $datos=$obj->mostrarDatos_HOR($inicio,$fin);
}
?>


<div class="contenedor">
    <h1>HORARIO</h1>
    <div class="datos-superior">
        <form action="" class="formulario" method="post">
            <div class="form-group">
                <span>Desde</span>
                <input type="date" name="f_inicio" min="2019-01-01" max="2121-12-31" class="input__text" required>
            </div>
            <div class="form-group">
                <span>Hasta</span>
                <input type="date" name="f_fin" min="2019-01-01" max="2121-12-31" class="input__text" required>
            </div>
            <div class="btn__group">
                <input type="submit" class="btn" name="btn_consultar" value="Consultar">
                <a href="Insertar/Admin_Horario-Insert.php" class="btn btn__nuevo">Registrar nuevo</a>
                <!-- <input type="submit" class="btn" name="btn_registrar" value="Registrar"> -->
            </div>
        </form>
    </div>
    <?php 
        if(isset($_POST['btn_consultar'])){
    ?>
    <table>
        <tr class="head">
            <td>Fecha</td>
            <td>Cedula</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Puesto</td>
            <td>Delta</td>
            <td>Cod. Pues</td>
            <td>Actividad</td>
            <td>Jornada</td>
            <td>Observación</td>
            <td colspan="2">Accion</td>
        </tr>
        <?php 
                foreach ($datos as $mostrar) {

        ?>
            <tr >
                <td><?php echo $mostrar['Fecha']; ?></td>
                <td><?php echo $mostrar['Cedula']; ?></td>
                <td><?php echo $mostrar['Nombre1']; ?></td>
                <td><?php echo $mostrar['Apellido1']; ?></td>
                <td><?php echo $mostrar['Nombre_puesto']; ?></td>
                <td><?php echo $mostrar['N_delta']; ?></td>
                <td><?php echo $mostrar['Id_puesto']; ?></td>
                <td><?php echo $mostrar['Actividad']; ?></td>
                <td><?php echo $mostrar['Jornada']; ?></td>
                <td><?php echo $mostrar['Observacion']; ?></td>
                <td class="Opcion"> <a href="Editar/Admin_Horario-Editar.php?Fe=<?php echo $mostrar['Fecha'];?>&IdPu=<?php echo $mostrar['Id_puesto'];?>&Ci=<?php echo $mostrar['Cedula'];?>&Ac=<?php echo $mostrar['Actividad'];?>&Jor=<?php echo $mostrar['Jornada'];?>&Obs=<?php echo $mostrar['Observacion'];?>" class="btn__update"><img src="../images/Editar.png" alt="Editar" width="15"></a></td>
                <td class="Opcion"> <a href="Eliminar/Admin_Horario-Eliminar.php?Fe=<?php echo $mostrar['Fecha']; ?>&IdPu=<?php echo $mostrar['Id_puesto'];?>&Ci=<?php echo $mostrar['Cedula'];?>&Jor=<?php echo $mostrar['Jornada'];?>" class="btn__delete"><img src="../images/Eliminar.png" alt="Eliminar" width="15"></a></td>
                <!-- falta agregar jornada para poder eliminar-->
            </tr>
        <?php }} ?>
    </table>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
</body>
</html>