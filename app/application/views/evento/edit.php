<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Evento:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $evento->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $evento->getNome()?>"><br><br>

  Data:
  <input type="hidden" name="old_data" value="<?php echo $evento->getData()?>"><br><br>
  <input type="text" name="data" value="<?php echo $evento->getData()?>"><br><br>

  Presencas:
  <input type="hidden" name="old_presencas" value="<?php echo $evento->getPresencas()?>"><br><br>
  <input type="text" name="presencas" value="<?php echo $evento->getPresencas()?>"><br><br>
 
  <input type="submit" value="Submit">
</form>