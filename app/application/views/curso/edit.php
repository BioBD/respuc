<?php
?>
<form method="post" action="update" enctype="multipart/form-data">

  <br><br>
  Dados do Curso:
  <br><br>
  Nome:
  <input type="hidden" name="old_nome" value="<?php echo $curso->getNome()?>"><br><br>
  <input type="text" name="nome" value="<?php echo $curso->getNome()?>"><br><br>
 
  <input type="submit" value="Submit">
</form>