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
		}
?>