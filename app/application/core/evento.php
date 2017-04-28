<?php

class Evento 
{
	protected $nome;
	protected $presencas;
	protected $dataevento;
	protected $descricao;


	public function __construct($nome, $presencas, $dataevento, $descricao)
	{
		$this->nome = $nome;
		$this->presencas = $presencas;
		$this->dataevento = $dataevento;
		$this->descricao = $descricao;
	}

	public static function createObjectEvento($resultRow)
	{
		if(self::valida($resultRow))
		{
			return new Evento ( $resultRow->nome, $resultRow->presencas, $resultRow->dataevento, $resultRow->descricao );
		}
		return null;
	}

	public function getDataToSave()
	{
		return array ( $this->getNome(), $this->getPresencas(), $this->getDataEvento(), $this->getDescricao() );
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO evento (nome, presencas, dataevento, descricao) VALUES (?,?,?,?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.evento SET nome=?, presencas=?, dataevento=?, descricao=? WHERE nome=?;';
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

	public function getPresencas()
	{
		return $this->presencas;
	}

	public function setPresencas($newPresencas)
	{
		$this->presencas = $newPresencas;
	}

	public function getDataEvento()
	{
		return $this->dataevento;
	}

	public function setDataEvento($newDataEvento)
	{
		$this->dataevento = $newDataEvento;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($newDescricao)
	{
		$this->descricao = $newDescricao;
	}

	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data->nome, $errors);
		$errors = self::validaPresencas($data->presencas, $errors);
        $errors = self::validaDataEvento($data->dataevento, $errors);
        $errors = self::validaDescricao($data->descricao, $errors);

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

    private static function validaPresencas ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['presencas'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaDataEvento ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['dataevento'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaDescricao ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['descricao'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}

?>