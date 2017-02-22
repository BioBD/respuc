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

	public function inserir()
	{
		$this->loadView('instituicao/inserir');
	}

	public function salvar(){
		$dataIn = $this->input->post();
		$data["id"] = $this->instituicao_model->insertNewInstituicao($dataIn);
		$this->loadView('welcome/show_id',$data);
	}
}

?>