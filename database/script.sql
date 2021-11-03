CREATE SEQUENCE usuario_usuario_number_seq;
CREATE SEQUENCE carteira_carteira_number_seq;
CREATE SEQUENCE transacoes_transacoes_number_seq;


CREATE TABLE IF NOT EXISTS PUBLIC.USUARIO
(
	ID integer NOT NULL DEFAULT nextval('usuario_usuario_number_seq'::regclass),
	NAME character varying(255) COLLATE pg_catalog."default" NOT NULL,
	EMAIL character varying(255) COLLATE pg_catalog."default" NOT NULL,
	SENHA character varying(255) COLLATE pg_catalog."default" NOT NULL,
	CONSTRAINT USUARIO_PKEY PRIMARY KEY (id),
	CONSTRAINT USUARIO_EMAIL UNIQUE (EMAIL)
);

ALTER SEQUENCE usuario_usuario_number_seq
OWNED BY USUARIO.ID;

CREATE TABLE IF NOT EXISTS PUBLIC.CARTEIRA
(
	ID integer NOT NULL DEFAULT nextval('carteira_carteira_number_seq'::regclass),
	NAME character varying(255) COLLATE pg_catalog."default" NOT NULL,
	ID_USUARIO integer NOT NULL,
	SALDO integer NOT NULL,
	DESCRICAO character varying(255) COLLATE pg_catalog."default" NOT NULL,
	CONSTRAINT CARTEIRA_PKEY PRIMARY KEY (id),
	CONSTRAINT USUARIO_ID_CARTEIRA FOREIGN KEY (ID_USUARIO)
        REFERENCES public.USUARIO (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

ALTER SEQUENCE carteira_carteira_number_seq
OWNED BY CARTEIRA.ID;


CREATE TABLE IF NOT EXISTS PUBLIC.TRANSACOES
(
	ID integer NOT NULL DEFAULT nextval('transacoes_transacoes_number_seq'::regclass),
	ID_CARTEIRA integer NOT NULL,
	SALDO_ANTERIOR integer NOT NULL,
	SALDO_ATUAL integer NOT NULL,
	TIPO_TRANSA character varying(255) COLLATE pg_catalog."default" NOT NULL,
	DATA_TRANSA timestamp with time zone,
	VALOR_TRANSA integer NOT NULL,
	CONSTRAINT TRANSACOES_PKEY PRIMARY KEY (id),
	CONSTRAINT CARTEIRA_ID_TRANSACOES FOREIGN KEY (ID_CARTEIRA)
        REFERENCES public.CARTEIRA (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

ALTER SEQUENCE transacoes_transacoes_number_seq
OWNED BY TRANSACOES.ID;