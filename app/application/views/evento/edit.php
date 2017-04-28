<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Evento:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $evento->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $evento->getNome()?>"><br><br>

  Presencas:
  <input type="hidden" name="old_presencas" value="<?php echo $evento->getPresencas()?>"><br><br>
  <input type="text" name="presencas" value="<?php echo $evento->getPresencas()?>"><br><br>

  Data do Evento:
  <input type="hidden" name="old_dataevento" value="<?php echo $evento->getDataEvento()?>"><br><br>
  <input type="text" name="dataevento" value="<?php echo $evento->getDataEvento()?>"><br><br>

  Descriçao:
  <input type="hidden" name="old_descricao" value="<?php echo $evento->getDescricao()?>"><br><br>
  <input type="text" name="descricao" value="<?php echo $evento->getDescricao()?>"><br><br>
 
  <input type="submit" value="Submit">
</form>