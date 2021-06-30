create database CENTISEG;
use CENTISEG;

SHOW TABLES;
create table CARGO_EMPL( /*Fijo, Sacafranco o practicante o desvinculado*/
	Id_cargo varchar(2) not null,
    Cargo varchar(35) not null,
    primary key (Id_cargo)
);
/*----------------------INSERTAR REGISTROS CARGO_EMPL----------------------*/
insert into CARGO_EMPL values('Fi','Fijo');
insert into CARGO_EMPL values('Sa','Sacafranco');
insert into CARGO_EMPL values('Pr','Practicante');
insert into CARGO_EMPL values('De','Desvinculado');
/*select*from cargo_empl;*/


create table DIR_EMPL( 
	Cod_dir varchar(10),
    Calle_prin varchar(50) NOT NULL,
    Calle_sec varchar(50) NOT NULL,
    Sector varchar(50) NOT NULL,
    Referencia varchar(300),
    primary key (Cod_Dir)
);
/*----------------------INSERTAR REGISTROS DIR_EMPL----------------------*/
insert into DIR_EMPL values ('Oe9-34','Garcia Moreno','Eduardo Garcinez','Llano Grande','A lado de unidad educativa Bethren');
insert into DIR_EMPL values ('Oe9-44','Garcia Moreno','Matilde Hidalgo','Llano Grande','Frente a un conjunto');
insert into DIR_EMPL values ('Oe3-12','Loja','Av. Mariscal Sucre','Centro Historico','Frente al mercado');
insert into DIR_EMPL values ('Oe4-22','AV.  Maldona','La que cruza','Sur de QUito','En la esquina');
insert into DIR_EMPL values ('Oe2-32','Sofia Gonzales','Av. Simon Bolivar','Llano Chico','A lado de unidad educativa Hola mundo');
/*SELECT*FROM DIR_EMPL;*/


create table EMPLEADO(
    Cedula varchar(10) not null,
    Apellido1 varchar(30)not null,
    Apellido2 varchar(30) not null,
    Nombre1 varchar(30) not null,
    Nombre2 varchar(30) not null,
    F_nac date,
    Tipo_sangre varchar(4) not null,/*Ej: AB +*/
    Telefono1 varchar(10),
    Telefono2 varchar(10),
    E_mail varchar(40),
    Estado_civil varchar(30),
    Id_cargo varchar(2),
    Cod_dir varchar(10),/*Tiendo en cuenta que varios empleados pueden tener la misma direccion*/
    primary key (Cedula),
    foreign key (Id_cargo) references CARGO_EMPL(Id_cargo) on update cascade,
    foreign key (Cod_dir) references DIR_EMPL(Cod_dir) 
);
describe empleado;
/*select * from DIR_EMPL D where  D.Cod_dir=(select E.Cod_dir FROM empleado E where E.cedula='1716350942');*/
/*----------------------INSERTAR REGISTROS EMPLEADOS----------------------*/
insert into EMPLEADO values (1716350942,'Vilela','Zambrano','Alexander','Javier','1980-11-13','O+','2955398',null,'alexa.vilela@hotmail.com','Soltera','Fi','Oe9-34');
insert into EMPLEADO values (1703756442,'Mora','Vilela','Cristian','Ivan','1997-02-11','O+',null,'2922345','moracris@hotmail.com','Soltero','Fi','Oe9-44');
insert into EMPLEADO values (1745689136,'Mora','Vilela','Jixon','Fernando','1998-02-28','O+','2448714','0984449211','jixonmora@hotmail.com','Divorciado','Fi','Oe3-12');
insert into EMPLEADO values (1733456789,'Quiroz','Cedeño','Jhonny','Erick','1999-07-11','AB+','2922389','096555432','erick_27@hotmail.com','Soltero','Sa','Oe4-22');
insert into EMPLEADO values (1723422125,'Salazar','Angulo','Miguel','Luis','1985-02-06','O+',null,'2955341','lmiguelsa02@hotmail.com','Soltero','Sa','Oe2-32');
/*select*from EMPLEADO;*/


create table ESTUDIOS_EMPL(
	Id_estudios int auto_increment, /*AUTO-INCREMENT*/
    Grado_academico varchar(30) not null,
    Curso_capacitacion varchar(30),
    Reentrenamiento varchar (30),
    Cedula varchar(10),
    primary key (Id_estudios),
    foreign key (Cedula) references EMPLEADO(Cedula) on delete cascade
);
/*----------------------INSERTAR REGISTROS DIR_EMPL----------------------*/
insert into ESTUDIOS_EMPL values(null,'Bachiller','Capaseg','Capaseg',1716350942);
insert into ESTUDIOS_EMPL values(null,'Bachiller','Capaseg','Capaseg',1703756442);
insert into ESTUDIOS_EMPL values(null,'Bachiller','Capaseg','Capaseg',1745689136);
insert into ESTUDIOS_EMPL values(null,'Bachiller','Capaseg','Capaseg',1733456789);
insert into ESTUDIOS_EMPL values(null,'Bachiller','Capaseg','Capaseg',1723422125);

/*select*from estudios_empl;*/


create table PUESTO(
	Id_puesto int auto_increment, /*AUTO INCREMENT*/
	N_delta int not null, /*El numero de delta suele cambiar, cada que se adquiere un  puesto nuevo, PERO ESTE NO DEBE REPETIRSE*/
    Nombre_puesto varchar(40),
    Telefono varchar(10),
    e_mail varchar(40),
    primary key (Id_puesto)
);
/*----------------------INSERTAR REGISTROS PUESTO----------------------*/
insert into PUESTO values (null,1,'Scavolini','2912348','holamundo@gmail.com');
insert into PUESTO values (null,2,'Savona','2853348','holamundo@gmail.com');
insert into PUESTO values (null,3,'Tesla','2523579','holamundo@gmail.com');
insert into PUESTO values (null,4,'Luxemburgo','2431678','holamundo@gmail.com');
insert into PUESTO values (null,5,'Trento','2922146','holamundo@gmail.com');
/*select * from PUESTO;*/


create table DIR_PUESTO( 
	Cod_dir varchar(10),
    Calle_prin varchar(50) not null,
    Calle_sec varchar(50) not null,
    Sector varchar(100) not null,
    Referencia varchar(300),
    Id_puesto int,
    primary key (Cod_Dir),
    foreign key (Id_puesto) references PUESTO (Id_puesto) on update cascade on delete cascade /*Debido a que puede tener varias sucursales "1 puesto a Varias direcciones"*/
);
/*----------------------INSERTAR REGISTROS DIR_PUESTO----------------------*/
insert into DIR_PUESTO values ('Eo2-34','Av. Shyris','La que cruza','Carolina','Frente a un edificio',1);
insert into DIR_PUESTO values ('Jo1-12','Av. 6 diciembre','La que cruza','Norte','Frente a una casa',2);
insert into DIR_PUESTO values ('Qo2-24','Av. Galo Plaza','La que cruza','Norte','A lado de una calle',3);
insert into DIR_PUESTO values ('Oe9-94','Av. Maldonado','La que cruza','Sur','Frente a un carro blanco',4);
insert into DIR_PUESTO values ('Su4-34','Av. Simon Bolivar','La que cruza','Sur','Frente a tu ñaña',5);
/*select * from DIR_PUESTO;*/


create table CLIENTE_PUESTO(
	Nombre varchar(60) not null,
    Telefono varchar(10),
    Celular varchar(10),
    Observacion varchar(100), /*SE COLOCA EL CARGO DENTRO DEL EDIFICIO EJ: ADMINISTRADOR*/
    Id_puesto int,
    primary key (Id_puesto,Nombre), /*Para evitar que se repita información*/
    foreign key (Id_puesto) references PUESTO (Id_puesto) on delete cascade on update cascade
);
/*----------------------INSERTAR REGISTROS CLIENTE_PUESTO----------------------*/
insert into CLIENTE_PUESTO values ('Juan Cedeño','2944312','0962238111','Administrador',1);
insert into CLIENTE_PUESTO values ('Juan Zapata','2932462','0962238111','Administrador',2);
insert into CLIENTE_PUESTO values ('Carlos Moreira','2861712','0962238111','Administrador',3);
insert into CLIENTE_PUESTO values ('Jenny Ayala','2911234','0962238111','Administrador',4);
insert into CLIENTE_PUESTO values ('Melisa Zambrano','2865190','0962238111','Administrador',5);
/*select*from CLIENTE_PUESTO;*/


create table REPORTES(
	Fecha date,
    Cantidad int,
    Cedula varchar(10),
    Id_puesto int,
    primary key (Fecha,Id_puesto), /*pk compuesta entre fecha y el puesto*/
    foreign key (Cedula) references EMPLEADO(Cedula),
    foreign key (Id_puesto) references PUESTO(Id_puesto)   
);
/*----------------------INSERTAR REGISTROS REPORTES----------------------*/
insert into REPORTES values ('2021-01-10',4,'1716350942',1);
insert into REPORTES values ('2021-01-10',6,'1703756442',2);
insert into REPORTES values ('2021-01-10',2,'1745689136',3);
insert into REPORTES values ('2021-01-10',3,'1733456789',4);
insert into REPORTES values ('2021-01-10',1,'1723422125',5);
/*select*from REPORTES;*/


create table JORNADA( /*Diurna y nocturna*/
	Id_jornada varchar(3),
    Jornada varchar(20),
    primary key (Id_jornada)
);
/*----------------------INSERTAR REGISTROS JORNADA----------------------*/
insert into JORNADA values ('DIU','Diurna');
insert into JORNADA values ('NOC','Nocturna');
insert into JORNADA values ('24H','24 Horas');
/*Solo se establecieron 3 jornadas*/
/*select*from JORNADA;*/


create table ACTIVIDAD(
	Id_actividad varchar(3),
    Actividad varchar(10),
    primary key(Id_actividad)
);
insert into ACTIVIDAD values ('Tur','Turno');
insert into ACTIVIDAD values ('Des','Descansa'); /*Dia libre*/
insert into ACTIVIDAD values ('Per','Permiso');
insert into ACTIVIDAD values ('Fal','Falta');
insert into ACTIVIDAD values ('Vac','Vacaciones');
/*select*from ACTIVIDAD;*/


create table HORARIO(
	Fecha date not null,
    Cedula varchar(10),
    Id_puesto int,
    Id_actividad varchar(3),
    Id_jornada varchar(3),
    Observacion varchar(1000),
    primary key (Fecha,Id_puesto,Id_jornada), /*pk compuesto entre fecha, puesto y Jornada*/
    foreign key (Cedula) references EMPLEADO(Cedula),
    foreign key (Id_puesto) references PUESTO(Id_puesto),
    foreign key (Id_actividad) references ACTIVIDAD(Id_actividad) on update cascade,
    foreign key (Id_jornada) references JORNADA(Id_jornada) on update cascade
);
/*----------------------INSERTAR REGISTROS HORARIO----------------------*/
insert into HORARIO values ('2021-01-10','1716350942',1,'Tur','DIU','Señor se encontro dormido en el punto');
insert into HORARIO values ('2021-01-10','1703756442',2,'Tur','DIU','ok');
insert into HORARIO values ('2021-01-12','1745689136',3,'Tur','DIU','ok');
insert into HORARIO values ('2021-01-12','1733456789',4,'Des','DIU','ok');
insert into HORARIO values ('2021-01-15','1723422125',5,'Fal','DIU','Falto y lo cubrio el Sr....');
insert into HORARIO values ('2021-01-16','1723422125',5,'Per','DIU','Permiso hasta el 18/01');
/*select*from horario;*/

/*---------------------------------PARA EL INGRESO DE USUARIOS-----------------*/
create table ROL(
	Id_rol int auto_increment,
    Rol varchar(200),
    primary key (Id_rol)
);
INSERT INTO ROL values(null,'Administrador');

create table USERPREGUNTAS(
	Id_Pr int,
    Preg varchar(160),
    primary key(Id_Pr)
);
INSERT INTO USERPREGUNTAS values(1,'¿Cuál es tu comida favorita?');
INSERT INTO USERPREGUNTAS values(2,'¿Cómo se llamaba tu primera mascota?');
INSERT INTO USERPREGUNTAS values(3,'¿En que ciudad se conocieron tus padres?');
/*select*from USERPREGUNTAS;*/

create table USUARIO(
	Id_user int auto_increment,
    Usuario varchar(150),
    Contra varchar(150),
    Id_rol int,
    primary key (Id_user),
    foreign key (Id_rol) references ROL (Id_rol)
);
INSERT INTO USUARIO values(null,'Admin','123',1);
INSERT INTO USUARIO values(null,'Cristian','cristian123',1);
/*select*from USUARIO;*/
/*drop table USERRESPUESTA */
create table USERRESPUESTA(
	Id_user int,
    Id_Pr int,
	Id_Re int auto_increment,
    Res varchar(200),
    primary key (Id_Re),
    foreign key(Id_user) references USUARIO(Id_user) on delete cascade on update cascade,
    foreign key(Id_Pr) references USERPREGUNTAS(Id_Pr)
);
INSERT INTO USERRESPUESTA values(1,1,null,'Admin1');
INSERT INTO USERRESPUESTA values(1,2,null,'Admin2');
INSERT INTO USERRESPUESTA values(1,3,null,'Admin3');
INSERT INTO USERRESPUESTA values(1,1,null,'ABC1');
INSERT INTO USERRESPUESTA values(2,2,null,'ABC2');
INSERT INTO USERRESPUESTA values(2,3,null,'ABC3');
/*SELECT*FROM USERRESPUESTA;*/







