<?php
	foreach ($atividades as $atividade) 
	{
			echo "<br>";
			echo "Mostrar Atividade: "; "<br>";

			echo "Nome: ".$atividade->getNome()."<br>";
			
			$String = "{$this->config->item('base_link')}AtividadeController/edit?nome=".$atividade->getNome();
			$String2 = "{$this->config->item('base_link')}AtividadeController/delete?nome=".$atividade->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>