CREATE TABLE usuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50),
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    email VARCHAR(50)
);

CREATE TABLE tipo(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(10)
);

CREATE TABLE desenvolvedora(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50)
);

CREATE TABLE jogo(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    data DATE,
    id_dev INT REFERENCES desenvolvedora(id),
    id_tipo INT REFERENCES tipo(id)
);

CREATE TABLE links(
    id SERIAL PRIMARY KEY,
    link VARCHAR(255),
    id_jogo INT REFERENCES jogo(id)
);

