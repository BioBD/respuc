drop TABLE voluntarios;

CREATE TABLE voluntarios( 
    matricula char(7) not null primary key,
    nome VARCHAR(2047) Not Null, 
    cpf CHAR(14) Not Null,
    identidade CHAR(14), 
    orgao_emissor CHAR(10),
    genero CHAR(20) Not Null, 
    periodo integer Not Null, 
    data_nascimento DATE Not Null, 
    idioma CHAR(20) Not Null, 
    nome_curso VARCHAR(40) Not Null, 
    rua VARCHAR(60) Not Null, 
    complemento CHAR(15) Not Null, 
    bairro VARCHAR(20) Not Null, 
    cidade VARCHAR(20) Not Null, 
    uf char(2) Not Null, 
    cep CHAR(9) Not Null, 
    telefone_fixo CHAR(14) Not Null, 
    celular  CHAR(14), 
    email CHAR(60) Not Null
    );