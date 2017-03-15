<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class EscolaController extends RN_Controller {

	public function __construct() {

    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('escola_model');

        $this->escola_model->setLogger($this->Logger);

	}

	public function insert(){
		$this->loadView('escola/insert');
	}

	public function search(){
		$this->loadView('escola/search');
	}

	public function edit(){
		$dataIn = $this->input->post();
		$data['escola'] = $this->escola_model->selectOneEscola($dataIn);
		$this->loadView('escola/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
		$return = $this->escola_model->insertNewEscola($dataIn);
		$this->loadView('escola/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
		$return = $this->escola_model->updateEscola($dataIn);
	}

	public function list(){
		$data['escola'] = $this->escola_model->selectAllEscola();
		$this->loadView('escola/show_escola', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['escola'] = $this->escola_model->selectOneEscola($dataIn);
		$this->loadView('escola/show_escola', $data);
	}

	public function delete(){
		$dataIn = $this->input->post();
		$return = $this->escola_model->deleteEscola($dataIn);
		$this->loadView('escola/excluidosucesso');
	}
}

?>