<?php

$nomes = ["instituicao","aprendiz","aluno","atividade","curso","escola","evento","funcionario"];
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