<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';

class AtividadeController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('atividade_model');

        $this->atividade_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
	}

	public function insert(){
		$this->loadView('atividade/insert');
	}

	public function search(){
		$this->loadView('atividade/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data['atividade'] = $this->atividade_model->selectOneAtividade($nome);
		$this->loadView('atividade/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->atividade_model->insertNewAtividade($dataIn);
		$data['message'] = "Atividade cadastrada com sucesso!";
		$this->loadView('atividade/admin', $data);
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->atividade_model->updateAtividade($dataIn);
		$data['message'] = "Atividade atualizada com sucesso!";
		$this->loadView('atividade/admin');
	}

	public function show(){
		$data['atividades'] = $this->atividade_model->selectAllAtividade();
		$this->loadView('atividade/show_atividades', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['atividade'] = $this->atividade_model->selectOneAtividade($dataIn);
		$this->loadView('atividade/show_atividade', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = '';
		$return = $this->atividade_model->deleteAtividade($nome);
		$data['message'] = "Atividade excluída com sucesso!";
		$this->loadView('atividade/admin', $data);
	}

	public function form_csv()
    {
            $this->loadView('atividade/form_csv', array('error' => ' ' ));
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

                    $this->loadView('atividade/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->atividade_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeira coluna do csv de atividade deve ser Nome!');</script>";
					            $this->loadView('atividade/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    	}
                    	else
                    	{
                    		$local_data = (object) array("nome" => $resource[0],);
            				$return = $this->atividade_model->insertNewAtividade($local_data	);
            				if(!$return)
            				{
			            		$this->atividade_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->loadView('atividade/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->atividade_model->commitTransaction();
        		echo "<script> alert('Load do csv de atividade feito com sucesso!');</script>";
        		$this->show();
            }
    }

	public function admin(){
		$data['atividades'] = $this->atividade_model->selectAllAtividade();
		$this->loadView('atividade/admin', $data);
	}
}
?>