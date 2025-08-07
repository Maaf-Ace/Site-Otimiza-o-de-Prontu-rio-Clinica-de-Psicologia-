CREATE DATABASE	psico_db;

USE psico_db;

CREATE TABLE Usuario ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    Nome VARCHAR(70), 
    email VARCHAR(60) UNIQUE, 
    senha VARCHAR(80), 
    Nivel CHAR(1) DEFAULT '0', 
    id_responsavel INT, 
    data_cadastro datetime, 
    FOREIGN KEY (id_responsavel) REFERENCES Usuario(id) 
); 

create table Prontuario (
    id int auto_increment primary key, 
    data_criacao datetime, 
    nome varchar(70), 
    data_nasc date, 
    genero varchar(15),
    endereco varchar(50), 
    telefone varchar(14), 
    email varchar(60), 
    ctt_emergencia varchar(100), 
    escolaridade varchar(20), 
    ocupacao varchar(25), 
    id_estagiario int, 
    id_orientador int, 
    nome_est varchar(70), 
    nome_ori varchar(70), 
    composicao_familia text, 
    dinamica_familia text, 
    eventos_significativos text, 
    vida_social text, 
    habitos_lazer text, 
    insercao_grupos text, 
    rede_apoio text, 
    cons_final text, 
    obs_geral text, data_triagem date, 
    foreign key (id_estagiario) references usuario(id), 
    foreign key (id_orientador) references usuario(id)
);

CREATE TABLE Aviso ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    id_prontuario INT, 
    id_aluno INT, 
    id_prof INT, 
    data_emissao DATETIME, 
    data_limite DATETIME, 
    FOREIGN KEY (id_prontuario) REFERENCES Prontuario(id), 
    FOREIGN KEY (id_aluno) REFERENCES Usuario(id), 
    FOREIGN KEY (id_prof) REFERENCES Usuario(id) 
); 

create table Sessao (
    id int auto_increment primary key, 
    descricao text, data_hora datetime, 
    anotacao text, id_prontuario int, 
    id_aluno int, id_prof int, 
    FOREIGN KEY (id_prontuario) REFERENCES Prontuario(id), 
    FOREIGN KEY (id_aluno) REFERENCES Usuario(id), 
    FOREIGN KEY (id_prof) REFERENCES Usuario(id) 
); 

CREATE TABLE Login ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    id_user INT, 
    data_login DATETIME, 
    FOREIGN KEY (id_user) REFERENCES Usuario(id) 
);
