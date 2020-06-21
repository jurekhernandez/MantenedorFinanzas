drop database finanzas;
create database finanzas;
use finanzas ;

CREATE USER 'UsuarioFinanzas'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Usu4r10F1n4nc14s*2O2O';
grant select,insert,update on finanzas.* to 'UsuarioFinanzas'@'localhost';


CREATE TABLE IF NOT EXISTS pr_cargos(
	id bigint(20) unsigned auto_increment primary key,
    cargo varchar(200)
)ENGINE=InnoDB default charset=utf8 collate=utf8_unicode_ci;
insert into pr_cargos(cargo) values ('Administrador'),('usuario');

CREATE TABLE IF NOT EXISTS tb_usuarios(
	id bigint(20) unsigned auto_increment primary key,
    nombre varchar(200),
    apellido varchar(200),
	correo varchar(200) not null,
	clave varchar(200) not null,
    id_cargo int(2) unsigned,
	red varchar(100)  default null,
	token varchar(220) default null,
	creado_por bigint(20) unsigned,
    activo boolean default true,
    bloqueado boolean default false ,   
	fecha_creacion datetime ,
	fecha_actualizacion datetime,
	fecha_eliminacion datetime
)ENGINE=InnoDB default charset=utf8 collate=utf8_unicode_ci;
alter table tb_usuarios add foreign key(creado_por) references tb_usuarios(id);

create table if not exists tb_ingresos(
	id bigint(20) unsigned auto_increment primary key,
    monto int(11) ,
    comentario varchar(200),
    creado_por bigint(20) unsigned,
    anulado boolean default false,
    anulado_por bigint(20) unsigned,
	fecha_ingreso datetime,
    fecha_creacion datetime,
    fecha_actualizacion datetime,
    fecha_anulacion datetime,    
    foreign key (creado_por)references tb_usuarios(id),
    foreign key (anulado_por)references tb_usuarios(id)
)Engine=Innodb Default charset=utf8 collate=utf8_unicode_ci;

create table if not exists tb_egresos(
	id bigint(20) unsigned auto_increment primary key,
    monto int(11),
    comentario varchar(200),
    creado_por bigint(20) unsigned,
    anulado boolean default false,
    anulado_por bigint(20) unsigned,
	fecha_egreso datetime,
    fecha_creacion datetime,
	fecha_anulacion datetime,
	fecha_actualizacion datetime,
    foreign key (creado_por)references tb_usuarios(id),
    foreign key (anulado_por)references tb_usuarios(id)
)Engine=Innodb Default charset=utf8 collate=utf8_unicode_ci;







