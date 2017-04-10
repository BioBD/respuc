<?php
	foreach ($escolas as $escola) {
			echo "<br>";
			echo "Mostrar Escola: "."<br>";
			echo "Nome: ".$escola->getNome()."<br>";
			echo "Telefone: ".$escola->getTelefone()."<br>";
	
			$String = "http://localhost/respuc/app/index.php/escolacontroller/edit?nome=".$escola->getNome();
			$String2 = "http://localhost/respuc/app/index.php/escolacontroller/delete?nome=".$escola->getNome();
			echo '<a href='.$String.">EDIT</a>";
			echo "<br>";
			echo '<a href='.$String2.">DELETE</a>";
		}
?>