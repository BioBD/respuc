
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
			$String = "http://localhost/respuc/app/index.php/instituicaocontroller/edit?nome=".$instituicao->getNome();
			$String2 = "http://localhost/respuc/app/index.php/instituicaocontroller/delete?nome=".$instituicao->getNome();
			echo '<a href='.$String.">EDIT</a>";
			echo "<br>";
			echo '<a href='.$String2.">DELETE</a>";
		}
?>