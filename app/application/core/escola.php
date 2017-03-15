<?php

class Escola 
{
	protected $nome;
	protected $telefone;
	
	public function __construct($nome, $telefone)
	{
		$this->nome = trim(strip_tags($nome));
		$this->telefone = trim(strip_tags($telefone));
	}

	public static function createObjectEscola ($resultRow) // Criando o Objeto <<Escola>>
	{
		if(self::valida($resultRow)){
			return new Escola($resultRow['nome'], $resultRow['telefone']);
		}
		return null;
	}

	public function getDataToSave()
	{
		return array($this->getNome(), $this->getTelefone());
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO escola (nome, telefone) VALUES (?,?)';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE escola
				SET nome=?, telefone=?
				WHERE nome=?;';
	}

	public function getSqlToDelete()
	{
		return 'DELETE FROM escola
				WHERE nome=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM escola WHERE nome=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM escola;';
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

	private static function valida ($data) 
	{
	    $errors = array();
	    $errors = self::validaNome($data['nome'], $errors);
	    $errors = self::validaTelefone($data['telefone'], $errors);

	    if($errors == null)
	    {
	        return true;
	    }

	    foreach ($errors as $error) 
	    {
	    	echo $error;
	    }
	    die();
	    return false;
	}

	private static function validaNome($data, $errors)
	{
	    if (empty($data)) 
	    {
	        //tratar erro para campo nome vazio.
	        $errors['nome'] = "O campo Nome não pode estar vazio!";
	    } 
	    return $errors;
	}

	private static function validaTelefone($data, $errors)
	{
	    if (empty($data)) 
	    {
	        //tratar erro para campo vinculo vazio.
	        $errors['telefone'] = "O campo Telefone não pode estar vazio!";
	    } 
	    return $errors;
	}
}
?>