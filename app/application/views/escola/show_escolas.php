<?php
	foreach ($escolas as $escola) {
			echo "<br>";
			echo "Mostrar Escola: ";
			echo "Nome: ".$escola->getNome()."<br>";
			echo "Telefone: ".$escola->getTelefone()."<br>";
	
			echo '<form method="post" action="update" enctype="multipart/form-data">';
			echo '<input type="submit" name="update-btn" value="Edit">';
			echo "</form>";/* 			 Não está funcionando.
			echo '<form method="post" action="delete" enctype="multipart/form-data">';
			echo '<input type="submit" name="delete-btn" value="Delete">';
			echo "</form>";
			*/
		}
?>