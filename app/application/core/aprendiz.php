<?php
class Aprendiz {
	protected $nome;
	protected $cpf;
	protected $rg;
	protected $data_nascimento;
	protected $naturalidade;
	protected $email;
	protected $telefone;
	protected $celular;
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
	public function setNome($newName){
		$this->nome = $newName;
	}

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
		$this->naturalidade = $newNaturalidade;
	}

	public function getEmail(){
		return $this->email;
	}
	public function setEmail($newEmail){
		$this->email = $newEmail;
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
	}

	public function getNomeResponsavel(){
		return $this->nome_responsavel;
	}
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
?>