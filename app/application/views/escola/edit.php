<?php
	require_once ('/Applications/XAMPP/xamppfiles/htdocs/respuc/app/application/core/escola.php');
?>

<form method="post" action="update" enctype="multipart/form-data">
<br>

<?php if($escola === null){
	?>
	Nao encontrei escola
<?php
	} else{ ?>

Nome:
<input type="text" name="nome" value="<?php echo $escola->getNome()?>"><br><br>
Telefone:
<input type="text" name="telefone" value="<?php echo $escola->getTelefone()?>"><br><br>
<input type="submit" value="Submit">
</form>
<?php } ?>