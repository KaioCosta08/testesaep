CREATE DATABASE testesaep;
USE testesaep;

-- Comando para excluir o banco de dados
DROP DATABASE testesaep;

CREATE TABLE usuario (

	id INTEGER AUTO_INCREMENT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    
    PRIMARY KEY(id)
);

SELECT * FROM usuario;