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

drop TABLE curso;

CREATE TABLE Curso(
nome VARCHAR(80) Not Null,
coord VARCHAR(50) Not Null,
depto VARCHAR(30),
qtd_alunos integer Not Null,

CONSTRAINT chk_nome_curso CHECK( nome in ('Administração', 'Arquitetura e Urbanismo', 'Artes Cênicas', 'Ciência da Computação', 'Ciências Biológicas', 'Ciências Econômicas', 'Ciências Sociais', 'Comunicação Social - Cinema', 'Comunicação Social - Jornalismo', 'Comunicação Social - Publicidade e Propaganda', 'Design - Comunicação Visual', 'Design - Mídia Digital', 'Design - Moda', 'Design - Projeto de Produto', 'Direito', 'Engenharia Ambiental', 'Engenharia Civil', 'Engenharia da Computação', 'Engenharia de Controle e Automação', 'Engenharia Elétrica', 'Engenharia Mecânica', 'Engenharia de Materiais e Nanotecnologia', 'Engenharia de Petróleo', 'Engenharia de Produção', 'Engenharia Química', 'Filosofia', 'Física', 'Geografia', 'História', 'Letras', 'Matemática', 'Pedagogia','Produção e Gestão de Mídias em Educação', 'Psicologia', 'Química', 'Relações Internacionais', 'Serviço Social', 'Sistemas de Informação', 'Teologia')),
CONSTRAINT pk_nome PRIMARY KEY (nome),
CONSTRAINT ck_qtd_alunos CHECK (qtd_alunos > 0)
);

drop TABLE instituicao;

CREATE TABLE instituicoes(
razao_social  VARCHAR(150) Not Null,
nome_fantasia VARCHAR(100) Not Null,
ano_de_fundacao CHAR(4) Not Null,
site VARCHAR(60),
vinculo VARCHAR(150) Not Null,
qtd_membros  integer Not Null,
email_instituicao CHAR(60) Not Null,
relacoes_publicas VARCHAR(50),
email_relacoes_publicas VARCHAR(60),
rua VARCHAR(60) Not Null,
complemento CHAR(15) Not Null,
bairro VARCHAR(20) Not Null,
cidade VARCHAR(20) Not Null,
uf VARCHAR(2) Not Null,
cep CHAR(9) Not Null,
telefone_fixo CHAR(14) Not Null,
celular  CHAR(14),

CONSTRAINT chk_qtd_membros CHECK((qtd_membros > 0)),
CONSTRAINT pk_razaosocial PRIMARY KEY (razao_social)
);
