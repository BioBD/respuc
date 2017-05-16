<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Funcionario:
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
 	Funcao:
  <input type="text" name="rua" value="<?php echo $aprendiz->getFuncao()?>"><br><br>
  <input type="submit" value="Submit">
</form>