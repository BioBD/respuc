<?php

$nomes = ["instituicao","aprendiz","aluno","atividade"];
$cruds = [];
foreach($nomes as $nome)
{
	$controller = ucfirst($nome)."Controller";
	$crud_array = array
	(
		"nome" => ucfirst($nome),
		"pagina_admin" => "/index.php/{$controller}",
		"controller" => $controller
	);
	$cruds[] = $crud_array;
}

define("CRUDS",$cruds)


?>