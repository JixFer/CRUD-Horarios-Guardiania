<?php
    class metodos{

        //Funcion UTILIZADO PARA EJECUTAR SENTENCIA Y LLENAR TABLA
        public function ejecutar_tabla($cadenasql){
            $c=new conectar();
            $conexion=$c->conexion();
            $resultado=mysqli_query($conexion,$cadenasql);
            return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        }

        //Funcion UTILIZADO PARA EJECUTAR UNA SENTENCIA
        public function ejecutar($sql){
            $c=new conectar();
            $conexion=$c->conexion();
            return $resultado=mysqli_query($conexion,$sql);
        }

        //--------------------USUARIOS--------------------//
        //--VERIFICAR CONTRASEÑA--//
        public function Verificar_Con($Usua,$Id_Pre,$Res){
            $sql="CALL Sp_VerificarCon('$Usua','$Id_Pre','$Res')";
            $obj=new metodos();
            $dato=$obj->ejecutar($sql);
            if ($fila = $dato->fetch_assoc()) {//Verificar si existe la contraseña en la base
                $res=$fila['Contra'];
                echo "<script> alert('Su contraseña es : ".$res."');
                window.location= 'Ingresar.php'
                </script>";
            }
            else{
                echo "<script> alert('La respuesta es incorrecta o El usuario no se encuentra registrado');</script>";
            }
            
        }
        //--Mostrar Usuarios--//
        public function MostrarPreguntaUser($usu,$Id_Pre){
            $sql="SELECT res FROM USERRESPUESTA WHERE Id_user=$usu and Id_Pr=$Id_Pre;";
            //var_dump($sql);
            $dato=self::ejecutar($sql);
            if ($fila = $dato->fetch_assoc()) {//Obtener el id del puesto
                $id=$fila['res'];
            }
            //var_dump($id);
            return $id;
        }

        public function mostrarDatos_Usu(){
            $sql="SELECT*FROM Vis_Usuario";
            return self::ejecutar_tabla($sql);
        }
        
        public function GuardarDatos_Usu($arreglo){
            $sql="CALL Sp_GuardarUser('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]','$arreglo[4]','$arreglo[5]');";
            return self::ejecutar($sql);
        }
        public function Actualizar_Usuario($arreglo){
            $sql="CALL Sp_ActualizarUser('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]','$arreglo[4]','$arreglo[5]','$arreglo[6]');";
            var_dump($sql);
            return self::ejecutar($sql);
        }

        public function EliminarUsuario($cadena){
            $sql="CALL Sp_EliminarUser('$cadena')";
            //var_dump($cadena);
            //self::ejecutar($sql);
            $bool=self::ejecutar($sql);
            //var_dump($bool);
            if ($bool==true){
                echo"<script> window.location= '../Admin_User.php';
                alert('Se ha eliminado los datos correctamente del usuario');</script>";
            }
        }

        //--------------------EMPLEADO--------------------//
        public function mostrarDatos_EMP(){
            $sql="SELECT*FROM Vis_empleado";
            return self::ejecutar_tabla($sql); //Es lo mismo que $obj=new metodos();
                                        // echo obj->ejecutar($sql);
        }
        
        public function buscarEmpl($cadena){
            $sql="CALL Sp_BuscarEmpl('".$cadena."%'".")";
            //var_dump($sql);
            return self::ejecutar_tabla($sql);
        }
        
        public function insertarEmpl($arreglo){ //El orden de los arreglos se puede verificar en Admin_Emp-Insert.php
            //var_dump($arreglo);
            // var_dump($sql);
            $ci="CALL Sp_VerificarEmpl ('$arreglo[5]');";
            if (mysqli_num_rows(self::ejecutar($ci))==0){//Valida que el empleado no este registrado

                //(Cedula,Apellido1,Apellido2,Nombre1,Nombre2,
                // F_nac,Tipo_sangre,Telefono1,Telefono2,E_mail,Estado_civil,Id_cargo,Cod_dir)
                $sql1="CALL Sp_InsertarEmpl ('$arreglo[5]','$arreglo[6]',
                '$arreglo[7]','$arreglo[8]','$arreglo[9]','$arreglo[10]','$arreglo[11]',
                '$arreglo[12]','$arreglo[13]','$arreglo[14]','$arreglo[15]','$arreglo[16]',
                '$arreglo[0]')";//Aun no se ejecuta la sentencia(En el if se va a ejecutar)
                $sql3="CALL Sp_InsertarEstudios ('$arreglo[17]','$arreglo[18]','$arreglo[19]','$arreglo[5]')";
                $Cod_dir="CALL Sp_VerificarDirEmp('$arreglo[0]')";
                if (mysqli_num_rows(self::ejecutar($Cod_dir))==0){//Valida que la dirección no esta registrada
                    //La direccion no esta registrada, registra direccion y empleado
                    //(Cod_dir,Calle_prin,Calle_sec,Sector,Referencia)
                    $sql2="CALL Sp_InsertarDirEmp ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]','$arreglo[4]')";
                    self::ejecutar($sql2); //Direccion
                    self::ejecutar($sql1); //Empleado
                    self::ejecutar($sql3); //Estudios                    
                }
                else{
                    //La direccion esta registrada solo cargar datos de empleado y estudios
                    self::ejecutar($sql1); //Empleado
                    self::ejecutar($sql3); //Estudios
                }
                echo"<script> alert('Se ha registrado correctamente los datos del empleado');</script>";
                header("location: ../Admin_Emp.php");
            }
            else{
                echo"<script> alert('El empleado ya se encuentra registrado');</script>";
            }
        }
        
        public function ActualizarEmpl($arreglo){ //El orden de los arreglos se puede verificar en Admin_Emp-Insert.php
            //var_dump($arreglo);
            $sql="CALL Sp_ActualizarDatosEmpl ('$arreglo[5]','$arreglo[6]',
            '$arreglo[7]','$arreglo[8]','$arreglo[9]','$arreglo[10]','$arreglo[11]',
            '$arreglo[12]','$arreglo[13]','$arreglo[14]','$arreglo[15]','$arreglo[16]',
            '$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]','$arreglo[4]',
            '$arreglo[17]','$arreglo[18]','$arreglo[19]')";
            //var_dump($sql);
            self::ejecutar($sql);
            //header("location: ../Admin_Emp.php");
            //echo"<script> alert('Se ha registrado correctamente los datos del empleado');</script>";
                echo"<script> alert('Se ha actualizado los datos correctamente del empleado : ".$arreglo[8]." ".$arreglo[6]."');
                window.location= '../Admin_Emp.php'</script>";
            
        }

        public function EliminarEmpl($cadena){
            $sql="CALL Sp_EliminarEmpl('$cadena')";
            //var_dump($cadena);
            //self::ejecutar($sql);
            $bool=self::ejecutar($sql);
            //var_dump($bool);
            if ($bool==true){
                echo"<script> alert('Se ha eliminado los datos correctamente del empleado');
                window.location= '../Admin_Emp.php';</script>";
            }else{
                echo"<script>alert('No puede ser eliminado el empleado debido a que tiene datos en HORARIO');
                window.location= '../Admin_Emp.php';</script>";
            }
        }
            



        //--------------------PUESTO--------------------//
        public function mostrarDatos_PUESTO(){
            $sql="SELECT*FROM Vis_puesto";
            return self::ejecutar_tabla($sql); //mysqli_fetch_all($resultado);
        }
        
        public function buscarPuesto($cadena){
            $sql="CALL Sp_BuscarPuesto('".$cadena."%'".")";
            //var_dump($sql);
            return self::ejecutar_tabla($sql);
        }

        public function VerificarId_Puesto($arreglo){
            $sql="CALL Sp_IdentificarPuesto ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]')";
            //var_dump($sql);
            $dato=self::ejecutar($sql);
            if ($fila = $dato->fetch_assoc()) {//Obtener el id del puesto
                $id=$fila['Id_puesto'];
            }
            return $id;
        }

        public function InsertarPuesto($arreglo){
            //var_dump($arreglo);
            // var_dump($sql);
            $id1="CALL Sp_IdentificarPuesto ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]')";
            //var_dump($id1);
            if (mysqli_num_rows(self::ejecutar($id1))==0){//Valida que el puesto no este registrado
                //(Cedula,Apellido1,Apellido2,Nombre1,Nombre2,
                // F_nac,Tipo_sangre,Telefono1,Telefono2,E_mail,Estado_civil,Id_cargo,Cod_dir)
                $sql1="CALL Sp_InsertarPuesto ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]')";
                self::ejecutar($sql1);
                $id=self::VerificarId_Puesto($arreglo);//Obtener el id del puesto
                $sql2="CALL Sp_InsertarDirPuesto ('$arreglo[4]','$arreglo[5]','$arreglo[6]','$arreglo[7]','$arreglo[8]','$id')";
                $sql3="CALL Sp_InsertarCliPuesto('$arreglo[9]','$arreglo[10]','$arreglo[11]','$arreglo[12]','$id')";
                    self::ejecutar($sql2); //Direccion
                    self::ejecutar($sql3); //Cliente                   
                
                echo"<script> window.location= '../Admin_Puesto.php';
                alert('Se ha registrado correctamente los datos del PUESTO');</script>";
            }
            else{
                echo"<script>window.location= '../Admin_Puesto.php';
                alert('El Puesto ya se encuentra registrado');</script>";
            }
        }

        public function ActualizarPuesto($arreglo){
            $sql="CALL Sp_ActualizarDatosPuesto ('$arreglo[0]','$arreglo[1]','$arreglo[2]',
            '$arreglo[3]','$arreglo[4]','$arreglo[5]','$arreglo[6]','$arreglo[7]',
            '$arreglo[8]','$arreglo[9]','$arreglo[10]','$arreglo[11]','$arreglo[12]',
            '$arreglo[13]')";
            //var_dump($sql);
            self::ejecutar($sql);
            //echo"<script> alert('Se ha registrado correctamente los datos del empleado');</script>";
            echo"<script> alert('Se ha actualizado los datos correctamente del Puesto : ".$arreglo[2]."');
                window.location= '../Admin_Puesto.php'</script>"; 
        }

        public function EliminarPuesto($cadena){
            $sql="CALL Sp_EliminarPuesto('$cadena')";
            //var_dump($cadena);
            //self::ejecutar($sql);
            $bool=self::ejecutar($sql);
            //var_dump($bool);
            if ($bool==true){
                echo"<script>alert('Se ha eliminado los datos correctamente del puesto');
                window.location= '../Admin_Puesto.php';</script>";
            }else{
                echo"<script>alert('El puesto no puede ser eliminado, debido a que tiene datos en HORARIO');
                window.location= '../Admin_Puesto.php';</script>";
            }
        }


        //--------------------HORARIO--------------------//
        public function mostrarDatos_HOR($f1,$f2){
            $sql="CALL Sp_BuscarHorario('$f1','$f2')";
            return self::ejecutar_tabla($sql);
        }


        //MOSTRAR HORARIO AL PERSONAL QUE ACCEDA A LA WEB
        public function mostrarHor_Publico($f1,$f2,$ci){
            $sql="CALL Sp_ConHorario_Empl('$f1','$f2',$ci)";
            return self::ejecutar_tabla($sql);
        }

        public function InsertarHorario($arreglo){
            $sql="CALL Sp_VerificarHorario ('$arreglo[0]','$arreglo[2]','$arreglo[4]')";
            //var_dump($sql);
            $dato=self::ejecutar($sql);
            //var_dump($dato);
            if (mysqli_num_rows($dato)==FALSE){
                $sql2="CALL Sp_InsertarHorario ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]','$arreglo[4]','$arreglo[5]')";
                //var_dump($sql2);
                self::ejecutar($sql2);
                echo"<script> alert('Se ha registrado correctamente el Horario ');
                window.location= '../Admin_Horario.php';</script>";
                
            }else{
                echo"<script>alert('Se encontro datos registrados con este horario');
                window.history.go(-1)</script>";    
            }
        }

        public function ActualizarHorario($arreglo){
            $sql="CALL Sp_ActualizarHorario ('$arreglo[0]','$arreglo[1]','$arreglo[2]',
            '$arreglo[3]','$arreglo[4]','$arreglo[5]')";
            //var_dump($sql);
            self::ejecutar($sql);
            echo"<script> alert('Se ha actualizado correctamente los datos del horario');
            window.location= '../Admin_Horario.php';</script>";
            //<script> window.history.go(-2);
            // window.location.reload();</script>";
        }

        public function EliminarHorario($arreglo){
            $sql="CALL Sp_EliminarHorario ('$arreglo[0]','$arreglo[1]','$arreglo[2]','$arreglo[3]');";
            //var_dump($sql);
            self::ejecutar($sql);
            echo"<script>alert('Se ha eliminado los datos correctamente del horario');
            window.location= '../Admin_Horario.php';</script>";
        }

    }
?>