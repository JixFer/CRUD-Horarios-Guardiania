/*----------------VERIFICACION DE USUARIO EXISTENTE----------------*/
delimiter //
CREATE PROCEDURE Sp_VerificarUsuario (
in usuario varchar(150),
in contrasena varchar(150)
)
begin
select Usuario,Contra from USUARIO where Usuario=usuario and Contra=contrasena;
end//
delimiter ;
/*CALL Sp_VerificarUsuario('Cristian','cristian123');*/

/*--Verificacion de Pregunta--*/
/*drop procedure Sp_VerificarCon;*/
delimiter //
CREATE PROCEDURE Sp_VerificarCon (
in usuar varchar(150),
in Id_Pregunta int,
in Respuesta varchar(200)
)
begin
	select USU.Contra Contraseña from USUARIO USU, USERRESPUESTA URE
    where  URE.Id_user=(select Id_user from USUARIO where Usuario=usuar) and URE.Id_Pr=Id_Pregunta and URE.Res=Respuesta 
    and USU.Id_user=URE.Id_user;
end//
delimiter ;
/*CALL Sp_VerificarCon ('Cristian',1,'ABC1');*/

/*-------------------------------EMPLEADO-------------------------------*/
/*---Insertar datos de empleado---*/
delimiter //
CREATE PROCEDURE Sp_InsertarEmpl (
in Ci varchar(10),
in Apell1 varchar(30),
in Apell2 varchar(30),
in Nom1 varchar(30),
in Nom2 varchar(30),
in F_nac date,
in Tipo_sangre varchar(4),
in Tel1 varchar(10),
in Tel2 varchar(10),
in mail varchar(40),
in E_civil varchar(30),
in Idcargo varchar(20),
in dir varchar(10)
)
begin
	insert into EMPLEADO (Cedula,Apellido1,Apellido2,Nombre1,Nombre2,F_nac,Tipo_sangre,Telefono1,Telefono2,E_mail,Estado_civil,Id_cargo,Cod_dir)
    values (Ci,Apell1,Apell2,Nom1,Nom2,F_nac,Tipo_sangre,Tel1,Tel2,mail,E_civil,(Select Id_cargo from CARGO_EMPL where Cargo=Idcargo),dir);
end//
delimiter ;
/*select*from Empleado;
delete from Empleado where Cedula='9999999999';
CALL Sp_InsertarEmpl ('9999999999','prueba','prueba','prueba','prueba','1980-11-13','O+','2955398',null,'prueba@hotmail.com','prueba','Sacafranco','Oe9-34');
Select * from CARGO_EMPL where Cargo='Fijo';
delete from Empleado where Cedula='9999999999';
drop procedure Sp_InsertarEmpl;*/

/*---Insertar direccion de empleado---*/
delimiter //
CREATE PROCEDURE Sp_InsertarDirEmp (
in Cod_dir varchar(10),
in Calle_prin varchar(50),
in Calle_sec varchar(50),
in Sector varchar(50),
in Referencia varchar(300)
)
begin
	insert into DIR_EMPL values (Cod_dir,Calle_prin,Calle_sec,Sector,Referencia);
end//
delimiter ;
/*call Sp_InsertarDirEmp ('OE9-79','Prueba','Prueba','Prueba','Prueba');
select*from DIR_EMPL;
delete from DIR_EMPL where Cod_dir='999-99';
delete from DIR_EMPL where Cod_dir='OE9-79';*/

/*--Insertar estudios empleado--*/
delimiter //
CREATE PROCEDURE Sp_InsertarEstudios (
in Academico varchar(30),
in Capacitacion varchar(30),
in Reentrenamiento varchar(30),
in Cedula varchar(10))
begin
	insert into ESTUDIOS_EMPL (Grado_academico, Curso_capacitacion, Reentrenamiento,Cedula) 
    values(Academico,Capacitacion,Reentrenamiento,Cedula);
end//
delimiter ;
/*call Sp_InsertarEstudios ('Prueba','Prueba','Prueba','1727437582');
SELECT*FROM ESTUDIOS_EMPL;
DELETE FROM ESTUDIOS_EMPL WHERE Id_estudios=8;*/

/*---Verificar direccion mediante el codigo de la direccion---*/
delimiter //
CREATE PROCEDURE Sp_VerificarDirEmp (
in codigo varchar(150)
)
begin
	select * from DIR_EMPL where Cod_dir=codigo;
end//
delimiter ;
/*call  Sp_VerificarDirEmp ('Oe2-32');*/

/*---Verificar Empleado mediante la cedula---*/
delimiter //
CREATE PROCEDURE Sp_VerificarEmpl (
in ci varchar(10)
)
begin
	select * from EMPLEADO where Cedula=ci;
end//
delimiter ;
/*use CENTISEG;
call Sp_VerificarEmpl ('1703756442');*/

/*----------------Buscar empleado----------------*/
delimiter //
CREATE PROCEDURE Sp_BuscarEmpl (
in cadena varchar(150)
)
begin
SELECT * FROM Vis_empleado WHERE Apellido1 LIKE cadena OR Apellido2 LIKE cadena OR Nombre1 LIKE cadena ;
end//
delimiter ;
/*call Sp_BuscarEmpl('Sa%');*/

/*--SELECTDE Empleado, Direccion, Estudios --*/
delimiter //
CREATE PROCEDURE Sp_DatosEmpl (
in ced varchar(10)
)
begin
select EM.*, DIR.Calle_prin, DIR.Calle_sec, DIR.Sector, DIR.Referencia, EE.Id_estudios, EE.Grado_academico, EE.Curso_capacitacion, EE.Reentrenamiento   
from EMPLEADO EM, DIR_EMPL DIR , ESTUDIOS_EMPL EE where EM.Cedula=ced AND DIR.Cod_dir=EM.Cod_dir AND EM.Cedula=EE.Cedula;
end//
delimiter ;
/*
call Sp_DatosEmpl('9999999999');
call Sp_DatosEmpl('1703756442');*/
/*select * from EMPLEADO EM, DIR_EMPL DIR , ESTUDIOS_EMPL EE where DIR.Cod_dir=EM.Cod_dir AND EM.Cedula=EE.Cedula;
select *from DIR_EMPL;
select*from ESTUDIOS_EMPL;
select*from EMPLEADO where Cedula='9999999999';

select *from DIR_EMPL ;
delete from DIR_EMPL where Cod_dir='Ja9-99'
delete from EMPLEADO where Cedula='99999';
*/

/*describe EMPLEADO;
describe DIR_EMPL;
describe ESTUDIOS_EMPL;*/
/*--Actualizar Empleado, Direccion, Estudios --*/
delimiter //
CREATE PROCEDURE Sp_ActualizarDatosEmpl (
in Ci varchar(10),
in Apell1 varchar(30),
in Apell2 varchar(30),
in Nom1 varchar(30),
in Nom2 varchar(30),
in F_nac date,
in Tipo_sangre varchar(4),
in Tel1 varchar(10),
in Tel2 varchar(10),
in mail varchar(40),
in E_civil varchar(30),
in Idcargo varchar(20),
in dir varchar(10),
/*DIRECCION*/
in Calle_prin varchar(50),
in Calle_sec varchar(50),
in Sector varchar(50),
in Referencia varchar(300),
/*ESTUDIOS EMPL*/
in Academico varchar(30),
in Capacitacion varchar(30),
in Reentrenamiento varchar(30)
)
begin
	UPDATE EMPLEADO
	SET Cedula = Ci, Apellido1 = Apell1, Apellido2=Apell2, Nombre1=Nom1, Nombre2=Nom2, F_nac=F_nac, Tipo_sangre=Tipo_sangre, Telefono1=Tel1, 
				Telefono2=Tel2, E_mail=mail, Estado_civil=E_civil, Id_cargo=(Select Id_cargo from CARGO_EMPL where Cargo=Idcargo), Cod_dir=dir
	WHERE Cedula = Ci;
    /*IF*/
    if exists (select Cod_dir from DIR_EMPL where Cod_dir=dir) then /*En el caso de que exista el codigo de la direccion se actualiza*/
		UPDATE DIR_EMPL
		SET Cod_dir=dir, Calle_prin=Calle_prin, Calle_sec=Calle_sec, Sector=Sector,Referencia=Referencia
		WHERE Cod_dir=dir;
	else	/*Caso contrario insertar la nueva dirección*/
		insert into DIR_EMPL(Cod_dir,Calle_prin,Calle_sec,Sector,Referencia) values (dir,Calle_prin,Calle_sec,Sector,Referencia);
    end if;
    
    UPDATE ESTUDIOS_EMPL
    SET Grado_academico=Academico, Curso_capacitacion=Capacitacion, Reentrenamiento=Reentrenamiento,Cedula=Ci
    WHERE Cedula=Ci;
    select * from ESTUDIOS_EMPL;
end//
delimiter ;

/*--Eliminar empleado--*/
delimiter //
CREATE PROCEDURE Sp_EliminarEmpl (
in ced varchar(10)
)
begin
delete from EMPLEADO where Cedula=ced;
end//
delimiter ;
/*CALL Sp_EliminarEmpl ('9999999999');*/

/*-------------------------------PUESTO-------------------------------*/
/*--Identidicar Id de  puesto--*/
/*drop procedure Sp_IdentificarPuesto;*/
delimiter //
CREATE PROCEDURE Sp_IdentificarPuesto (
in Delta int,
in Puesto varchar(40),
in Tel varchar(10),
in mail varchar(40)
)
begin
SELECT Id_Puesto FROM vis_puesto WHERE N_delta=Delta AND Nombre_puesto=Puesto AND Telefono=Tel AND e_mail=mail;
end//
delimiter ;
/*SELECT * FROM vis_puesto;
SELECT Id_Puesto FROM vis_puesto WHERE N_delta=2 AND Nombre_puesto='Savona' AND Telefono='2853348' AND e_mail='holamundo@gmail.com';*/
/*call Sp_IdentificarPuesto (2,'Savona','2853348','holamundo@gmail.com');*/
/*----------------Buscar puesto----------------*/
delimiter //
CREATE PROCEDURE Sp_BuscarPuesto (
in cadena varchar(150)
)
begin
SELECT*FROM vis_puesto WHERE Nombre_puesto LIKE cadena or N_delta like cadena;
end//
delimiter ;
/*call Sp_BuscarPuesto('s%');*/
/*select*from PUESTO;*/

/*describe PUESTO;*/
/*--Insertar datos de puestos--*/
delimiter //
CREATE PROCEDURE Sp_InsertarPuesto (
in N_delta int,
in Nombre_puesto varchar(40),
in Telefono varchar(10),
in e_mail varchar(40))
begin
	insert into PUESTO (N_delta, Nombre_puesto, Telefono,e_mail) 
    values(N_delta, Nombre_puesto, Telefono,e_mail);
end//
delimiter ;
/*call Sp_InsertarPuesto(10,'Prueba','2222','hotmail.com');
select*from PUESTO;
delete from PUESTO where Id_puesto=8;
call Sp_IdentificarPuesto (9,'Trenta','292214','holamundo@gmail.com');*/
/*--Insertar direccion de puesto --*/
/*--describe DIR_PUESTO--*/
delimiter //
CREATE PROCEDURE Sp_InsertarDirPuesto (
in Cod_dir varchar(10),
in Calle_prin varchar(50),
in Calle_sec varchar(50),
in Sector varchar(100),
in Referencia varchar(300),
in Id_Puesto int)
begin
	insert into DIR_PUESTO (Cod_dir, Calle_prin, Calle_sec, Sector, Referencia, Id_puesto)
    values (Cod_dir, Calle_prin, Calle_sec, Sector, Referencia, Id_puesto);
end//
delimiter ;

/*--Insertar Insertar datos cliente --*/
/*--describe CLIENTE_PUESTO--*/
delimiter //
CREATE PROCEDURE Sp_InsertarCliPuesto (
in Nombre varchar(60),
in Telefono varchar(10),
in Celular varchar(10),
in Observacion varchar(100),
in Id_puesto int)
begin
	insert into CLIENTE_PUESTO (Nombre, Telefono, Celular, Observacion, Id_puesto)
    values (Nombre, Telefono, Celular, Observacion, Id_puesto);
end//
delimiter ;

/*--Actualizar Puesto, Direccion, Cliente --*/
/*describe PUESTO;
	describe DIR_PUESTO;
    describe CLIENTE_PUESTO;
*/
/*drop procedure Sp_ActualizarDatosPuesto;*/
delimiter //
CREATE PROCEDURE Sp_ActualizarDatosPuesto (
in Id_Pu int,
in N_Del int,
in Nom_PU varchar(40),
in Tel varchar(10),
in mail varchar(40),
/*Direccion*/
in Dir varchar(10),
in Calle1 varchar(50),
in Calle2 varchar(50),
in Sect varchar(100),
in Ref varchar(300),
/*---in Id_puesto*/
/*CLIENTE_PUESTO*/
in Nom_cli varchar(60),
in Tel_Cli varchar(10),
in Cel varchar(10),
in Obs varchar(100)
/*---in Id_puesto*/
)
begin
	UPDATE PUESTO
	SET Id_puesto=Id_Pu ,N_delta=N_Del ,Nombre_puesto=Nom_PU ,Telefono=Tel ,e_mail=mail 
	WHERE Id_puesto=Id_Pu;
    
	UPDATE DIR_PUESTO
    SET Cod_dir=Dir , Calle_prin=Calle1 , Calle_sec=Calle2 , Sector=Sect , Referencia=Ref , Id_puesto=Id_Pu
    WHERE Id_puesto=Id_Pu;
    
    UPDATE CLIENTE_PUESTO
    SET Nombre=Nom_cli , Telefono=Tel_Cli , Celular=Cel , Observacion=Obs , Id_puesto=Id_Pu
    WHERE Id_puesto=Id_Pu;
    
end//
delimiter ;

/*Mostrar todos los datos del PUESTO*/
delimiter //
CREATE PROCEDURE Sp_DatosPuesto (
in Id_Puesto int
)
begin
select PU.*, DIR.Cod_dir, DIR.Calle_prin, DIR.Calle_sec, DIR.Sector, DIR.Referencia, CP.Nombre, CP.Telefono as 'Tel_Cliente', CP.Celular, CP.Observacion
from PUESTO PU, DIR_PUESTO DIR , CLIENTE_PUESTO CP where PU.Id_puesto=Id_Puesto AND PU.Id_puesto=DIR.Id_puesto AND DIR.Id_puesto=CP.Id_puesto;
end//
delimiter ;
/*call Sp_DatosPuesto (1);
select*from CLIENTE_PUESTO;
select*from DIR_PUESTO;
select*from PUESTO;
delete from PUESTO where Id_puesto=20;
*/


/*--Eliminar Puesto--*/
delimiter //
CREATE PROCEDURE Sp_EliminarPuesto (
in Id_Pue int
)
begin
delete from PUESTO where Id_puesto=Id_Pue;
end//
delimiter ;
/*select*from PUESTO;
call Sp_EliminarPuesto (9);*/


/*-------------------------------HORARIO-------------------------------*/
/*--INSERTAR HORARIO--*/
/*drop procedure Sp_InsertarHorario;*/
delimiter //
CREATE PROCEDURE Sp_InsertarHorario (
Fec date,
Ci varchar(10),
Id_pues int,
Act varchar(10),
Jor varchar(20),
Obs varchar(1000)
)
begin
	insert into HORARIO values (Fec,Ci,Id_pues,(Select Id_actividad from ACTIVIDAD where Actividad=Act),(Select Id_jornada from JORNADA where Jornada=Jor),Obs);
end//
delimiter ;
/*CALL Sp_InsertarHorario ('2021-01-02','1716350942',1,'Turno','Nocturna','Ok');
delete from HORARIO where Fecha='2021-01-02';*/

/*--Eliminar HORARIO--*/
/*select*from HORARIO;
drop procedure Sp_EliminarHorario;*/
delimiter //
CREATE PROCEDURE Sp_EliminarHorario (
Fec date,
Ci varchar(10),
Id_pues int,
Jor varchar(20)
)
begin
	delete from HORARIO where Fecha=Fec and Cedula=Ci and Id_puesto=Id_pues and Id_jornada=(Select Id_jornada from JORNADA where Jornada=Jor);
end//
delimiter ;
/*CALL Sp_EliminarHorario ('2021-01-02','1716350942', 1,'Nocturna');
CALL Sp_EliminarHorario ('2021-03-10','1745689136','3','Nocturna');*/

/*--Verificar HORARIO--*/
delimiter //
CREATE PROCEDURE Sp_VerificarHorario (
Fec date,
/*Ci varchar(10),*/
Id_pues int,
Jor varchar(20)
)
begin
	Select * from HORARIO where Fecha=Fec /*and Cedula=Ci*/ and Id_puesto=Id_pues and Id_jornada=(Select Id_jornada from JORNADA where Jornada=Jor);
end//
delimiter ;

/*--Actualizar HORARIO--*/
delimiter //
CREATE PROCEDURE Sp_ActualizarHorario (
	Fec date,
	Ci varchar(10),
	Id_pues int,
	Act varchar(10),
	Jor varchar(20),
	Obs varchar(1000)
)
begin
	update HORARIO 
    set Fecha=Fec,Cedula=Ci,Id_puesto=Id_pues,Id_actividad=(Select Id_actividad from ACTIVIDAD where Actividad=Act),
    Id_jornada=(Select Id_jornada from JORNADA where Jornada=Jor), Observacion=Obs
    where Fecha=Fec and Id_puesto=Id_pues and  Cedula=Ci;
end//
delimiter ;
/*
select *from HORARIO;
CALL Sp_ActualizarHorario ('2021-03-09','1745689136','4', 'Turno','Nocturna','Turno noche 10 reportes');
*/

/*--Buscar HORARIO--*/
/*drop procedure Sp_BuscarHorario;*/
delimiter //
CREATE PROCEDURE Sp_BuscarHorario (
Fec1 date,/*Fecha menor*/
Fec2 date
)
begin
	/*Fecha, Cedula, Nombre, Apellido,Puesto,Delta,Cod_Puesto, Actividad, Jornada,Obs*/
	SELECT H.Fecha,H.Cedula,E.Nombre1,E.Apellido1,P.Nombre_puesto,P.N_delta,P.Id_puesto, A.Actividad,J.Jornada,H.Observacion
    FROM HORARIO H, EMPLEADO E, PUESTO P, ACTIVIDAD A, JORNADA J 
    WHERE Fecha BETWEEN Fec1 AND Fec2 AND
    H.Cedula=E.Cedula AND H.Id_puesto=P.Id_puesto AND 
    H.Id_actividad=A.Id_actividad AND H.Id_jornada=J.Id_jornada;
    /*Select*from HORARIO;
    Select*from EMPLEADO;
    Select*from PUESTO;
    Select*from ACTIVIDAD;
    Select*from JORNADA;*/
end//
delimiter ;
/* CALL Sp_BuscarHorario ('2020-01-01','2021-03-02');
*/

/*-Consultar Horario Empleado-
Drop procedure Sp_ConHorario_Empl;
*/
delimiter //
CREATE PROCEDURE Sp_ConHorario_Empl (
Fec1 date,/*Fecha menor*/
Fec2 date,
Ci varchar(10)
)
begin
	/*Fecha, Nombre1, Apellido1 ,Nombre_puesto ,N_delta ,Actividad ,Jornada, Observacion*/
	SELECT H.Fecha ,E.Nombre1 ,E.Apellido1 ,P.Nombre_puesto ,P.N_delta ,A.Actividad ,J.Jornada ,H.Observacion
    FROM HORARIO H, EMPLEADO E, PUESTO P, ACTIVIDAD A, JORNADA J 
    WHERE H.Cedula=Ci and Fecha BETWEEN Fec1 AND Fec2 AND
    H.Cedula=E.Cedula AND H.Id_puesto=P.Id_puesto AND 
    H.Id_actividad=A.Id_actividad AND H.Id_jornada=J.Id_jornada;
end//
delimiter ;
/*CALL Sp_ConHorario_Empl ('2020-01-01','2021-03-02','1716350942');*/


/*------------------------------------------USUARIO------------------------------------------*/
/*--Guardar--*/
delimiter //
CREATE PROCEDURE Sp_GuardarUser(
	par_Usuario varchar(150),
	par_Pass varchar(150),
	par_Pr1 varchar(160),
	par_Pr2 varchar(160),
	par_Pr3 varchar(160),
	par_rol int
)
begin
	INSERT INTO USUARIO values(null,par_Usuario,par_Pass,par_rol);
    INSERT INTO USERRESPUESTA values((select Id_user from USUARIO where Usuario=par_Usuario and Contra=par_Pass and Id_rol=par_rol),1,null,par_Pr1);
    INSERT INTO USERRESPUESTA values((select Id_user from USUARIO where Usuario=par_Usuario and Contra=par_Pass and Id_rol=par_rol),2,null,par_Pr2);
    INSERT INTO USERRESPUESTA values((select Id_user from USUARIO where Usuario=par_Usuario and Contra=par_Pass and Id_rol=par_rol),3,null,par_Pr3);
end//
delimiter ;

/*--Actualizar--*/
delimiter //
CREATE PROCEDURE Sp_ActualizarUser(
	par_Id_user int,
    par_Usuario varchar(150),
	par_Pass varchar(150),
	par_Pr1 varchar(160),
	par_Pr2 varchar(160),
	par_Pr3 varchar(160),
	par_rol int
)
begin
	UPDATE USUARIO SET Usuario=par_Usuario, Contra=par_Pass, Id_rol=par_rol where Id_user=par_Id_user;
    UPDATE USERRESPUESTA SET Res=par_Pr1 WHERE Id_Re=(SELECT Id_Re FROM USERRESPUESTA WHERE Id_user=par_Id_user and Id_Pr=1);
    UPDATE USERRESPUESTA SET Res=par_Pr2 WHERE Id_Re=(SELECT Id_Re FROM USERRESPUESTA WHERE Id_user=par_Id_user and Id_Pr=2);
    UPDATE USERRESPUESTA SET Res=par_Pr3 WHERE Id_Re=(SELECT Id_Re FROM USERRESPUESTA WHERE Id_user=par_Id_user and Id_Pr=3);
end//
delimiter ;

/*--Eliminar--*/
delimiter //
create procedure Sp_EliminarUser (
	par_Id_user int
)
begin
	delete from USUARIO where Id_user=par_Id_user;
end//
delimiter ;