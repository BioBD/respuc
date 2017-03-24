
<?php
	foreach ($instituicoes as $instituicao) {
			echo "<br>";
			echo "Mostrar Instituição: ";
			echo $instituicao->getNome()."<br>";
			echo "Telefone: ".$instituicao->getTelefone()."<br>";
			echo "Celular: ".$instituicao->getCelular()."<br>";
			echo "E-mail: ".$instituicao->getEmail()."<br>";
			echo "Vínculo: ".$instituicao->getVinculo()."<br>";
			echo "Nome do Responsável: ".$instituicao->getNomeResponsavel()."<br>";
			echo "E-mail do Responsável: ".$instituicao->getEmailResponsavel()."<br>";
			echo "Telefone do Responsável: ".$instituicao->getTelefoneResponsavel()."<br>";
			echo '<form method="post" action="update" enctype="multipart/form-data">';
			echo '<input type="submit" name="update-btn" value="Edit">';
			echo "</form>";
			echo '<a href=<?$config["base_url"]?>index.php/instituicaocontroller/delete?nome='.$instituicao->getNome();
			echo "DELETE";
			echo "</a>";

			/* 			 Não está funcionando.
			echo '<form method="post" action="delete" enctype="multipart/form-data">';
			echo '<input type="submit" name="delete-btn" value="Delete">';
			echo "</form>";
			*/
		}
?>