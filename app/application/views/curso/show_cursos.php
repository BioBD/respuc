<?php
	foreach ($cursos as $curso) 
	{
			echo "<br>";
			echo "Mostrar Curso: "; "<br>";

			echo "Nome: ".$curso->getNome()."<br>";
			echo "Coordenador: ".$curso->getCoord()."<br>";
			echo "Departamento: ".$curso->getDepto()."<br>";
			echo "QUantidade de Alunos: ".$curso->getQtdAlunos()."<br>";
			
			$String = "{$this->config->item('base_link')}CursoController/edit?nome=".$curso->getNome();
			$String2 = "{$this->config->item('base_link')}CursoController/delete?nome=".$curso->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>