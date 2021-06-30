<?php
require_once("../Procesos/Con_bd.php");
require_once("../Procesos/Funciones.php");
include("../Encabezado crud.php");

    //Si existe datos en el btn_
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

        $obj=new metodos();
        $obj->insertarEmpl($datos);

        /*-----------------Llamar directamente en la funcion----------------- */
        // $obj=new metodos();
        // if($obj->insertarEmpl($datos)){/*Verifica si ingresa al metodo */
        //     echo ('Ingreso al if');
        //     //header("location: Admin_Emp.php"); //LLAMAR A LA PAGINA CUANDO Se REGISTRE CASO CONTRARIO MANDAR MENSAJE
        // }else{
        //     echo "Fallo al agregar datos :D";
        // }
    }

?>
<div class="contenedor">
    <h2>INSERTAR NUEVO EMPLEADO</h2>
    <h3>DATOS PRINCIPALES</h3>
    <form action="" method="post">
        <div class="form-group">
            <span><label for="num_cedula">Ingrese el numero de cedula :</label></span>
            <input type="text" name="cedula" placeholder="Cedula" class="input__text" id="num_cedula" maxlength="10" minlength="10" required onkeyup="ValidarCedula()" onkeypress='return validaNumericos(event)'>
        </div>
        <div class="form-group">
            <input type="text" name="apellido1" placeholder="Apellido Paterno" class="input__text"  maxlength="30" required>
            <input type="text" name="apellido2" placeholder="Apellido Materno" class="input__text" maxlength="30" required>
            <input type="text" name="nombre1" placeholder="Primer Nombre" class="input__text" maxlength="30" required>
            <input type="text" name="nombre2" placeholder="Segundo Nombre" class="input__text" maxlength="30" required>
        </div>
        <div class="form-group">
            <span> <label for="fecha_nac"> Ingrese fecha de nacimiento :</label></span>
            <input type="date" name="F_nac" placeholder="Fecha de nacimiento" id="fecha_nac" class="input__text" required>
            <span> <label for="tipo_sangre" >Ingrese tipo de sangre :</span>
            <select name="T_sangre" class="input__text" id="tipo_sangre" required>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <div class="form-group">
            <span> <label for="estado_civil"> Ingrese su estado civil :</label></span>
            <select name="E_civil" id="estado_civil" class="input__text" required>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Unión libre">Unión libre</option>
                <option value="Separado">Separado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
            </select>
            <input type="tel" name="Telefono1" placeholder="Teléfono 1" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
            <input type="tel" name="Telefono2" placeholder="Teléfono 2" class="input__text" maxlength="10" onkeypress='return validaNumericos(event)'>
        </div>
        <div class="form-group">
            <input type="email" name="Email" placeholder="Correo electronico" class="input__text" maxlength="40">
        </div>
        <h3>DIRECCIÓN</h3>
        <div class="form-group">
            <input type="text" name="cod_dir" placeholder="Código de direccion Ej: Oe9-79" class="input__text" maxlength="10" required>
            <input type="text" name="calle_pr" placeholder="Calle principal" class="input__text" maxlength="50" required>
            <input type="text" name="calle_se" placeholder="Calle secundaria" class="input__text" maxlength="50" required>
            <input type="text" name="sector" placeholder="Sector" class="input__text" maxlength="50">
        </div>
        <div class="form-group">
            <input type="text" name="ref" placeholder="Referencia de su domicilio" class="input__text" maxlength="300">
        </div>
        <h3>ESTUDIOS</h3>
        <div class="form-group">
            <span> <label for="instruccion_formal"> Ingrese su grado academico :</label></span>
            <select name="instruccion" id="instruccion_formal" class="input__text" required>
                <option value="Primaria">Primaria</option>
                <option value="Bachiller">Bachiller</option>
                <option value="Tercer nivel">Tercer nivel</option>
            </select>
            <input type="text" name="capacitacion" placeholder="Curso de capacitacion" class="input__text" maxlength="30">
            <input type="text" name="reentrenamiento" placeholder="Reentrenamiento" class="input__text" maxlength="30">
        </div>
        <h3>CARGO A ASIGNAR DE EMPLEADO</h3>
        <div class="form-group">
            <span> <label for="asig_cargo"> Cargo que se que se asignara : </label></span>
            <select name="cargo" id="asig_cargo" class="input__text" maxlength="40" requied>
                <option value="Fijo">Fijo</option>
                <option value="Sacafranco">Sacafranco</option>
                <option value="Practicante">Practicante</option>
                <option value="Desvinculado">Desvinculado</option>
            </select>
        </div>
        <div class="btn__group__center">
            <a href="../Admin_Emp.php" class="btn btn__danger">Cancelar</a>
            <input type="submit" name="btn_guardar" value="Guardar" class="btn btn__primary">
        </div>
    </form>
</div><!--contenedor-->
</div><!-- fin contenedor_principal  -->
<script src="../../js/Procesos.js"></script>
</body>
</html>

