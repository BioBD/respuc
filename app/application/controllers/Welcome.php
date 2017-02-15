<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class Welcome extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('person_model');

        $this->person_model->setLogger($this->Logger);


	}

	public function index()
	{
		$this->load->view('welcome/welcome_message');
	}

	public function getPerson()
	{

		$person_id = $this->input->get('person_id');
		$data["person"] = $this->person_model->getPerson($person_id);
		$this->load->view('welcome/show_person',$data);
	}

	public function getPersons()
	{
		$data["persons"] = $this->person_model->getPersons();
		$this->load->view('welcome/show_persons',$data);
	}

	public function insertPerson()
	{
		$person_name = $this->input->get('name');
		$data["id"] = $this->person_model->insertNewPerson($person_name);
		$this->load->view('welcome/show_id',$data);
	}


}
