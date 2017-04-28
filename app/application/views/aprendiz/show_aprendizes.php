<?php
	foreach ($aprendizes as $aprendiz) 
	{
			echo "<br>";
			echo "Mostrar Aprendiz: "; "<br>";

			echo "Nome: ".$aprendiz->getNome()."<br>";
			echo "CPF: ".$aprendiz->getCpf()."<br>";
			echo "RG: ".$aprendiz->getRg()."<br>";
			echo "Data de Nascimento: ".$aprendiz->getDataNascimento()."<br>";
			echo "Naturalidade: ".$aprendiz->getNaturalidade()."<br>";
			echo "Email: ".$aprendiz->getEmail()."<br>";
			echo "Telefone: ".$aprendiz->getTelefone()."<br>";
			echo "Celular: ".$aprendiz->getCelular()."<br>";
			echo "Rua: ".$aprendiz->getRua()."<br>";
			echo "Numero: ".$aprendiz->getNumero()."<br>";
			echo "Complemento: ".$aprendiz->getComplemento()."<br>";
			echo "Bairro: ".$aprendiz->getBairro()."<br>";
			echo "Cidade: ".$aprendiz->getCidade()."<br>";
			echo "UF: ".$aprendiz->getUf()."<br>";
			echo "CEP: ".$aprendiz->getCep()."<br>";
			echo "Trabalho: ".$aprendiz->getTrabalho()."<br>";

			echo "<br>";
			echo "Responsavel do Aprendiz: "; "<br>";

			echo "Nome do Responsavel: ".$aprendiz->getNomeResponsavel()."<br>";
			echo "Telefone do Responsavel: ".$aprendiz->getTelefoneResponsavel()."<br>";
			echo "Profissao do Responsável: ".$aprendiz->getProfissaoResponsavel()."<br>";
			echo "CPF do Responsavel: ".$aprendiz->getCpfResponsavel()."<br>";

			$String = "{$this->config->item('base_link')}AprendizController/edit?cpf=".$aprendiz->getCpf();
			$String2 = "{$this->config->item('base_link')}AprendizController/delete?cpf=".$aprendiz->getCpf();
			echo '<a href="'.$String.'">EDIT</a>';
			echo "<br>";
			echo '<a href="'.$String2.'">DELETE</a>';
	}
?>