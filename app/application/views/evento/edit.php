<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Evento:
  <br><br>
  Nome:
  <input type="hidden" name="old_name" value="<?php echo $evento->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $evento->getNome()?>"><br><br>
  Data do Evento:
  <input type="text" name="dataevento" value="<?php echo $evento->getDataEvento()?>"><br><br>
  Presenças:
  <input type="text" name="presencas" value="<?php echo $evento->getPresencas()?>"><br><br>
  Descrição:
  <input type="text" name="descricao" value="<?php echo $evento->getDescricao()?>"><br><br>
  <input type="submit" value="Submit">
</form>