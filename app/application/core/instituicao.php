<?php

class Instituicao {
	protected $nome;
	protected $telefone;
	protected $celular;
	protected $email;
	protected $vinculo;
	protected $nome_responsavel;
	protected $email_responsavel;
	protected $telefone_resposanvel;
	/*Links fica fora por enquanto*/

	public function __construct($nome, $telefone){
		$this->nome = $nome;
		$this->telefone = $telefone;
	}

	public static function createObjectInstituicao($resultRow){
		return new Instituicao($resultRow['nome'], $resultRow['telefone']);
	}

	public function getDataToSave(){
		return array($this->getNome(), $this->getTelefone());
	}

	public function getSqlToInsert(){
		return 'INSERT INTO instituicao (nome, telefone) VALUES (?,?)';
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
		return $this->telefone_resposanvel;
	}

	public function setTelefoneResponsavel($newTelephoneResponavel){
		return $this->telefone_resposanvel = $newTelephoneResponavel;
	}
}

?>