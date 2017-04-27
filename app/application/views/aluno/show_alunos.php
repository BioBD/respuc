<?php
	foreach ($alunos as $aluno) 
	{
			echo "<br>";
			echo "Mostrar Aluno: "; "<br>";

			echo "Nome: ".$aluno->getNome()."<br>";
			echo "CPF: ".$aluno->getCpf()."<br>";
			echo "RG: ".$aluno->getRg()."<br>";
			echo "Data de Nascimento: ".$aluno->getDataNascimento()."<br>";
			echo "Naturalidade: ".$aluno->getNaturalidade()."<br>";
			echo "Email: ".$aluno->getEmail()."<br>";
			echo "Telefone: ".$aluno->getTelefone()."<br>";
			echo "Celular: ".$aluno->getCelular()."<br>";
			echo "Rua: ".$aluno->getRua()."<br>";
			echo "Numero: ".$aluno->getNumero()."<br>";
			echo "Complemento: ".$aluno->getComplemento()."<br>";
			echo "Bairro: ".$aluno->getBairro()."<br>";
			echo "Cidade: ".$aluno->getCidade()."<br>";
			echo "UF: ".$aluno->getUf()."<br>";
			echo "CEP: ".$aluno->getCep()."<br>";
			echo "Trabalho: ".$aluno->getCursos()."<br>";

			echo "<br>";
			echo "Responsavel do Aluno: "; "<br>";

			echo "Nome do Responsavel: ".$aluno->getNomeResponsavel()."<br>";
			echo "Telefone do Responsavel: ".$aluno->getTelefoneResponsavel()."<br>";
			echo "Profissao do Responsável: ".$aluno->getProfissaoResponsavel()."<br>";
			echo "CPF do Responsavel: ".$aluno->getCpfResponsavel()."<br>";

			$String = "{$this->config->item('base_link')}AlunoController/edit?nome=".$aluno->getNome();
			$String2 = "{$this->config->item('base_link')}AlunoController/delete?nome=".$aluno->getNome();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>