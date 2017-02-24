<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class InstituicaoController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('instituicao_model');

        $this->instituicao_model->setLogger($this->Logger);

	}

	public function insert()
	{
		$this->loadView('instituicao/insert');
	}

	public function save(){
		$dataIn = $this->input->post();
		$return = $this->instituicao_model->insertNewInstituicao($dataIn);
		$this->loadView('instituicao/cadastrosucesso');
	}

	public function list(){
		$return = $this->instituicao_model->selectAllInstituicao();
		foreach ($return as $object) {
			echo $object->getNome()."<br>";
			echo $object->getTelefone()."<br>";
			echo $object->getCelular()."<br>";
			echo $object->getEmail()."<br>";
			echo $object->getVinculo()."<br>";
			echo $object->getNomeResponsavel()."<br>";
			echo $object->getEmailResponsavel()."<br>";
			echo $object->getTelefoneResponsavel()."<br>";
		}
		die();
		$this->loadView('instituicao/listall');
	}

	public function update(){
		$this->loadView('instituicao/update');
	}

	public function delete()
	{
		$dataIn = $this->input->post();
		$return = $this->instituicao_model->deleteInstituicao($dataIn);
		$this->loadView('instituicao/excluidosucesso');
	}
}

?>