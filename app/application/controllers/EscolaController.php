<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class EscolaController extends RN_Controller {

	public function __construct() {

    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('escola_model');

        $this->escola_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));

	}

	public function insert(){
		$this->loadView('escola/insert');
	}

	public function search(){
		$this->loadView('escola/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data['escola'] = $this->escola_model->selectOneEscola($nome);
		$this->loadView('escola/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->escola_model->insertNewEscola($dataIn);
		$data['message'] = "Escola cadastrada com sucesso!";
		$this->loadView('escola/admin', $data);
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->escola_model->updateEscola($dataIn);
		$data['message'] = "Escola atualizada com sucesso!";
		$this->loadView('escola/admin');
	}

	public function show(){
		$data['escolas'] = $this->escola_model->selectAllEscola();
		$this->loadView('escola/show_escolas', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['escola'] = $this->escola_model->selectOneEscola($dataIn);
		$this->loadView('escola/show_escola', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$return = $this->escola_model->deleteEscola($nome);
		$data['message'] = "Escola excluída com sucesso!";
		$this->loadView('escola/admin', $data);
	}

    public function form_csv()
    {
            $this->loadView('escola/form_csv', array('error' => ' ' ));
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

                    $this->loadView('escola/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->escola_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeiro coluna do csv de escola deve ser Nome!');</script>";
					            $this->loadView('escola/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "Telefone")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de escola deve ser Telefone!');</script>";
					            $this->loadView('escola/form_csv', array('error' => ' ' ));
			                    return;
                    		}

                    	}
                    	else
                    	{
                    		$local_data = (object) array(    
                    			"nome" => $resource[0],
							    "telefone" => $resource[1],
							    );
            				$return = $this->escola_model->insertNewEscola($local_data	);
            				if(!$return)
            				{
			            		$this->escola_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->loadView('escola/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->escola_model->commitTransaction();
        		echo "<script> alert('Load do csv de escola feito com sucesso!');</script>";
        		$this->show();
            }
    }
	public function admin(){
		$data['escolas'] = $this->escola_model->selectAllEscola();
		$this->loadView('escola/admin', $data);
	}
}
?>