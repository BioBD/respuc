drop table if Exists aprendiz;

CREATE TABLE aprendiz(
CPF VARCHAR(11) Not Null,
RG VARCHAR(12) Not Null,
Naturalidade CHAR(50) Not Null,
Email VARCHAR(60) Not Null,
Nome VARCHAR(70) Not Null,
Data_Nascimento DATE Not Null,
Telefone INTEGER Not Null,
Celular INTEGER Not Null,
Rua VARCHAR(100) Not Null,
Numero Varchar(20) Not Null,
Complemento CHAR(50) Not Null,
Bairro VARCHAR(20) Not Null,
Cidade VARCHAR(20) Not Null,
uf VARCHAR(2) Not Null,
CEP CHAR(9) Not Null,
Trabalho VARCHAR(20) Not Null,
Nome_Responsavel VARCHAR(200) Not Null,
CPF_Responsavel VARCHAR(200) Not Null,
Telefone_Responsavel VARCHAR(200) Not Null,
Profissao_Responsavel VARCHAR(200) Not Null,

CONSTRAINT aprendiz_chk_naturalidade CHECK(length(trim(Naturalidade)) > 0),
CONSTRAINT aprendiz_chk_email CHECK(length(trim(Email)) > 0),
CONSTRAINT aprendiz_chk_nome CHECK(length(trim(Nome)) > 0),
CONSTRAINT aprendiz_chk_telefone CHECK(Telefone > 0),
CONSTRAINT aprendiz_chk_celular CHECK(Celular > 0),
CONSTRAINT aprendiz_chk_rua CHECK(length(trim(Rua)) > 0),
CONSTRAINT aprendiz_chk_complemento CHECK(length(trim(Complemento)) > 0),
CONSTRAINT aprendiz_chk_bairro CHECK(length(trim(Bairro)) > 0),
CONSTRAINT aprendiz_chk_cidade CHECK(length(trim(Cidade)) > 0),
CONSTRAINT aprendiz_chk_cep CHECK(length(trim(CEP)) = 9),
CONSTRAINT aprendiz_chk_uf CHECK(length(trim(uf)) = 2),
CONSTRAINT aprendiz_chk_trabalho CHECK(length(trim(Trabalho)) > 0),
CONSTRAINT aprendiz_pk PRIMARY KEY (CPF)
);

drop table if Exists aluno;

CREATE TABLE aluno(
   CPF INTEGER NOT NULL,
   RG INTEGER NOT NULL,
   Naturalidade CHAR(50) NOT NULL,
   Email VARCHAR(60) NOT NULL,
   Nome VARCHAR(70) NOT NULL,
   Data_Nascimento DATE NOT NULL,
   Telefone INTEGER NOT NULL,
   Celular INTEGER NOT NULL,
   Endereco VARCHAR(100) NOT NULL,
   Numero INTEGER NOT NULL,
   Complemento CHAR(50) NOT NULL,
   Bairro VARCHAR(20) NOT NULL,
   Cidade VARCHAR(20) NOT NULL,
   CEP CHAR(9) NOT NULL,
   
   CONSTRAINT aluno_chk_cpf CHECK(CPF > 0),
   CONSTRAINT aluno_chk_rg CHECK(RG > 0),
   CONSTRAINT aluno_chk_naturalidade CHECK(length(trim(Naturalidade)) > 0),
   CONSTRAINT aluno_chk_email CHECK(length(trim(Email)) > 0),
   CONSTRAINT aluno_chk_nome CHECK(length(trim(Nome)) > 0),
   CONSTRAINT aluno_chk_telefone CHECK(Telefone > 0),
   CONSTRAINT aluno_chk_celular CHECK(Celular > 0),
   CONSTRAINT aluno_chk_endereco CHECK(length(trim(Endereco)) > 0),
   CONSTRAINT aluno_chk_numero CHECK(Numero > 0),
   CONSTRAINT aluno_chk_complemento CHECK(length(trim(Complemento)) > 0),
   CONSTRAINT aluno_chk_bairro CHECK(length(trim(Bairro)) > 0),
   CONSTRAINT aluno_chk_cidade CHECK(length(trim(Cidade)) > 0),
   CONSTRAINT aluno_chk_cep CHECK(length(trim(CEP)) = 9),
   CONSTRAINT aluno_pk PRIMARY KEY (CPF)
);

drop table if Exists evento;

CREATE TABLE evento (
   Nome        char(20)    Not Null,
   Presencas   integer     Null,
   DataEvento  date        Not Null,
   Descricao   char(200)   Null,
   CONSTRAINT evento_pk PRIMARY KEY (Nome, DataEvento),
   CONSTRAINT evento_chk_nome CHECK (length(trim(Nome)) > 0),
   CONSTRAINT evento_chk_presencas CHECK (Presencas > 0),
   CONSTRAINT evento_chk_dataevento CHECK (isfinite(DataEvento)),
   CONSTRAINT evento_chk_descricao CHECK ((Descricao IS NULL) OR (length(trim(Descricao)) > 0))
);

drop table if Exists dificuldade;

CREATE TABLE dificuldade (
   Materia     char(20)    Not Null,
   CPF         integer     Not Null,
   CONSTRAINT dificuldade_pk PRIMARY KEY (CPF, Materia),
   CONSTRAINT dificuldade_chk_cpf CHECK (CPF > 0),
   CONSTRAINT dificuldade_materia CHECK (length(trim(Materia)) > 0)
);

drop table if Exists apoio;

CREATE TABLE apoio (
   Materia     char(20)    Not Null,
   CPF         integer     Not Null,
   CONSTRAINT apoio_pk PRIMARY KEY (CPF, Materia),
   CONSTRAINT apoio_chk_cpf CHECK (CPF > 0),
   CONSTRAINT apoio_materia CHECK (length(trim(Materia)) > 0)
);

drop table if Exists escola;

CREATE TABLE escola(
   nome  VARCHAR(150) Not Null,
   telefone INTEGER Not Null,

   CONSTRAINT chk_telefone CHECK((telefone > 0)),
   CONSTRAINT pk_escola_nome PRIMARY KEY (nome)
);

drop table if Exists voluntarios;

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

drop table if Exists curso;

CREATE TABLE curso(
nome VARCHAR(80) Not Null,
coord VARCHAR(50) Not Null,
depto VARCHAR(30),
qtd_alunos integer Not Null,

CONSTRAINT chk_nome_curso CHECK( nome in ('Administração', 'Arquitetura e Urbanismo', 'Artes Cênicas', 'Ciência da Computação', 'Ciências Biológicas', 'Ciências Econômicas', 'Ciências Sociais', 'Comunicação Social - Cinema', 'Comunicação Social - Jornalismo', 'Comunicação Social - Publicidade e Propaganda', 'Design - Comunicação Visual', 'Design - Mídia Digital', 'Design - Moda', 'Design - Projeto de Produto', 'Direito', 'Engenharia Ambiental', 'Engenharia Civil', 'Engenharia da Computação', 'Engenharia de Controle e Automação', 'Engenharia Elétrica', 'Engenharia Mecânica', 'Engenharia de Materiais e Nanotecnologia', 'Engenharia de Petróleo', 'Engenharia de Produção', 'Engenharia Química', 'Filosofia', 'Física', 'Geografia', 'História', 'Letras', 'Matemática', 'Pedagogia','Produção e Gestão de Mídias em Educação', 'Psicologia', 'Química', 'Relações Internacionais', 'Serviço Social', 'Sistemas de Informação', 'Teologia')),
CONSTRAINT pk_nome PRIMARY KEY (nome),
CONSTRAINT ck_qtd_alunos CHECK (qtd_alunos > 0)
);

drop table if Exists estagio;

CREATE TABLE estagio(
   cpf INTEGER Not Null,
   estagio VARCHAR(50) Not Null,
   
   CONSTRAINT pk_estagio PRIMARY KEY (cpf, estagio),
   CONSTRAINT ck_cpf CHECK(cpf > 0),
   CONSTRAINT ck_estagio CHECK (length(trim(estagio)) > 0)
);

drop table if Exists trabalho;

CREATE TABLE trabalho(
   cpf INTEGER Not Null,
   trabalho VARCHAR(50),
   
   CONSTRAINT pk_trabalho PRIMARY KEY (cpf, trabalho),
   CONSTRAINT ck_cpf CHECK(cpf > 0),
   CONSTRAINT ck_estagio CHECK (length(trim(trabalho)) > 0)
);

drop table if Exists instituicao;

CREATE TABLE instituicao(
     nome character varying(1024) NOT NULL,
     telefone character varying(16) NOT NULL,
     celular character varying(16) NOT NULL,
     email character varying(1024) NOT NULL,
     vinculo character varying(1024) NOT NULL,
     nome_responsavel character varying(1024) NOT NULL,
     email_responsavel character varying(1024) NOT NULL,
     telefone_responsavel character varying(16) NOT NULL,
     CONSTRAINT instituicao_pkey PRIMARY KEY (nome)
)

CREATE OR REPLACE FUNCTION remove_acento(text) 
RETURNS text AS 
$BODY$ 
SELECT TRANSLATE($1,'áàãâäÁÀÃÂÄéèêëÉÈÊËíìîïÍÌÎÏóòõôöÓÒÕÔÖúùûüÚÙÛÜñÑçÇÿýÝ','aaaaaAAAAAeeeeEEEEiiiiIIIIoooooOOOOOuuuuUUUUnNcCyyY') 
$BODY$ 
LANGUAGE sql IMMUTABLE STRICT 
COST 100; 
ALTER FUNCTION remove_acento(text) 
OWNER TO app; 
COMMENT ON FUNCTION remove_acento(text) IS 'Remove letras com acentuação'; 
