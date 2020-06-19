create database finanzas;
use finanzas ;
CREATE USER 'UsuarioFinanzas'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Usu4r10F1n4nc14s*2O2O';
grant select,insert,update on finanzas.* to 'UsuarioFinanzas'@'localhost';

CREATE TABLE IF NOT EXISTS tb_usuarios(
	id bigint(20) auto_increment primary key,
	correo varchar(200) not null,
	clave varchar(200) not null,
	red_social varchar(100)  default null,
	token varchar(220) default null,
	fecha_creacion datetime ,
	fecha_actualizacion datetime,
	fecha_eliminacion datetime,
	creado_por bigint(20)
)ENGINE=InnoDB default charset=utf8 collate=utf8_unicode_ci;
alter table tb_usuarios add foreign key(creado_por) references tb_usuarios(id);

create table if not exists tb_ingresos(
	id bigint(20) auto_increment primary key,
    monto int(11),
    comentario varchar(200),
    fecha_creacion datetime,
    creado_por bigint(20),
    anulado boolean default false,
    fecha_anulacion datetime,
    anulado_por bigint(20),
    foreign key (creado_por)references tb_usuarios(id),
    foreign key (anulado_por)references tb_usuarios(id)
)Engine=Innodb Default charset=utf8 collate=utf8_unicode_ci;

create table if not exists tb_egresos(
	id bigint(20) auto_increment primary key,
    monto int(11),
    comentario varchar(200),
    fecha_creacion datetime,
    creado_por bigint(20),
    anulado boolean default false,
    fecha_anulacion datetime,
    anulado_por bigint(20),
    foreign key (creado_por)references tb_usuarios(id),
    foreign key (anulado_por)references tb_usuarios(id)
)Engine=Innodb Default charset=utf8 collate=utf8_unicode_ci;







