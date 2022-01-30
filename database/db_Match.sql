create database `match`;

use `match`;

CREATE TABLE tb_status(
    pk_id int not null AUTO_INCREMENT,
    txt_status VARCHAR(70),
    dt_registro TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY key(pk_id)
) ENGINE = INNODB;

INSERT INTO `tb_status` (`pk_id`, `txt_status`, `dt_registro`) VALUES (NULL, 'ativado', current_timestamp()), (NULL, 'desativado', current_timestamp());

CREATE TABLE tb_usuarios(
    pk_id int not null AUTO_INCREMENT,
    txt_nome VARCHAR(70),
    txt_email VARCHAR(70),
    fk_id_status int,
    dt_registro TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY key(pk_id),
    FOREIGN key(fk_id_status) REFERENCES tb_status(pk_id)
) ENGINE = INNODB;

INSERT INTO `tb_usuarios` (`pk_id`, `txt_nome`, `txt_email`, `fk_id_status`, `dt_registro`) VALUES (NULL, 'Hamilton', 'adm@a.com', '1', current_timestamp());

CREATE TABLE tb_cursos(
    pk_id int not null AUTO_INCREMENT,
    txt_titulo VARCHAR(70),
    txt_descricao VARCHAR(70),
    dt_inicio date,
    dt_fim date,
    dt_registro TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY key(pk_id)
) ENGINE = INNODB;


CREATE TABLE tb_alunos(
    pk_id int not null AUTO_INCREMENT,
    txt_nome VARCHAR(70),
    txt_email VARCHAR(70),
    dt_nascimento date,
    fk_id_status int,
    dt_registro TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY key(pk_id),
    FOREIGN key(fk_id_status) REFERENCES tb_status(pk_id)
) ENGINE = INNODB;


CREATE TABLE tb_matriculas(
    pk_id int not null AUTO_INCREMENT,
    fk_id_curso int,
    fk_id_aluno int,
    fk_id_usuario int,
    dt_registro TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY key(pk_id),
    FOREIGN key(fk_id_curso) REFERENCES tb_cursos(pk_id),
    FOREIGN key(fk_id_aluno) REFERENCES tb_alunos(pk_id),
    FOREIGN key(fk_id_usuario) REFERENCES tb_usuarios(pk_id)
) ENGINE = INNODB;