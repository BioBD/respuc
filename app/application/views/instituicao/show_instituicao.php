<div class = "row">
    <?php require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-10">
    	<?php
			echo "<br>";
			echo "Mostrar Instituição: ";
			echo $instituicao->getNome()."<br>";
			echo "Telefone: ".$instituicao->getTelefone()."<br>";
			echo "Celular: ".$instituicao->getCelular()."<br>";
			echo "E-mail: ".$instituicao->getEmail()."<br>";
			echo "Vínculo: ".$instituicao->getVinculo()."<br>";
			echo "Nome do Responsável: ".$instituicao->getNomeResponsavel()."<br>";
			echo "E-mail do Responsável: ".$instituicao->getEmailResponsavel()."<br>";
			echo "Telefone do Responsável: ".$instituicao->getTelefoneResponsavel()."<br>";
		?>

    </div>
</div>


