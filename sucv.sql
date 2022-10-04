drop database if exists db_sucv;
create database db_sucv;

use db_sucv;

create table tb_pacientes(
pac_codigo int auto_increment primary key,
pac_nome varchar(50) NOT NULL,
pac_cartsus int(45) NOT NULL,
pac_dtnasc date);
    
create table tb_enfermeiros(
enf_codigo int auto_increment primary key,
enf_nome varchar(50),
enf_email varchar(45),
enf_senha varchar(45));

create table tb_vacinas(
vac_codigo int auto_increment primary key,
vac_nome varchar(20),
vac_descricao varchar(500));

create table tb_vacinacao(
van_codigo int auto_increment primary key,
van_pac_codigo int,
van_enf_codigo int,
van_vac_codigo int,
foreign key (van_pac_codigo) references tb_pacientes(pac_codigo),
foreign key (van_enf_codigo) references tb_enfermeiros(enf_codigo),
foreign key (van_vac_codigo) references tb_vacinas(vac_codigo),
van_ubs varchar(20),
van_lote int,
van_dose varchar(10),
van_data date);
select pac_codigo as 'CÓDIGO',pac_nome as'NOME',pac_cartsus as'CARTÃO DO SUS', pac_dtnasc as'DATA DE NASCIMENTO' from tb_pacientes;
select vac_codigo as 'CÓDIGO', vac_nome as'NOME', vac_descricao as 'DESCRIÇÃO' from tb_vacinas;
select*from tb_vacinacao;
insert into tb_enfermeiros(enf_nome, enf_email,enf_senha) values ('Jose','jose123@gmail.com','jose1234');
INSERT INTO tb_vacinacao (van_pac_codigo, van_vac_codigo, van_enf_codigo, van_dose, van_lote, van_ubs) VALUES (1, 1, 1, 'unica', 2999, 'recreio');