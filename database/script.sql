DROP DATABASE IF EXISTS riquinho;

CREATE DATABASE riquinho;

USE riquinho;

CREATE TABLE IF NOT EXISTS USUARIO (
  ID INT NOT NULL AUTO_INCREMENT,
  NOME VARCHAR(255) NOT NULL,
  EMAIL VARCHAR(255) NOT NULL,
  SENHA VARCHAR(255) NOT NULL,
  CONSTRAINT USUARIO_PKEY PRIMARY KEY (id),
  CONSTRAINT USUARIO_EMAIL UNIQUE (EMAIL)
);

CREATE TABLE IF NOT EXISTS CARTEIRA(
  ID INT NOT NULL AUTO_INCREMENT,
  ID_USUARIO INT NOT NULL,
  NOME VARCHAR(45) NOT NULL,
  DESCRICAO VARCHAR(255) NOT NULL,
  CONSTRAINT CARTEIRA_PKEY PRIMARY KEY (id),
  CONSTRAINT USUARIO_ID_CARTEIRAS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS TRANSACOES (
  ID INT NOT NULL AUTO_INCREMENT,
  ID_USUARIO INT NOT NULL,
  ID_CARTEIRA INT,
  TIPO_TRAN VARCHAR(255) NOT NULL,
  DATA_TRAN DATETIME,
  VALOR_TRAN INT NOT NULL,
  INFO VARCHAR (45) NOT NULL,
  CONSTRAINT TRANSACOES_PKEY PRIMARY KEY (id),
  CONSTRAINT USUARIO_ID_TRANSACOES FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (id) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT CARTEIRA_ID_TRANSACOES FOREIGN KEY (ID_CARTEIRA) REFERENCES CARTEIRA (id) ON UPDATE CASCADE ON DELETE RESTRICT
);
