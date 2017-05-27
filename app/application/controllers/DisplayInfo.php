<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class DisplayInfo extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();
        $this->load->helper(array('form', 'url'));
	}

	public function inicio(){
		$this->loadView('display/inicio');
	}

	public function admin(){
		$this->loadView('display/admin');
	}

	public function relatorio(){
		$this->loadView('display/relatorio');
	}

	public function contato(){
		$this->loadView('display/contato');
	}
}

?>