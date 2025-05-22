CREATE DATABASE testesaep;
USE testesaep;

-- Comando para excluir o banco de dados
DROP DATABASE testesaep;

CREATE TABLE usuario (
	id_usuario INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    
    PRIMARY KEY(id)
);

CREATE TABLE tarefa (
    id_tarefa INTEGER NOT NULL AUTO_INCREMENT,
    descricaoTarefa VARCHAR(500) NOT NULL,
    nomeSetor VARCHAR(255) NOT NULL,
    dataCadastrado VARCHAR(255) NOT NULL,
    statu ENUM('A fazer', 'fazendo', 'pronto') NOT NULL,
    prioridade ENUM('baixa', 'media', 'alta'),
    PRIMARY KEY (id_tarefa)
);