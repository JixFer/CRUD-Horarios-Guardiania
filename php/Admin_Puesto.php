<?php
require_once("Procesos/Con_bd.php");
require_once("Procesos/Funciones.php");
include("Encabezado.php");

    $obj=new metodos();
    $datos=$obj->mostrarDatos_PUESTO();
    // metodo buscar
    if(isset($_POST['btn_buscar'])){
        $buscar=$_POST['buscar'];
        $obj=new metodos();
        //var_dump($buscar); //Verificacion de los datos que se envian..
        $datos=$obj-> buscarPuesto($buscar);
    }
?>


<div class="contenedor">
    <h1>PUESTO</h1>
    <div class="barra_buscador">
        <form action="" class="formulario" method="post">
            <input type="text" name="buscar" placeholder="Buscar delta o puesto" class="input__text">
            <input type="submit" class="btn" name="btn_buscar" value="Buscar">
            <a href="Insertar/Admin_Puesto-Insert.php" class="btn btn__nuevo">Nuevo</a>
        </form>
    </div>
    
    <table>
        <tr class="head">
            <td>Delta</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Email</td>
            <td colspan="2">Accion</td>
        </tr>
        <?php 
            foreach ($datos as $mostrar) {
        ?>
            <tr >
                <td><?php echo $mostrar['N_delta']; ?></td>
                <td><?php echo $mostrar['Nombre_puesto']; ?></td>
                <td><?php echo $mostrar['Telefono']; ?></td>
                <td><?php echo $mostrar['e_mail']; ?></td>
                <td class="Opcion"> <a href="Editar/Admin_Puesto-Editar.php?Delta=<?php echo $mostrar['N_delta']?>&Nom=<?php echo $mostrar['Nombre_puesto']?>&Tel=<?php echo $mostrar['Telefono']?>&Mail=<?php echo $mostrar['e_mail']?>" class="btn__update"><img src="../images/Editar.png" alt="Editar" width="15"></a></td>
                <td class="Opcion"> <a href="Eliminar/Admin_Puesto-Eliminar.php?Delta=<?php echo $mostrar['N_delta']?>&Nom=<?php echo $mostrar['Nombre_puesto']?>&Tel=<?php echo $mostrar['Telefono']?>&Mail=<?php echo $mostrar['e_mail']?>" class="btn__delete"><img src="../images/Eliminar.png" alt="Eliminar" width="15"></a></td>
            </tr>
        <?php }?>
    </table>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
</body>
</html>

