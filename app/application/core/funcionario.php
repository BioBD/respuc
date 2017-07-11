<?php
include_once APPPATH . 'core/RN_Controller.php';
include_once APPPATH . 'core/utils.php';

class Voluntario 
{


	protected $nome;
	protected $cpf;
	protected $rg;
	protected $data_nascimento;
	protected $naturalidade;
	protected $email;
	protected $telefone;
	protected $celular;
	protected $rua;
	protected $numero;
	protected $complemento;
	protected $bairro;
	protected $cidade;
	protected $uf;
	protected $cep;

	public function __construct($nome, $cpf, $rg, $data_nascimento, $naturalidade, $email, $telefone, $celular, $rua, $numero, $complemento, 
		$bairro, $cidade, $uf, $cep)
	{
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->rg = $rg;
		$this->data_nascimento = $data_nascimento;
		$this->naturalidade = $naturalidade;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->rua = $rua;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
		$this->cep = $cep;
	}

	public static function createObjectVoluntario($resultRow)
	{
		if(self::valida($resultRow)){
			return new Voluntario (
				$resultRow->nome, $resultRow->cpf,
				$resultRow->rg, RN_Controller::toDDMMYYYY($resultRow->data_nascimento),
				$resultRow->naturalidade, $resultRow->email,
				$resultRow->telefone, $resultRow->celular,
				$resultRow->rua, $resultRow->numero, 
				$resultRow->complemento, $resultRow->bairro, 
				$resultRow->cidade, $resultRow->uf, 
				$resultRow->cep);
		}
		return null;
	}

	public function getDataToSave()
	{
		return array (
					$this->getNome(), $this->getCpf(), $this->getRg(),
					toYYYYMMDD($this->getDataNascimento()), $this->getNaturalidade(), 
					$this->getEmail(), $this->getTelefone(), $this->getCelular(),
					$this->getRua(), $this->getNumero(), $this->getComplemento(),
					$this->getBairro(), $this->getCidade(), $this->getUf(), 
					$this->getCep());
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO voluntario (
									  nome, cpf, rg, data_nascimento, naturalidade,
									  email, telefone, celular,
									  rua, numero, complemento, bairro, cidade,
		                              uf, cep) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE public.voluntario SET   
									  nome=?, cpf=?, rg=?, data_nascimento=?, naturalidade=?,
									  email=?, telefone=?, celular=?,
									  rua=?, numero=?, complemento=?, bairro=?,
									  cidade=?, uf=?, cep=?
		WHERE cpf=?;';
	}

	public static function getSqlToDelete()
	{
		return 'DELETE FROM voluntario
		WHERE cpf=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM voluntario WHERE cpf=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM voluntario;';
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

	public function getRua()
	{
		return $this->rua;
	}

	public function setRua($newRua)
	{
		$this->rua = $newRua;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($newNumero)
	{
		$this->numero = $newNumero;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function setComplemento($newComplemento)
	{
		$this->complemento = $newComplemento;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setBairro($newBairro)
	{
		$this->bairro = $newBairro;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setCidade($newCidade)
	{
		$this->cidade = $newCidade;
	}

	public function getUf()
	{
		return $this->uf;
	}

	public function setUf($newUf)
	{
		$this->uf = $newUf;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function setCep($newCep)
	{
		$this->cep = $newCep;
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
        $errors = self::validaRua($data->rua, $errors);
        $errors = self::validaNumero($data->numero, $errors);
        $errors = self::validaComplemento($data->complemento, $errors);
        $errors = self::validaBairro($data->bairro, $errors);
        $errors = self::validaCidade($data->cidade, $errors);
        $errors = self::validaUf($data->uf, $errors);
        $errors = self::validaCep($data->cep, $errors);

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

    private static function validaRua ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['rua'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

	private static function validaNumero ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['numero'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaComplemento ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['complemento'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaBairro ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['bairro'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaCidade ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['cidade'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaUf ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['uf'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaCep ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['cep'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

}

?>
