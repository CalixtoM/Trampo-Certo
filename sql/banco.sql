create database trampo_certo;

use trampo_certo;

create table usuario(
cd_usuario int not null primary key auto_increment,
nm_usuario varchar(255) not null,
ds_email varchar(150) unique not null,
ds_password varchar(60) not null,
nr_cpf varchar(11) unique not null,
nr_celular varchar(11) not null,
dt_nascimento date not null,
ds_usendereco varchar(11) not null,
ds_usfoto text not null,
st_admin boolean not null,
st_ativo boolean not null,
ds_avaliacao int not null
);


create table servico(
cd_servico int not null primary key auto_increment,
nm_servico varchar(50) not null,
ds_servico varchar(200) not null,
dt_servico date not null,
dt_prazo date not null, 
id_usuario int not null,
id_categoria int not null,
st_servico boolean not null
);


create table categoria(
cd_categoria int not null primary key auto_increment,
nm_categoria varchar(50) not null,
ds_categoria varchar(200) not null,
ds_ftcategoria text not null
);

create table orcamento(
cd_orcamento int not null primary key auto_increment,
id_servico int not null,
id_usuariot int not null,
vl_orcamento varchar(10) not null,
ds_orcamento varchar (200) not null
);

create table report_perfil(
cd_reportperfil int not null primary key auto_increment,
ds_report varchar(200) not null,
dt_report date not null,
id_reporter int not null,
id_reportado int not null,
st_report boolean not null
);

create table report_servico(
cd_reportservico int not null primary key auto_increment,
ds_reports varchar(200) not null,
dt_reports date not null,
id_servicorep int not null,
id_reporters int not null,
id_reportados int not null,
st_reports boolean not null
);

alter table servico
add constraint id_usuario foreign key (id_usuario) references usuario (cd_usuario);

alter table servico
add constraint id_categoria foreign key (id_categoria) references categoria (cd_categoria);

alter table orcamento
add constraint id_servico foreign key (id_servico) references servico (cd_servico);

alter table orcamento
add constraint id_usuariot foreign key (id_usuariot) references usuario (cd_usuario);

<<<<<<< HEAD
alter table report_perfil
add constraint id_reporter foreign key (id_reporter) references usuario (cd_usuario);

alter table report_servico
add constraint id_servicorep foreign key (id_servicorep) references servico (cd_servico);

alter table report_servico
add constraint id_reporters foreign key (id_reporters) references usuario (cd_usuario);

alter table report_servico
add constraint id_reportados foreign key (id_reportados) references usuario (cd_usuario);
