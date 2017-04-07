<?php
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

=======
>>>>>>> origin/development
>>>>>>> Stashed changes
class Aprendiz {
	protected $nome;
	protected $cpf;
	protected $rg;
	protected $data_nascimento;
	protected $naturalidade;
	protected $email;
	protected $telefone;
	protected $celular;
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
	protected $rua;
	protected $numero;
	protected $complemento;
	protected $bairro;
	protected $cidade;
	protected $uf;
	protected $cep;
	protected $trabalho;
	protected $nome_responsavel;
	protected $telefone_responsavel;
	protected $profissao_responsavel;
	protected $cpf_responsavel;

	public function __construct($nome, $cpf, $rg, $data_nascimento, $naturalidade, $email, $telefone, $celular, $rua, $numero, $complemento, 
		$bairro, $cidade, $uf, $cep, $trabalho, $nome_responsavel, $telefone_responsavel, $profissao_responsavel, $cpf_responsavel)
	{
		$this->nome = trim(strip_tags($nome));
		$this->cpf = trim(strip_tags($cpf));
		$this->rg = trim(strip_tags($rg));
		$this->data_nascimento = trim(strip_tags($data_nascimento));
		$this->naturalidade = trim(strip_tags($naturalidade));
		$this->email = trim(strip_tags($email));
		$this->telefone = trim(strip_tags($telefone));
		$this->celular = trim(strip_tags($celular));
		$this->rua = trim(strip_tags($rua));
		$this->numero = trim(strip_tags($numero));
		$this->complemento = trim(strip_tags($complemento));
		$this->bairro = trim(strip_tags($bairro));
		$this->cidade = trim(strip_tags($cidade));
		$this->uf = trim(strip_tags($uf));
		$this->cep = trim(strip_tags($cep));
		$this->trabalho = trim(strip_tags($trabalho));
		$this->nome_responsavel = trim(strip_tags($nome_responsavel));
		$this->telefone_responsavel = trim(strip_tags($telefone_responsavel));
		$this->profissao_responsavel = trim(strip_tags($profissao_responsavel));
		$this->cpf_responsavel = trim(strip_tags($cpf_responsavel));
	}

	public static function createObjectAprendiz($resultRow)
	{
		if(self::valida($resultRow)){
			return new Aprendiz (
				$resultRow['nome'], $resultRow['cpf'],
				$resultRow['rg'], $resultRow['data_nascimento'],
				$resultRow['naturalidade'], $resultRow['email'],
				$resultRow['telefone'], $resultRow['celular'],
				$resultRow['rua'], $resultRow['numero'], 
				$resultRow['complemento'], $resultRow['bairro'], 
				$resultRow['cidade'], $resultRow['uf'], 
				$resultRow['cep'], $resultRow['trabalho'], 
				$resultRow['nome_responsavel'], $resultRow['telefone_responsavel'], 
				$resultRow['profissao_responsavel'], $resultRow['cpf_responsavel']);
		}
		return null;
	}

	public function getDataToSave()
	{
		return array (
					$this->getNome(), $this->getCpf(), $this->getRg(),
					$this->getDataNascimento(), $this->getNaturalidade(), 
					$this->getEmail(), $this->getTelefone(), $this->getCelular(),
					$this->getRua(), $this->getNumero(), $this->getComplemento(),
					$this->getBairro(), $this->getCidade(), $this->getUf(), 
					$this->getCep(), $this->getTrabalho(), $this->getNomeResponsavel(),
					$this->getTelefoneResponsavel(), $this->getProfissaoResponsavel(),
					$this->getCpfResponsavel());
	}

	public function getSqlToInsert()
	{
		return 'INSERT INTO aprendiz (
									  nome, cpf, rg, data_nascimento, naturalidade,
									  email, telefone, celular,
									  rua, numero, complemento, bairro, cidade,
		                              uf, cep, trabalho, nome_responsavel,
		                              telefone_responsavel, profissao_responsavel,
		                              cpf_responsavel) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
	}

	public function getSqlToUpdate()
	{
		return 'UPDATE aprendiz SET   
									  nome=?, cpf=?, rg=?, data_nascimento=?, naturalidade=?,
									  email=?, telefone=?, celular=?,
									  rua=?, numero=?, complemento=?, bairro=?,
									  cidade=?, uf=?, cep=?, trabalho=?,
									  nome_responsavel=?,telefone_responsavel=?,
									  profissao_responsavel=?, cpf_responsavel
		WHERE nome=?;';
	}

	public function getSqlToDelete()
	{
		return 'DELETE FROM aprendiz
		WHERE nome=?;';
	}

	public static function getSqlToSelect()
	{
		return 'SELECT * FROM aprendiz WHERE nome=?;';
	}

	public static function getSqlToSelectAll()
	{
		return 'SELECT * FROM aprendiz;';
	}

	public function getNome(){
		return $this->nome;
	}

=======
>>>>>>> Stashed changes
	protected $end_rua;
	protected $end_numero;
	protected $end_complemento;
	protected $end_bairro;
	protected $end_cidade;
	protected $end_uf;
	protected $end_cep;
	protected $cursos;
	protected $nome_responsavel;
	protected $telefone_resposanvel;
	protected $profissao_resposanvel;
	protected $cpf_resposanvel;

	/*Links fica fora por enquanto*/
	public function __construct(){
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->rg = $rg;
		$this->data_nascimento = $data_nascimento;
		$this->naturalidade = $naturalidade;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->end_rua = $end_rua;
		$this->end_numero = $end_numero;
		$this->end_complemento = $end_complemento;
		$this->end_bairro = $end_bairro;
		$this->end_cidade = $end_cidade;
		$this->end_uf = $end_uf;
		$this->end_cep = $end_cep;
		$this->cursos = $cursos;
		$this->nome_responsavel = $nome_responsavel;
		$this->telefone_resposanvel = $telefone_resposanvel;
		$this->profissao_resposanvel = $profissao_resposanvel;
		$this->cpf_resposanvel = $cpf_resposanvel;
	}
	public static function createObjectInstituicao($resultRow){
		return new Aprendiz($nome, $cpf, $rg, $data_nascimento, $naturalidade, $email, $telefone, $celular, $end_rua, $end_numero, $end_complemento, $end_bairro, $end_cidade, $end_uf, $end_cep, $cursos, $nome_responsavel, $telefone_resposanvel, $profissao_resposanvel, $cpf_resposanvel);
	}
	public function getNome(){
		return $this->nome;
	}
<<<<<<< Updated upstream
=======
>>>>>>> origin/development
>>>>>>> Stashed changes
	public function setNome($newName){
		$this->nome = $newName;
	}

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($newCpf){
		$this->cpf = $newCpf;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setRg($newRg){
		$this->rg = $newRg;
	}

	public function getDataNascimento(){
		return $this->data_nascimento;
	}

	public function setDataNascimento($newDataNascimento){
		$this->data_nascimento = $newDataNascimento;
	}

	public function getNaturalidade(){
		return $this->naturalidade;
	}

	public function setNaturalidade($newNaturalidade){
=======
>>>>>>> Stashed changes
	public function getcpf(){
		return $this->cpf;
	}
	public function setcpf($newCpf){
		$this->cpf = $newCpf;
	}

	public function getdata_nascimento(){
		return $this->data_nascimento;
	}
	public function setdata_nascimento($newDate){
		$this->data_nascimento = $newDate;
	}

	public function getnaturalidade(){
		return $this->naturalidade;
	}
	public function setnaturalidade($newNaturalidade){
<<<<<<< Updated upstream
=======
>>>>>>> origin/development
>>>>>>> Stashed changes
		$this->naturalidade = $newNaturalidade;
	}

	public function getEmail(){
		return $this->email;
	}
<<<<<<< Updated upstream
	public function setEmail($newEmail){
		$this->email = $newEmail;
	}	
=======
<<<<<<< HEAD

	public function setEmail($newEmail){
		$this->email = $newEmail;
	}
=======
	public function setEmail($newEmail){
		$this->email = $newEmail;
	}	
>>>>>>> origin/development
>>>>>>> Stashed changes

	public function getTelefone(){
		return $this->telefone;
	}
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

=======
>>>>>>> origin/development
>>>>>>> Stashed changes
	public function setTelefone($newTelephone){
		$this->telefone = $newTelephone;
	}

	public function getCelular(){
		return $this->celular;
	}
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

	public function setCelular($newCelular){
		$this->celular = $newCelular;
	}

	public function getRua(){
		return $this->rua;
	}

	public function setRua($newRua){
		$this->rua = $newRua;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($newNumero){
		$this->numero = $newNumero;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setComplemento($newComplemento){
		$this->complemento = $newComplemento;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($newBairro){
		$this->bairro = $newBairro;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($newCidade){
		$this->cidade = $newCidade;
	}

	public function getUf(){
		return $this->uf;
	}

	public function setUf($newUf){
		$this->uf = $newUf;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($newCep){
		$this->cep = $newCep;
	}

	public function getTrabalho(){
		return $this->trabalho;
	}

	public function setTrabalho($newTrabalho){
		$this->trabalho = $newTrabalho;
=======
>>>>>>> Stashed changes
	public function setCelular($newMobile){
		$this->celular = $newMobile;
	}

	public function getRua(){
		return $this->end_rua;
	}
	public function setRua($newRua){
		$this->end_rua = $newRua;
	}

	public function getNumero(){
		return $this->end_numero;
	}
	public function setNumero($newNumber){
		$this->end_numero = $newNumber;
	}	

	public function getComplemento(){
		return $this->end_complemento;
	}
	public function setComplemento($newComplemento){
		$this->end_complemento = $newComplemento;
	}

	public function getBairro(){
		return $this->end_bairro;
	}
	public function setBairro($newBairro){
		$this->end_bairro = $newBairro;
	}

	public function getCidade(){
		return $this->end_cidade;
	}
	public function setCidade($newCidade){
		$this->end_cidade = $newCidade;
	}	

	public function getUF(){
		return $this->end_uf;
	}
	public function setUF($newUF){
		$this->end_uf = $newUF;
	}

	public function getCEP(){
		return $this->end_cep;
	}
	public function setCEP($newCEP){
		$this->end_cep = $newCEP;
	}

	public function getCursos(){
		return $this->cursos;
	}
	public function setCursos($newCursos){
		$this->cursos = $newCursos;
<<<<<<< Updated upstream
=======
>>>>>>> origin/development
>>>>>>> Stashed changes
	}

	public function getNomeResponsavel(){
		return $this->nome_responsavel;
	}
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

	public function setNomeResponsavel($newNameResponsavel){
		$this->nome_responsavel = $newNomeResponsavel;
	}

	public function getTelefoneResponsavel(){
		return $this->telefone_responsavel;
	}

	public function setTelefoneResponsavel($newTelephoneResponavel){
		return $this->telefone_resposanvel = $newTelephoneResponavel;
	}

	public function getProfissaoResponsavel(){
		return $this->profissao_responsavel;
	}

	public function setProfissaoResponsavel($newProfissaoResponsavel){
		return $this->profissao_responsavel = $newProfissaoResponsavel;
	}

	public function getCpfResponsavel(){
		return $this->cpf_responsavel;
	}

	public function setCpfResponsavel($newCpfResponsavel){
		return $this->cpf_responsavel = $newCpfResponsavel;
	}

	private static function valida ($data) 
	{
        $errors = array();
        $errors = self::validaNome($data['nome'], $errors);
        $errors = self::validaCpf($data['cpf'], $errors);
        $errors = self::validaRg($data['rg'], $errors);
        $errors = self::validaDataNascimento($data['data_nascimento'], $errors);
        $errors = self::validaNaturalidade($data['naturalidade'], $errors);
        $errors = self::validaEmail($data['email'], $errors);
        $errors = self::validaTelefone($data['telefone'], $errors);
        $errors = self::validaCelular($data['celular'], $errors);
        $errors = self::validaRua($data['rua'], $errors);
        $errors = self::validaNumero($data['numero'], $errors);
        $errors = self::validaComplemento($data['complemento'], $errors);
        $errors = self::validaBairro($data['bairro'], $errors);
        $errors = self::validaCidade($data['cidade'], $errors);
        $errors = self::validaUf($data['uf'], $errors);
        $errors = self::validaCep($data['cep'], $errors);
        $errors = self::validaTrabalho($data['trabalho'], $errors);
        $errors = self::validaNomeResponsavel($data['nome_responsavel'], $errors);
        $errors = self::validaTelefoneResponsavel($data['telefone_responsavel'], $errors);
        $errors = self::validaProfissaoResponsavel($data['profissao_responsavel'], $errors);
        $errors = self::validaCpfResponsavel($data['cpf_responsavel'], $errors);

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

    private static function validaTrabalho ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['trabalho'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaNomeResponsavel ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['nome_responsavel'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaTelefoneResponsavel ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['telefone_responsavel'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaProfissaoResponsavel ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['profissao_responsavel'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaCpfResponsavel ($data, $errors)
    {
        if (empty($data)) 
        {
            // Tratar erro para campo vazio.
            $errors['cpf_responsavel'] = "O campo não pode estar vazio!";
        } 
        return $errors;
    }
}
?>




















=======
>>>>>>> Stashed changes
	public function setNomeResponsavel($newNameResponsavel){
		$this->nome_responsavel = $newNomeResponsavel;
	}
	
	public function getTelefoneResponsavel(){
		return $this->telefone_resposanvel;
	}
	public function setTelefoneResponsavel($newTelephoneResponavel){
		$this->telefone_resposanvel = $newTelephoneResponavel;
	}

	public function getProfissaoResponsavel(){
		return $this->profissao_resposanvel;
	}
	public function setProfissaoResponsavel($newProfissaoResponavel){
		$this->profissao_resposanvel = $newProfissaoResponavel;
	}

	public function getCPFResponsavel(){
		return $this->cpf_resposanvel;
	}
	public function setCPFResponsavel($newCPFResponavel){
		$this->cpf_resposanvel = $newCPFResponavel;
	}
}
<<<<<<< Updated upstream
?>
=======
?>
>>>>>>> origin/development
>>>>>>> Stashed changes
