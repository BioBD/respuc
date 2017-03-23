drop TABLE aprendiz;

CREATE TABLE aprendiz(
CPF INTEGER Not Null,
RG INTEGER Not Null,
Naturalidade CHAR(50) Not Null,
Email VARCHAR(60) Not Null,
Nome VARCHAR(70) Not Null,
Data_Nascimento DATE Not Null,
Telefone INTEGER Not Null,
Celular INTEGER Not Null,
Endereco VARCHAR(100) Not Null,
Numero INTEGER Not Null,
Complemento CHAR(50) Not Null,
Bairro VARCHAR(20) Not Null,
Cidade VARCHAR(20) Not Null,
CEP CHAR(9) Not Null,

CONSTRAINT aprendiz_chk_cpf CHECK(CPF > 0),
CONSTRAINT aprendiz_chk_rg CHECK(RG > 0),
CONSTRAINT aprendiz_chk_naturalidade CHECK(length(trim(Naturalidade)) > 0),
CONSTRAINT aprendiz_chk_email CHECK(length(trim(Email)) > 0),
CONSTRAINT aprendiz_chk_nome CHECK(length(trim(Nome)) > 0),
CONSTRAINT aprendiz_chk_telefone CHECK(Telefone > 0),
CONSTRAINT aprendiz_chk_celular CHECK(Celular > 0),
CONSTRAINT aprendiz_chk_endereco CHECK(length(trim(Endereco)) > 0),
CONSTRAINT aprendiz_chk_numero CHECK(Numero > 0),
CONSTRAINT aprendiz_chk_complemento CHECK(length(trim(Complemento)) > 0),
CONSTRAINT aprendiz_chk_bairro CHECK(length(trim(Bairro)) > 0),
CONSTRAINT aprendiz_chk_cidade CHECK(length(trim(Cidade)) > 0),
CONSTRAINT aprendiz_chk_cep CHECK(length(trim(CEP)) = 9),
CONSTRAINT aprendiz_pk PRIMARY KEY (CPF)
);

drop TABLE evento;

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
)

drop TABLE dificuldade;

CREATE TABLE dificuldade (
   Materia     char(20)    Not Null,
   CPF         integer     Not Null,
   CONSTRAINT dificuldade_pk PRIMARY KEY (CPF, Materia),
   CONSTRAINT dificuldade_chk_cpf CHECK (CPF > 0),
   CONSTRAINT dificuldade_materia CHECK (length(trim(Materia)) > 0)
)

drop TABLE apoio;

CREATE TABLE apoio (
   Materia     char(20)    Not Null,
   CPF         integer     Not Null,
   CONSTRAINT apoio_pk PRIMARY KEY (CPF, Materia),
   CONSTRAINT apoio_chk_cpf CHECK (CPF > 0),
   CONSTRAINT apoio_materia CHECK (length(trim(Materia)) > 0)
)

drop TABLE escola;

CREATE TABLE escola(
   nome  VARCHAR(150) Not Null,
   telefone_contato INTEGER Not Null,

   CONSTRAINT chk_telefone_contato CHECK((telefone_contato > 0)),
   CONSTRAINT pk_escola_nome PRIMARY KEY (nome)
);

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

CREATE TABLE curso(
nome VARCHAR(80) Not Null,
coord VARCHAR(50) Not Null,
depto VARCHAR(30),
qtd_alunos integer Not Null,

CONSTRAINT chk_nome_curso CHECK( nome in ('Administração', 'Arquitetura e Urbanismo', 'Artes Cênicas', 'Ciência da Computação', 'Ciências Biológicas', 'Ciências Econômicas', 'Ciências Sociais', 'Comunicação Social - Cinema', 'Comunicação Social - Jornalismo', 'Comunicação Social - Publicidade e Propaganda', 'Design - Comunicação Visual', 'Design - Mídia Digital', 'Design - Moda', 'Design - Projeto de Produto', 'Direito', 'Engenharia Ambiental', 'Engenharia Civil', 'Engenharia da Computação', 'Engenharia de Controle e Automação', 'Engenharia Elétrica', 'Engenharia Mecânica', 'Engenharia de Materiais e Nanotecnologia', 'Engenharia de Petróleo', 'Engenharia de Produção', 'Engenharia Química', 'Filosofia', 'Física', 'Geografia', 'História', 'Letras', 'Matemática', 'Pedagogia','Produção e Gestão de Mídias em Educação', 'Psicologia', 'Química', 'Relações Internacionais', 'Serviço Social', 'Sistemas de Informação', 'Teologia')),
CONSTRAINT pk_nome PRIMARY KEY (nome),
CONSTRAINT ck_qtd_alunos CHECK (qtd_alunos > 0)
);

drop TABLE estagio;

CREATE TABLE estagio(
   cpf INTEGER Not Null,
   estagio VARCHAR(50) Not Null,
   
   CONSTRAINT pk_estagio PRIMARY KEY (cpf, estagio),
   CONSTRAINT ck_cpf CHECK(cpf > 0),
   CONSTRAINT ck_estagio CHECK (length(trim(estagio)) > 0)
)

drop TABLE trabalho

CREATE TABLE trabalho(
   cpf INTEGER Not Null,
   trabalho VARCHAR(50),
   
   CONSTRAINT pk_estagio PRIMARY KEY (cpf, trabalho),
   CONSTRAINT ck_cpf CHECK(cpf > 0),
   CONSTRAINT ck_estagio CHECK (length(trim(trabalho)) > 0)
)

drop TABLE instituicao;

CREATE TABLE instituicao(
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


CREATE OR REPLACE FUNCTION remove_acento(text) 
RETURNS text AS 
$BODY$ 
SELECT TRANSLATE($1,'áàãâäÁÀÃÂÄéèêëÉÈÊËíìîïÍÌÎÏóòõôöÓÒÕÔÖúùûüÚÙÛÜñÑçÇÿýÝ','aaaaaAAAAAeeeeEEEEiiiiIIIIoooooOOOOOuuuuUUUUnNcCyyY') 
$BODY$ 
LANGUAGE sql IMMUTABLE STRICT 
COST 100; 
ALTER FUNCTION remove_acento(text) 
OWNER TO postgres; 
COMMENT ON FUNCTION remove_acento(text) IS 'Remove letras com acentuação'; 
