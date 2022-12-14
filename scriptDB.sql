create database HospitalDC;
\c hospitaldc

create table usuarios(
    correo varchar not null primary key,
    pass varchar not null,
    nombre varchar not null,
    num_tel integer not null,
    sexo varchar not null
);

create table especialidad(
    id_esp serial primary key,
    descripcion varchar
);

create table u_paciente(
    correo_pac varchar references usuarios(correo) on update cascade on delete cascade,
    id_paciente serial not null,
    edad integer not null,
    primary key(correo_pac,id_paciente)
);

create table u_doctor(
    correo_doc varchar references usuarios(correo) on update cascade on delete cascade,
    id_doctor serial not null,
    id_esp int references especialidad,
    cedula numeric(8) not null,
    primary key(correo_doc,id_doctor)
);

create table cita(
    id_cita serial primary key,
    correo_pac varchar not null,
    correo_doc varchar not null,
    id_doctor int,
    id_paciente int,
    FOREIGN key (correo_doc, id_doctor) references u_doctor on update cascade on delete cascade,
    FOREIGN key (correo_pac, id_paciente) references u_paciente on update cascade on delete cascade
);

create table des_cita(
    cns int not null,
    asunto varchar,
    fecha date,
    hora time,
    estado varchar default 'PENDIENTE',
    id_cita integer references cita on delete cascade,
    primary key(id_cita,cns)
);

create table historial (
    id_hist serial primary key,
    id_cita integer ,
    asunto varchar(255),
    fecha date,
    hora time,
    correo_pac varchar(255),
    correo_doc varchar(255) ,
    id_doctor int,
    id_paciente int 
);


--------------------------------------PASANDO A MYSQL------------------------------------------------------------------------------------
create table usuarios(
    correo varchar(255) not null primary key,
    pass varchar(255) not null,
    nombre varchar(255) not null,
    num_tel bigint not null,
    sexo varchar(255) not null
);

--DATOS DE PRUEBA
INSERT INTO usuarios VALUES('LOLA@GMAIL.COM', '12345', 'LOLA CORTEZ', 9621453371, 'FEMENINO');
INSERT INTO usuarios VALUES('JULIO@GMAIL.COM', '12773', 'JULIO GA,A', 9621453221, 'MASCULINO');

create table especialidad(
    id_esp serial primary key,
    descripcion varchar(255)
);

INSERT INTO especialidad(descripcion) VALUES('GASTROENTEROLOGIA');
INSERT INTO especialidad(descripcion) VALUES('MEDICINA FAMILIAR');
INSERT INTO especialidad(descripcion) VALUES('RADIOLOGIA');

create table u_paciente(
    correo_pac varchar(255) references usuarios(correo) on update cascade on delete cascade,
    id_paciente serial not null,
    edad integer not null,
    primary key(correo_pac,id_paciente)
);

INSERT INTO u_paciente(correo_pac,edad) VALUES('LOLA@GMAIL.COM',22);

create table u_doctor(
    correo_doc varchar(255) references usuarios(correo) on update cascade on delete cascade,
    id_doctor serial not null,
    id_esp int references especialidad(id_esp),
    cedula numeric(8) not null,
    primary key(correo_doc,id_doctor)
);

INSERT INTO u_doctor(correo_doc,id_esp,cedula) VALUES('JULIO@GMAIL.COM',2, 19826432);

create table cita(
    id_cita serial primary key,
    correo_pac varchar(255) not null references u_paciente(correo_pac) on update cascade on delete cascade,
    correo_doc varchar(255) not null references u_doctor(correo_doc) on update cascade on delete cascade,
    id_doctor int references u_doctor(id_doctor) on update cascade on delete cascade,
    id_paciente int references u_paciente(id_paciente) on update cascade on delete cascade
);

INSERT INTO cita(correo_pac,correo_doc,id_doctor,id_paciente) VALUES('LOLA@GMAIL.COM','JULIO@GMAIL.COM',1,1);

create table det_cita(
    cns serial not null,
    asunto varchar(255),
    fecha date,
    hora time,
    estado varchar(255) default 'PENDIENTE',
    id_cita integer references cita(id_cita) on delete cascade,
    primary key(id_cita,cns)
);

INSERT INTO det_cita(asunto,fecha,hora,id_cita) VALUES('Sintomas de gripe','2022-11-08','08:00:00',1);


create table historial (
    id_hist serial primary key,
    id_cita integer ,
    asunto varchar(255),
    fecha date,
    hora time,
    correo_pac varchar(255),
    correo_doc varchar(255) ,
    id_doctor int,
    id_paciente int 
);


---------------------------------SINTAXIS EN MYSQL---
-----------------------Trigger a ejecutar despues de eliminar en la tabla Cita-----------------------------------------
--ELIMINANDO EL TRIGGER POR SI ACASO
-- DROP TRIGGER TgInsercionHistorial1;

DELIMITER $$
CREATE TRIGGER TgInsercionHistorial1 
AFTER DELETE ON Cita 
FOR EACH ROW 
BEGIN 
    SET @asunto= (SELECT asunto from det_cita where id_cita=old.id_cita); 
    SET @fecha= (SELECT fecha from det_cita where id_cita=old.id_cita); 
    SET @hora= (SELECT hora from det_cita where id_cita=old.id_cita); 
    
    INSERT INTO historial(id_cita,asunto,fecha,hora,correo_pac,correo_doc,id_doctor,id_paciente) VALUES ( 
        old.id_cita, 
        @asunto, 
        @fecha, 
        @hora, 
        old.correo_pac, 
        old.correo_doc, 
        old.id_doctor, 
        old.id_paciente);
    DELETE FROM det_cita WHERE id_cita=old.id_cita; 
END;
$$
DELIMITER ;

-----------------------Trigger a ejecutar despues de eliminar en la tabla usuario-----------------------------------------
DELIMITER $$
CREATE TRIGGER TgEliminaUsuario
AFTER DELETE ON usuarios 
FOR EACH ROW 
BEGIN 
    DELETE FROM u_doctor WHERE correo_doc=old.correo; 
    DELETE FROM u_paciente WHERE correo_pac=old.correo; 
END;
$$
DELIMITER;