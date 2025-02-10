CREATE DATABASE sistema;
USE sistema;

CREATE TABLE usuario (
	id_aluno INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome TEXT(65535),
	matricula INT,
	curso TEXT(65535),
	telefone VARCHAR(20),
	email VARCHAR(50),
	ativo VARCHAR(100),
	placa_veiculo VARCHAR(100)
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

-- Inserção de usuários
INSERT INTO usuario (nome, matricula, curso, telefone, email, ativo) 
VALUES 
('João Silva', 123456, 'Engenharia da Computação', '11987654321', 'joao.silva@exemplo.com', 'Sim'),
('Maria Oliveira', 234567, 'Sistemas de Informação', '11976543210', 'maria.oliveira@exemplo.com', 'Sim'),
('Pedro Santos', 345678, 'Ciência da Computação', '11965432109', 'pedro.santos@exemplo.com', 'Sim'),
('Ana Costa', 456789, 'Engenharia Elétrica', '11954321098', 'ana.costa@exemplo.com', 'Não');

-- Inserção de tags NFC
INSERT INTO tag_nfc (codigo_tag, id_aluno_fk)
VALUES
(1001, 1), -- João Silva
(1002, 2), -- Maria Oliveira
(1003, 3), -- Pedro Santos
(1004, 4); -- Ana Costa

-- Inserção de saídas
INSERT INTO saidas (id_aluno_fk, data_hora_saida)
VALUES
(1, '2025-02-10 08:30:00'), -- João Silva
(2, '2025-02-10 09:00:00'), -- Maria Oliveira
(3, '2025-02-10 09:15:00'), -- Pedro Santos
(4, '2025-02-10 10:00:00'); -- Ana Costa
