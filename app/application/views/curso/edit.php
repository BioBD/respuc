<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Curso:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $curso->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $curso->getNome()?>"><br><br>
  Coordenador:
  <input type="text" name="coord" value="<?php echo $curso->getCoord()?>"><br><br>
  Departamento:
  <input type="text" name="depto" value="<?php echo $curso->getDepto()?>"><br><br>
  Quantidade de Alunos:
  <input type="text" name="qtd_alunos" value="<?php echo $curso->getQtdAlunos()?>"><br><br>
  <input type="submit" value="Submit">
</form>