<?php

class Curso 
{
	protected $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}

	public static function createObjectCurso($resultRow)
	{
		if(self::valida($resultRow))
		{
			return new Curso ( $resultRow->nome );
		}
		return null;
	}

	public function getDataToSave()
	{
		return array ( $this->getNome() );
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO curso (nome) VALUES (?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.curso SET nome=? WHERE nome=?;';
	}

	public static function getSqlToDelete()
	{
		return 'DELETE FROM curso WHERE nome=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM curso WHERE nome=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM curso;';
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