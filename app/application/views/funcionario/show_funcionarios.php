<?php
	foreach ($funcionarios as $funcionario) 
	{
			echo "<br>";
			echo "Mostrar Funcionairo: "; "<br>";
			echo "Nome: ".$funcionario->getNome()."<br>";
			echo "CPF: ".$funcionario->getCpf()."<br>";
			echo "RG: ".$funcionario->getRg()."<br>";
			echo "Data de Nascimento: ".$funcionario->getDataNascimento()."<br>";
			echo "Naturalidade: ".$funcionario->getNaturalidade()."<br>";
			echo "Email: ".$funcionario->getEmail()."<br>";
			echo "Telefone: ".$funcionario->getTelefone()."<br>";
			echo "Celular: ".$funcionario->getCelular()."<br>";
			echo "Funcao: ".$funcionario->getFuncao()."<br>";
			$String = "{$this->config->item('base_link')}FuncionarioController/edit?nome=".$funcionario->getNome();
			$String2 = "{$this->config->item('base_link')}FuncionarioController/delete?nome=".$funcionario->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>