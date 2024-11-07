create database sica;
drop database sica;
use sica;

create table alunos 
(
RM		int(6) primary key not null,
Nome	varchar(30) not null,
Classe	varchar(20) not null,
Email	varchar(30) not null
);

create table inscricao (
id		int auto_increment primary key not null,
RM		int(6) not null,
constraint FK_InscriAluno Foreign key (RM) references alunos(RM),
Esporte		varchar(20) not null
);

insert into alunos values (123456, "Mateus", "2DS", "oi@hotmail.com");
insert into inscricao values (null, 123456, "basquete");

select a.*, i.Esporte from alunos a 
inner join inscricao i on a.RM = i.RM 
where classe = '2DS' and i.Esporte = "basquete";