<?php
class Funcionario 
{
	protected $nome;
	protected $cpf;
	protected $rg;
	protected $data_nascimento;
	protected $naturalidade;
	protected $email;
	protected $telefone;
	protected $celular;
	protected $funcao;
	public function __construct($nome, $cpf, $rg, $data_nascimento, $naturalidade, $email, $telefone, $celular, $funcao)
	{
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->rg = $rg;
		$this->data_nascimento = $data_nascimento;
		$this->naturalidade = $naturalidade;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->funcao = $funcao;
	}
	public static function createObjectFuncionario($resultRow)
	{
		if(self::valida($resultRow)){
			return new Funcionario (
				$resultRow->nome, $resultRow->cpf,
				$resultRow->rg, $resultRow->data_nascimento,
				$resultRow->naturalidade, $resultRow->email,
				$resultRow->telefone, $resultRow->celular,
				$resultRow->funcao;
		}
		return null;
	}
	public function getDataToSave()
	{
		return array (
					$this->getNome(), $this->getCpf(), $this->getRg(),
					$this->getDataNascimento(), $this->getNaturalidade(), 
					$this->getEmail(), $this->getTelefone(), $this->getCelular(),
					$this->getFuncao());
	}
	public function getSqlToInsert()
	{
		return 'INSERT INTO funcionario (
									  nome, cpf, rg, data_nascimento, naturalidade,
									  email, telefone, celular,
									  funcao) VALUES (?,?,?,?,?,?,?,?,?);';
	}
	public function getSqlToUpdate()
	{
		return 'UPDATE public.funcionario SET   
									  nome=?, cpf=?, rg=?, data_nascimento=?, naturalidade=?,
									  email=?, telefone=?, celular=?,
									  funcao=?
		WHERE nome=?;';
	}
	public static function getSqlToDelete()
	{
		return 'DELETE FROM funcionario
		WHERE nome=?;';
	}
	public static function getSqlToSelect()
	{
		return 'SELECT * FROM funcionario WHERE nome=?;';
	}
	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM funcionario;';
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($newName)
	{
		$this->nome = $newName;
	}
	public function getCpf()
	{
		return $this->cpf;
	}
	public function setCpf($newCpf)
	{
		$this->cpf = $newCpf;
	}
	public function getRg()
	{
		return $this->rg;
	}
	public function setRg($newRg)
	{
		$this->rg = $newRg;
	}
	public function getDataNascimento()
	{
		return $this->data_nascimento;
	}
	public function setDataNascimento($newDataNascimento)
	{
		$this->data_nascimento = $newDataNascimento;
	}
	public function getNaturalidade()
	{
		return $this->naturalidade;
	}
	public function setNaturalidade($newNaturalidade)
	{
		$this->naturalidade = $newNaturalidade;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($newEmail)
	{
		$this->email = $newEmail;
	}	
	public function getTelefone()
	{
		return $this->telefone;
	}
	public function setTelefone($newTelephone)
	{
		$this->telefone = $newTelephone;
	}
	public function getCelular()
	{
		return $this->celular;
	}
	public function setCelular($newCelular)
	{
		$this->celular = $newCelular;
	}
	public function getFuncao()
	{
		return $this->funcao;
	}
	public function setFuncao($newFuncao)
	{
		$this->funcao = $newFuncao;
	}
	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data->nome, $errors);
        $errors = self::validaCpf($data->cpf, $errors);
        $errors = self::validaRg($data->rg, $errors);
        $errors = self::validaDataNascimento($data->data_nascimento, $errors);
        $errors = self::validaNaturalidade($data->naturalidade, $errors);
        $errors = self::validaEmail($data->email, $errors);
        $errors = self::validaTelefone($data->telefone, $errors);
        $errors = self::validaCelular($data->celular, $errors);
        $errors = self::validaFuncao($data->funcao, $errors);
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
    private static function validaCpf ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['cpf'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaRg ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['rg'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaDataNascimento ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['data_nascimento'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaNaturalidade ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['naturalidade'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaEmail ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['email'] = "O campo não pode estar vazio!";
        } 
        else if (filter_var($data, FILTER_VALIDATE_EMAIL) === false)
        {
            $errors["email"] = "Campo inválido!";
        }
        return $errors;
    }
    private static function validaTelefone ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['telefone'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaCelular ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['celular'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
    private static function validaFuncao ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['funcao'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}
?>
