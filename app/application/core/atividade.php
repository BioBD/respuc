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

	public static function getSqlToSelectCandidates()
	{
		return "
		SELECT * FROM alunos_e_aprendizes aa WHERE not exists
		(
			SELECT 1 FROM cpf_atividade ca
			WHERE
					aa.cpf = ca.cpf
				and
					aa.tipo = ca.tipo
				and
					ca.atividade = ?
		);";
	}

	public static function getSqlToSelectPersons()
	{
		return " SELECT * FROM pessoa_atividade where atividade = ?;";
	}


	public static function getSqlToAddAprendiz()
	{
		return "Insert into aprendiz_atividade(cpf,atividade) values (?,?)";
	}

	public static function getSqlToAddAluno()
	{
		return "Insert into aluno_atividade(cpf,atividade) values (?,?)";
	}

	public static function getSqlToRemoveAprendiz()
	{
		return "delete from aprendiz_atividade where cpf=? and atividade=?";
	}

	public static function getSqlToRemoveAluno()
	{
		return "delete from aluno_atividade where cpf=? and atividade=?";
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