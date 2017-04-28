<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Funcionario:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $funcionario->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $funcionario->getNome()?>"><br><br>
  CPF:
  <input type="text" name="cpf" value="<?php echo $funcionario->getCpf()?>"><br><br>
  RG:
  <input type="text" name="rg" value="<?php echo $funcionario->getRg()?>"><br><br>
  Data de Nascimento:
  <input type="text" name="data_nascimento" value="<?php echo $funcionario->getDataNascimento()?>"><br><br>
  Naturalidade:
  <input type="text" name="naturalidade" value="<?php echo $funcionario->getNaturalidade()?>"><br><br>
  Email:
  <input type="text" name="email" value="<?php echo $funcionario->getEmail()?>"><br><br>
  Telefone:
  <input type="text" name="telefone" value="<?php echo $funcionario->getTelefone()?>"><br><br>
  Celular:
  <input type="text" name="celular" value="<?php echo $funcionario->getCelular()?>"><br><br>
 	Funcao:
  <input type="text" name="rua" value="<?php echo $funcionario->getFuncao()?>"><br><br>
  <input type="submit" value="Submit">
</form>
