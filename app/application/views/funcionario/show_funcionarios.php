<?php
	foreach ($funcionarios as $funcionario) 
	{
			echo "<br>";
			echo "Mostrar Funcionario: "; "<br>";

			echo "Nome: ".$funcionario->getNome()."<br>";
			echo "CPF: ".$funcionario->getCpf()."<br>";
			echo "RG: ".$funcionario->getRg()."<br>";
			echo "Data de Nascimento: ".$funcionario->getDataNascimento()."<br>";
			echo "Naturalidade: ".$funcionario->getNaturalidade()."<br>";
			echo "Email: ".$funcionario->getEmail()."<br>";
			echo "Telefone: ".$funcionario->getTelefone()."<br>";
			echo "Celular: ".$funcionario->getCelular()."<br>";
			echo "Funcao: ".$funcionario->getFuncao()."<br>";

			echo "<br>";

			$String = "{$this->config->item('base_link')}FuncionarioController/edit?cpf=".$funcionario->getCpf();
			$String2 = "{$this->config->item('base_link')}FuncionarioController/delete?cpf=".$funcionario->getCpf();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>