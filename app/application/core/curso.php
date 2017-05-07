<?php
include_once APPPATH . 'core/RN_Controller.php';

class Curso 
{
	protected $nome;
	protected $coord;
	protected $depto;
	protected $qtd_alunos;

	public function __construct($nome, $coord, $depto, $qtd_alunos)
	{
		$this->nome = $nome;
		$this->coord = $coord;
		$this->depto = $depto;
		$this->qtd_alunos = $qtd_alunos;
	}

	public static function createObjectEvento($resultRow)
	{
		if(self::valida($resultRow)){
			return new Evento ( $resultRow->nome, $resultRow->coord,
				$resultRow->depto, $resultRow->qtd_alunos);
		}
		return null;
	}

	public function getDataToSave()
	{
		return array ( $this->getNome(), $this->getCoord(), $this->getDepto(),
					   $this->getQtdAlunos());
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO curso ( nome, coord, depto, qtd_alunos) VALUES (?,?,?,?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.curso SET nome=?, coord=?, depto=?, qtd_alunos=? WHERE nome=?;';
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

	public function getCoord()
	{
		return $this->coord;
	}

	public function setCoord($newCoord)
	{
		$this->coord = $newCoord;
	}

	public function getDepto()
	{
		return $this->depto;
	}

	public function setDepto($newDepto)
	{
		$this->depto = $newDepto;
	}

	public function getQtdAlunos()
	{
		return $this->qtd_alunos;
	}

	public function setQtdAlunos($newQtdAlunos)
	{
		$this->qtd_alunos = $newQtdAlunos;
	}

	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data->nome, $errors);
        $errors = self::validaCoord($data->coord, $errors);
        $errors = self::validaDepto($data->depto, $errors);
        $errors = self::validaQtdAlunos($data->qtd_alunos, $errors);
        
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

    private static function validaCoord ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['coord'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaDepto ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['depto'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaQtdAlunos ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['qtd_alunos'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}

?>