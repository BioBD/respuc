<?php

class Atividade 
{
	protected $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public static function createObjectAtividade($resultRow)
	{
		if(self::valida($resultRow))
		{
			return new Atividade ( $resultRow->nome );
		}
		return null;
	}

	public function getDataToSave()
	{
		return array ( $this->getNome() );
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO atividade (nome) VALUES (?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.atividade SET nome=? WHERE nome=?;';
	}

	public static function getSqlToDelete()
	{
		return 'DELETE FROM atividade WHERE nome=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM atividade WHERE nome=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM atividade;';
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($newName)
	{
		$this->nome = $newName;
	}

	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data->nome, $errors);

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

    private static function validaNome ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['nome'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}

?>