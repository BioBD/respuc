<?php
	foreach ($eventos as $evento) 
	{
			echo "<br>";
			echo "Mostrar Evento: "; "<br>";

			echo "Nome: ".$evento->getNome()."<br>";
			echo "Data: ".$evento->getData()."<br>";
			echo "Presencas: ".$evento->getPresencas()."<br>";
			
			$String = "{$this->config->item('base_link')}EventoController/edit?nome=".$evento->getNome();
			$String2 = "{$this->config->item('base_link')}EventoController/delete?nome=".$evento->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>