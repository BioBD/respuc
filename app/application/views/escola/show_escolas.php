<?php
	foreach ($escolas as $escola) {
			echo "<br>";
			echo "Mostrar Escola: "."<br>";
			echo "Nome: ".$escola->getNome()."<br>";
			echo "Telefone: ".$escola->getTelefone()."<br>";
	
			$String = "{$this->config->item('base_url')}EscolaController/edit?nome=".$escola->getNome();
			$String2 = "{$this->config->item('base_url')}EscolaController/delete?nome=".$escola->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
		}
?>