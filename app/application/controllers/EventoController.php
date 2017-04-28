<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';

class EventoController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('evento_model');

        $this->evento_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
	}

	public function insert(){
		$this->loadView('evento/insert');
	}

	public function search(){
		$this->loadView('evento/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data['evento'] = $this->evento_model->selectOneEvento($nome);
		$this->loadView('evento/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data = $this->toYYYYMMDD($dataIn->data)
		$return = $this->evento_model->insertNewEvento($dataIn);
		$this->loadView('evento/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data = $this->toYYYYMMDD($dataIn->data)
		$return = $this->evento_model->updateEvento($dataIn);
		$this->loadView('evento/cadastrosucesso');
	}

	public function show(){
		$data['eventos'] = $this->evento_model->selectAllEvento();
		$this->loadView('evento/show_eventos', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['evento'] = $this->evento_model->selectOneEvento($dataIn);
		$this->loadView('evento/show_evento', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = '';
		$return = $this->evento_model->deleteEvento($nome);
		$this->loadView('evento/excluidosucesso');
	}

	public function form_csv()
    {
            $this->load->view('evento/form_csv', array('error' => ' ' ));
    }

    public function upload_csv()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('evento/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->evento_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeira coluna do csv de evento deve ser Nome!');</script>";
					            $this->load->view('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "Data")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de evento deve ser Data');</script>";
					            $this->load->view('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "Presencas")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de evento deve ser Presencas');</script>";
					            $this->load->view('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    	}
                    	else
                    	{
                    		$local_data = (object) array(    
							    "nome" => $resource[0],
								"data" => $this->toYYYYMMDD($resource[1]),
								"presencas" => $resource[2],
							    );
            				$return = $this->evento_model->insertNewEvento($local_data	);
            				if(!$return)
            				{
			            		$this->evento_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->load->view('evento/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->evento_model->commitTransaction();
        		echo "<script> alert('Load do csv de evento feito com sucesso!');</script>";
        		$this->show();
            }
    }
}
?>