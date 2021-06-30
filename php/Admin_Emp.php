<?php
require_once("Procesos/Con_bd.php");
require_once("Procesos/Funciones.php");
include("Encabezado.php");

    $obj=new metodos();
    $datos=$obj->mostrarDatos_EMP();
    // metodo buscar
    if(isset($_POST['btn_buscar'])){
        $buscar=$_POST['buscar'];
        $obj=new metodos();
        $datos=$obj->buscarEmpl($buscar);
    }
?>


<div class="contenedor">
    <h1>EMPLEADO</h1>
    <div class="barra_buscador">
        <form action="" class="formulario" method="post">
            <input type="text" name="buscar" placeholder="Buscar nombre o apellido" class="input__text">
            <input type="submit" class="btn" name="btn_buscar" value="Buscar">
            <a href="Insertar/Admin_Emp-Insert.php" class="btn btn__nuevo">Nuevo</a>
        </form>
    </div>
    
    <table>
        <tr class="head">
            <td>Cedula</td>
            <td>Apellido 1</td>
            <td>Apellido 2</td>
            <td>Nombre 1</td>
            <td>Cargo</td>
            <td>Edad</td>
            <td>Tipo sangre</td>
            <td>Telefono 1</td>
            <td>Telefono 2</td>
            <td colspan="2">Accion</td>
        </tr>
        <?php 
            foreach ($datos as $mostrar) {
        ?>
            <tr >
                <td><?php echo $mostrar['Cedula']; ?></td>
                <td><?php echo $mostrar['Apellido1']; ?></td>
                <td><?php echo $mostrar['Apellido2']; ?></td>
                <td><?php echo $mostrar['Nombre1']; ?></td>
                <td><?php echo $mostrar['Cargo']; ?></td>
                <td><?php echo $mostrar['Edad']; ?></td>
                <td><?php echo $mostrar['Tipo_sangre']; ?></td>
                <td><?php echo $mostrar['Telefono1']; ?></td>
                <td><?php echo $mostrar['Telefono2']; ?></td>
                <td class="Opcion"> <a href="Editar/Admin_Emp-Editar.php?id=<?php echo $mostrar['Cedula']; ?>" class="btn__update"><img src="../images/Editar.png" alt="Editar" width="15"></a></td>
                <td class="Opcion"> <a href="Eliminar/Admin_Emp-Eliminar.php?ced=<?php echo $mostrar['Cedula']; ?>" class="btn__delete"><img src="../images/Eliminar.png" alt="Eliminar" width="15"></a></td>
            </tr>
        <?php }?>
    </table>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
</body>
</html>

