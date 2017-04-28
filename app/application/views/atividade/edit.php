<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados da Atividade:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $atividade->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $atividade->getNome()?>"><br><br>
 
  <input type="submit" value="Submit">
</form>