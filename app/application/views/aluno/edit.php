<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Aluno:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $aluno->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $aluno->getNome()?>"><br><br>
  CPF:
  <input type="text" name="cpf" value="<?php echo $aluno->getCpf()?>"><br><br>
  RG:
  <input type="text" name="rg" value="<?php echo $aluno->getRg()?>"><br><br>
  Data de Nascimento:
  <input type="text" name="data_nascimento" value="<?php echo $aluno->getDataNascimento()?>"><br><br>
  Naturalidade:
  <input type="text" name="naturalidade" value="<?php echo $aluno->getNaturalidade()?>"><br><br>
  Email:
  <input type="text" name="email" value="<?php echo $aluno->getEmail()?>"><br><br>
  Telefone:
  <input type="text" name="telefone" value="<?php echo $aluno->getTelefone()?>"><br><br>
  Celular:
  <input type="text" name="celular" value="<?php echo $aluno->getCelular()?>"><br><br>
 	Rua:
  <input type="text" name="rua" value="<?php echo $aluno->getRua()?>"><br><br>
	Numero:
  <input type="text" name="numero" value="<?php echo $aluno->getNumero()?>"><br><br>
	Complemento:
  <input type="text" name="complemento" value="<?php echo $aluno->getComplemento()?>"><br><br>
	Bairro:
  <input type="text" name="bairro" value="<?php echo $aluno->getBairro()?>"><br><br>
	Cidade:
  <input type="text" name="cidade" value="<?php echo $aluno->getCidade()?>"><br><br>
	UF:
  <input type="text" name="uf" value="<?php echo $aluno->getUf()?>"><br><br>
	CEP:
  <input type="text" name="cep" value="<?php echo $aluno->getCep()?>"><br><br>
  Trabalho:
  <input type="text" name="cursos" value="<?php echo $aluno->getCursos()?>"><br><br>
  <br><br>
  Dados do Responsável:
  <br><br>
  Nome do Respnsavel:
  <input type="text" name="nome_responsavel" value="<?php echo $aluno->getNomeResponsavel()?>"><br><br>
  Telefone do Responsavel:
  <input type="text" name="telefone_responsavel" value="<?php echo $aluno->getTelefoneResponsavel()?>"><br><br>
  Profissao do Responsavel:
  <input type="text" name="profissao_responsavel" value="<?php echo $aluno->getProfissaoResponsavel()?>"><br><br>
  CPF do Responsavel:
  <input type="text" name="cpf_responsavel" value="<?php echo $aluno->getCpfResponsavel()?>"><br><br>
  <input type="submit" value="Submit">
</form>