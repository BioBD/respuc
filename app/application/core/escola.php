<?php

class Escola 
{
	protected $nome;
	protected $telefone;
	
	public function __construct($nome, $telefone)
	{
		$this->nome = $nome;
		$this->telefone = $telefone;
	}

	public static function createObjectEscola ($resultRow) // Criando o Objeto <<Escola>>
	{
		return new Escola($resultRow['nome'], $resultRow['telefone']);
	}

	public function getDataToSave()
	{
		return array($this->getNome(), $this->getTelefone());
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO escola (nome, telefone) VALUES (?,?)';
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($newName)
	{
		$this->nome = $newName;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setTelefone($newTelephone)
	{
		$this->telefone = $newTelephone;
	}
}

?>