<?php

class Evento 
{
	protected $nome;
	protected $data;
	protected $presencas;

	public function __construct($nome, $data, $presencas)
	{
		$this->nome = $nome;
		$this->data = $data;
		$this->presencas = $presencas;
	}

	public static function createObjectEvento($resultRow)
	{
		if(self::valida($resultRow))
		{
			return new Evento ( $resultRow->nome, $resultRow->data, $resultRow->presencas );
		}
		return null;
	}

	public function getDataToSave()
	{
		return array ( $this->getNome(), $this->getData(), $this->getPresencas() );
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO evento (nome, data, presencas) VALUES (?,?,?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.evento SET nome=?, data=?, presencas=? WHERE nome=?;';
	}

	public static function getSqlToDelete()
	{
		return 'DELETE FROM evento WHERE nome=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM evento WHERE nome=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM evento;';
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($newName)
	{
		$this->nome = $newName;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($newData)
	{
		$this->data = $newData;
	}

	public function getPresencas()
	{
		return $this->presencas;
	}

	public function setPresencas($newPresencas)
	{
		$this->presencas = $newPresencas;
	}

	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data->nome, $errors);
        $errors = self::validaData($data->data, $errors);
        $errors = self::validaPresencas($data->presencas, $errors);

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

    private static function validaData ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['data'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaPresencas ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['presencas'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}

?>