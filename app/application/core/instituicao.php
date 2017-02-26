<?php

class Instituicao {
	protected $nome;
	protected $telefone;
	protected $celular;
	protected $email;
	protected $vinculo;
	protected $nome_responsavel;
	protected $email_responsavel;
	protected $telefone_responsavel;
	/*Links fica fora por enquanto*/

	public function __construct($nome, $telefone, $celular, $email, $vinculo, $nome_responsavel, $email_responsavel, $telefone_responsavel){
		$this->nome = trim(strip_tags($nome));
		$this->telefone = trim(strip_tags($telefone));
		$this->celular = trim(strip_tags($celular));
		$this->email = trim(strip_tags($email));
		$this->vinculo = trim(strip_tags($vinculo));
		$this->nome_responsavel = trim(strip_tags($nome_responsavel));
		$this->email_responsavel = trim(strip_tags($email_responsavel));
		$this->telefone_responsavel = trim(strip_tags($telefone_responsavel));
	}

	public static function createObjectInstituicao($resultRow){
		if(self::valida($resultRow)){
			return new Instituicao($resultRow['nome'], $resultRow['telefone'], $resultRow['celular'], $resultRow['email'], $resultRow['vinculo'], $resultRow['nome_responsavel'], $resultRow['email_responsavel'], $resultRow['telefone_responsavel']);
		}
		return null;
	}

	public function getDataToSave(){
		return array($this->getNome(), $this->getTelefone(), $this->getCelular(), $this->getEmail(), $this->getVinculo(), $this->getNomeResponsavel(), $this->getEmailResponsavel(), $this->getTelefoneResponsavel());
	}

	public function getSqlToInsert(){
		return 'INSERT INTO instituicao(
	nome, telefone, celular, email, vinculo, nome_responsavel, email_responsavel, telefone_responsavel)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
	}

	public function getSqlToUpdate(){
		return 'UPDATE instituicao
	SET nome=?, telefone=?, celular=?, email=?, vinculo=?, nome_responsavel=?, email_responsavel=?, telefone_responsavel
	WHERE nome=?;';
	}

	public function getSqlToDelete(){
		return 'DELETE FROM instituicao
	WHERE nome=?;';

	}

	public static function getSqlToSelect(){
		return 'SELECT * FROM instituicao WHERE nome=?;';
	}

	public static function getSqlToSelectAll(){
		return 'SELECT * FROM instituicao;';
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($newName){
		$this->nome = $newName;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($newTelephone){
		$this->telefone = $newTelephone;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function setCelular($newMobile){
		$this->celular = $newMobile;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($newEmail){
		$this->email = $newEmail;
	}

	public function getVinculo(){
		return $this->vinculo;
	}

	public function setVinculo($newVinculo){
		$this->vinculo = $newVinculo;
	}

	public function getNomeResponsavel(){
		return $this->nome_responsavel;
	}

	public function setNomeResponsavel($newNameResponsavel){
		$this->nome_responsavel = $newNomeResponsavel;
	}

	public function getEmailResponsavel(){
		return $this->email_responsavel;
	}

	public function setEmailResponsavel($newEmailResponsavel){
		return $this->email_responsavel = $newEmailResponsavel;
	}

	public function getTelefoneResponsavel(){
		return $this->telefone_responsavel;
	}

	public function setTelefoneResponsavel($newTelephoneResponavel){
		return $this->telefone_resposanvel = $newTelephoneResponavel;
	}

	private static function valida($data) {
		
        $errors = array();
        $errors = self::validaNome($data['nome'], $errors);
        $errors = self::validaTelefone($data['telefone'], $errors);
        $errors = self::validaCelular($data['celular'], $errors);
        //$errors = validaWebsite($data["website"], $errors);
        $errors = self::validaVinculo($data['vinculo'], $errors);
        $errors = self::validaEmail($data['email'], $errors);
        $errors = self::validaNomeResponsavel($data['nome_responsavel'], $errors);
        $errors = self::validaEmailResponsavel($data['email_responsavel'], $errors);
        $errors = self::validaTelefoneResponsavel($data['telefone_responsavel'], $errors);

        if($errors == null){
            return true;
        }

        foreach ($errors as $error) {
        	echo $error;
        }
        die();
        return false;
    }

    private static function validaNome($data, $errors){
        if (empty($data)) {
            //tratar erro para campo nome vazio.
            $errors['nome'] = "O campo Nome não pode estar vazio!";
        } 
        return $errors;
    }

	private static function validaWebsite($data, $errors){
        if (empty($data)) {
            //tratar erro para campo dt_nasc vazio.
        } else if (filter_var($url, FILTER_VALIDATE_URL) === false){
        	$errors["website"] = "O campo Website inválido!";
        }
        return $errors;
    }

	private static function validaVinculo($data, $errors){
        if (empty($data)) {
            //tratar erro para campo vinculo vazio.
            $errors['vinculo'] = "O campo Vínculo não pode estar vazio!";
        } 
        return $errors;
    }

	private static function validaTelefone($data, $errors){
        if (empty($data)) {
            //tratar erro para campo vinculo vazio.
            $errors['telefone'] = "O campo Telefone não pode estar vazio!";
        } 
        return $errors;
    }

	private static function validaCelular($data, $errors){
        if (empty($data)) {
            //tratar erro para campo vinculo vazio.
            $errors['celular'] = "O campo Celular não pode estar vazio!";
        } 
        return $errors;
    }

	private static function validaEmail($data, $errors){
        if (empty($data)) {
            //tratar erro para campo email_instituicao vazio.
            $errors['email'] = "O campo E-mail não pode estar vazio!";
        } else if(filter_var($data, FILTER_VALIDATE_EMAIL) === false){
            $errors["email"] = "Campo E-mail inválido!";
        }
        return $errors;
    }

	private static function validaNomeResponsavel($data, $errors){
        if (empty($data)) {
            //tratar erro para campo relacoes publicas vazio.
            $errors['nome_responsavel'] = "O campo Nome do Responsável não pode estar vazio!";
        } 
        return $errors;
    }

    private static function validaEmailResponsavel($data, $errors){
        if (empty($data)) {
            //tratar erro para campo email_responsavel vazio.
            $errors['email_responsavel'] = "O campo E-mail do Responsável não pode estar vazio!";
        } else if(filter_var($data, FILTER_VALIDATE_EMAIL) === false){
            $errors["email_responsavel"] = "Campo E-mail do Responsável inválido!";
        }
        return $errors;
    }

	private static function validaTelefoneResponsavel($data, $errors){
        if (empty($data)) {
            //tratar erro para campo telefone_fixo vazio.
            $errors['telefone_responsavel'] = "O campo Telefone do Responsável não pode estar vazio!";
        } 
        return $errors;
    }
}

?>