<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class AprendizController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('aprendiz_model');

        $this->aprendiz_model->setLogger($this->Logger);

	}

	public function insert(){
		$this->loadView('aprendiz/insert');
	}

	public function search(){
		$this->loadView('aprendiz/search');
	}

	public function edit(){
		$dataIn = $this->input->get(	);
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data['aprendiz'] = $this->aprendiz_model->selectOneAprendiz($nome);
		$this->loadView('aprendiz/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
		$return = $this->aprendiz_model->insertNewAprendiz($dataIn);
		$this->loadView('aprendiz/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
		$return = $this->aprendiz_model->updateAprendiz($dataIn);
	}

	public function list(){
		$data['aprendiz'] = $this->aprendiz_model->selectAllAprendiz();
		$this->loadView('aprendiz/show_aprendiz', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['aprendiz'] = $this->aprendiz_model->selectOneAprendiz($dataIn);
		$this->loadView('aprendiz/show_aprendiz', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = '';
		$return = $this->aprendiz_model->deleteAprendiz($nome);
		$this->loadView('aprendiz/excluidosucesso');
	}
}
?>