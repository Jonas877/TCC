CREATE TABLE usuario (
	id_aluno INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome TEXT(65535),
	matricula INT,
	curso TEXT(65535),
	telefone VARCHAR(20),
	email VARCHAR(50),
	ativo VARCHAR(100)
);


CREATE TABLE tag_nfc (
	id_tag INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	codigo_tag INT,
	id_aluno_fk INT,
    FOREIGN KEY (id_aluno_fk) REFERENCES usuario(id_aluno)
);

CREATE TABLE saidas (
	id_saida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_aluno_fk INT,
	data_hora_saida DATETIME,
    FOREIGN KEY (id_aluno_fk) REFERENCES usuario(id_aluno)
);