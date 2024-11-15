create database sica;
-- drop database sica;
use sica;

create table alunos 
(
rm		    int(6) primary key not null,
nome	    varchar(30) not null,
classe	    varchar(5) not null,
email	    varchar(30) not null,
sexo	    char(1) not null,
nascimento  date not null,
senha       varchar(255) not null
);

create table inscricao (
id		    int auto_increment primary key not null,
rm		    int(6) not null,
constraint fk_inscri_aluno Foreign key (rm) references alunos(rm),
esporte		varchar(20) not null
);

insert into alunos values (123456, "Mateus", "2DS", "oi@hotmail.com", "M", "2007-10-06", "123");
insert into inscricao values (null, 123456, "basquete");

-- select a.*, i.esporte from alunos a inner join inscricao i on a.rm = i.rm where classe = '2DS' and i.esporte = "basquete";
