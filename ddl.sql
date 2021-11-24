--  Drop table

--  DROP TABLE estuda.escola;

CREATE TABLE estuda.escola (
	id INT UNSIGNED auto_increment NOT NULL,
	nome varchar(200) NOT NULL,
	endereco varchar(10) NULL,
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	data_alterado DATETIME NULL,
	data_excluido DATETIME NULL,
	CONSTRAINT escola_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;



CREATE TABLE estuda.aluno (
	id INT UNSIGNED auto_increment NOT NULL,
	nome varchar(200) NOT NULL,
	email varchar(255) NOT NULL,
	data_nascimento DATE NULL,
	genero varchar(100) NULL,
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	data_alterado DATETIME NULL,
	data_excluido DATETIME NULL,
	CONSTRAINT aluno_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;



CREATE TABLE estuda.turma (
	id INT UNSIGNED auto_increment NOT NULL,
	id_escola INT UNSIGNED NOT NULL,
	ano varchar(6) NULL,
	nivel_ensino varchar(30) NOT NULL,
	serie varchar(10) NOT NULL,
	turno varchar(20) NULL,
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	data_editado DATETIME NULL,
	data_excluido DATETIME NULL,
	CONSTRAINT turma_pk PRIMARY KEY (id),
	CONSTRAINT turma_FK FOREIGN KEY (id_escola) REFERENCES estuda.escola(id) ON DELETE RESTRICT ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;



CREATE TABLE estuda.aluno_turma (
	id INT UNSIGNED auto_increment NOT NULL,
	id_aluno INT UNSIGNED NOT NULL,
	id_turma INT UNSIGNED NOT NULL,
	data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	data_editado DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
	data_excluido DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
	CONSTRAINT aluno_turma_pk PRIMARY KEY (id),
	CONSTRAINT aluno_turma_FK FOREIGN KEY (id_turma) REFERENCES estuda.turma(id) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT aluno_turma_FK_1 FOREIGN KEY (id_aluno) REFERENCES estuda.aluno(id) ON DELETE RESTRICT ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

