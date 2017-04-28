<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Aprendiz:
  <br><br>
  Nome:
  <input type="hidden" name="old_cpf" value="<?php echo $aprendiz->getCpf()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $aprendiz->getNome()?>"><br><br>
  CPF:
  <input type="text" name="cpf" value="<?php echo $aprendiz->getCpf()?>"><br><br>
  RG:
  <input type="text" name="rg" value="<?php echo $aprendiz->getRg()?>"><br><br>
  Data de Nascimento:
  <input type="text" name="data_nascimento" value="<?php echo $aprendiz->getDataNascimento()?>"><br><br>
  Naturalidade:
  <input type="text" name="naturalidade" value="<?php echo $aprendiz->getNaturalidade()?>"><br><br>
  Email:
  <input type="text" name="email" value="<?php echo $aprendiz->getEmail()?>"><br><br>
  Telefone:
  <input type="text" name="telefone" value="<?php echo $aprendiz->getTelefone()?>"><br><br>
  Celular:
  <input type="text" name="celular" value="<?php echo $aprendiz->getCelular()?>"><br><br>
 	Rua:
  <input type="text" name="rua" value="<?php echo $aprendiz->getRua()?>"><br><br>
	Numero:
  <input type="text" name="numero" value="<?php echo $aprendiz->getNumero()?>"><br><br>
	Complemento:
  <input type="text" name="complemento" value="<?php echo $aprendiz->getComplemento()?>"><br><br>
	Bairro:
  <input type="text" name="bairro" value="<?php echo $aprendiz->getBairro()?>"><br><br>
	Cidade:
  <input type="text" name="cidade" value="<?php echo $aprendiz->getCidade()?>"><br><br>
	UF:
  <input type="text" name="uf" value="<?php echo $aprendiz->getUf()?>"><br><br>
	CEP:
  <input type="text" name="cep" value="<?php echo $aprendiz->getCep()?>"><br><br>
  Trabalho:
  <input type="text" name="trabalho" value="<?php echo $aprendiz->getTrabalho()?>"><br><br>
  <br><br>
  Dados do Responsável:
  <br><br>
  Nome do Respnsavel:
  <input type="text" name="nome_responsavel" value="<?php echo $aprendiz->getNomeResponsavel()?>"><br><br>
  Telefone do Responsavel:
  <input type="text" name="telefone_responsavel" value="<?php echo $aprendiz->getTelefoneResponsavel()?>"><br><br>
  Profissao do Responsavel:
  <input type="text" name="profissao_responsavel" value="<?php echo $aprendiz->getProfissaoResponsavel()?>"><br><br>
  CPF do Responsavel:
  <input type="text" name="cpf_responsavel" value="<?php echo $aprendiz->getCpfResponsavel()?>"><br><br>
  <input type="submit" value="Submit">
</form>