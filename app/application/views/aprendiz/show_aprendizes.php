<<<<<<< Updated upstream
=======
<<<<<<< HEAD

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

			echo '<form method="post" action="update" enctype="multipart/form-data">';
			echo '<input type="submit" name="update-btn" value="Edit">'; echo "</form>";
			echo '<a href=<?$config["base_url"]?>index.php/AprendizController/delete?nome='.aprendiz->getNome();
			echo "DELETE";
			echo "</a>";

			/* 	Não está funcionando.
			echo '<form method="post" action="delete" enctype="multipart/form-data">';
			echo '<input type="submit" name="delete-btn" value="Delete">';
			echo "</form>";
			*/
=======
>>>>>>> Stashed changes
<?php
	foreach ($aprendizes as $aprendiz) {
			echo "<br>";
			echo "Mostrar Aprendiz: ";
			echo $aprendiz->getNome()."<br>"; 
			echo "CPF: ".$aprendiz->getCPF()."<br>";
			echo "RG: ".$aprendiz->getRG()."<br>";
			echo "Data de Nascimento: ".$aprendiz->getDataNascimento()."<br>";
			echo "Naturalidade: ".$aprendiz->getNaturalidade()."<br>";
			echo "E-mail: ".$aprendiz->getEmail()."<br>";
			echo "Telefone: ".$aprendiz->getTelefone()."<br>";
			echo "Celular: ".$aprendiz->getCelular()."<br>";
			echo "Rua: ".$aprendiz->getRua()."<br>";
			echo "Número: ".$aprendiz->getNumero()."<br>";
			echo "Complemento: ".$aprendiz->getComplemento()."<br>";
			echo "Bairro: ".$aprendiz->getBairro()."<br>";
			echo "Cidade: ".$aprendiz->getCidade()."<br>";
			echo "UF: ".$aprendiz->getUF()."<br>";
			echo "Cidade: ".$aprendiz->getCidade()."<br>";
			echo "CEP: ".$aprendiz->getCEP()."<br>";
			echo "Cursos: ".$aprendiz->getCursos()."<br>";
			echo "Informações do responsável"
			echo "Nome: ".$aprendiz->getNomeResponsavel()."<br>";
			echo "Telefone: ".$aprendiz->getTelefoneResponsavel()."<br>";
			echo "Profissão: ".$aprendiz->getProfissaoResponsavel()."<br>";
			echo "CPF: ".$aprendiz->getCPFResponsavel()."<br>";
			echo '<form method="post" action="update" enctype="multipart/form-data">';
			echo '<input type="submit" name="update-btn" value="Edit">';
			echo "</form>";
			echo '<a href=<?$config["base_url"]?>index.php/instituicaocontroller/delete?nome='.$instituicao->getNome();
			echo "DELETE";
			echo "</a>";
<<<<<<< Updated upstream
=======
>>>>>>> origin/development
>>>>>>> Stashed changes
		}
?>