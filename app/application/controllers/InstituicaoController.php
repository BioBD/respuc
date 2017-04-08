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

	public function insert(){
		$this->loadView('instituicao/insert');
	}

	public function search(){
		$this->loadView('instituicao/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		$nome = $dataIn["nome"];
		$data['instituicao'] = $this->instituicao_model->selectOneInstituicao($nome);
		$this->loadView('instituicao/edit', $data);
	}

	public function save(){
		$dataIn = $this->input->post();
		$return = $this->instituicao_model->insertNewInstituicao($dataIn);
		$this->loadView('instituicao/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
		$return = $this->instituicao_model->updateInstituicao($dataIn);
		$this->loadView('instituicao/cadastrosucesso');
	}

	public function list(){
		$data['instituicoes'] = $this->instituicao_model->selectAllInstituicao();
		$this->loadView('instituicao/show_instituicoes', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['instituicao'] = $this->instituicao_model->selectOneInstituicao($dataIn);
		$this->loadView('instituicao/show_instituicao', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"])){
			$nome = $dataIn["nome"];
		}
		else{
			$nome = '';
		}
		$return = $this->instituicao_model->deleteInstituicao($nome);
		$this->loadView('instituicao/excluidosucesso');
	}
}
?>