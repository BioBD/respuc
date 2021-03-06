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

	public function insert($data = array()){
		$data["action"] = "save"; 
		$this->loadView('evento/modifyShow',$data);
	}

	public function edit($data = array()){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data["action"] = "update"; 			
		$data['evento'] = $this->evento_model->selectOneEvento($nome);
		$this->loadView('evento/modifyShow',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->dataevento = $this->toYYYYMMDD($dataIn->dataevento);

		$return = $this->evento_model->insertNewEvento($dataIn);
		if($return)
			$data['message'] = "Evento cadastrado com sucesso!";
		else
		{
			$this->insert($this->input->post);
			return;
		}		
		$this->admin($data);
}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->dataevento = $this->toYYYYMMDD($dataIn->dataevento);
		$return = $this->evento_model->updateEvento($dataIn);
		if($return)
			$data['message'] = "Evento atualizado com sucesso!";
		else
		{
			$this->edit($this->input->post);
			return;
		}		
		$this->admin($data);
}


	public function get(){
		$dataIn = $this->input->get();
		$data["action"] = "";
		$data["disabled"] = "disabled"; 
		$data['evento'] = $this->evento_model->selectOneEvento($dataIn);
		$this->loadView('evento/modifyShow', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = '';
		$return = $this->evento_model->deleteEvento($nome);
		$data['message'] = "Evento excluído com sucesso!";
		$this->loadView('evento/admin', $data);
	}

	public function form_csv()
    {
            $this->loadView('evento/form_csv', array('error' => ' ' ));
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

                    $this->loadView('evento/form_csv', $error);
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
					            $this->loadView('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "DataEvento")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de evento deve ser DataEvento');</script>";
					            $this->loadView('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "Presencas")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de evento deve ser Presencas');</script>";
					            $this->loadView('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[3] !== "Descricao")
                    		{
                    			echo "<script> alert('A quarta coluna do csv de evento deve ser Descricao');</script>";
					            $this->loadView('evento/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    	}
                    	else
                    	{
                    		$local_data = (object) array(    
							    "nome" => $resource[0],
								"dataevento" => $this->toYYYYMMDD($resource[1]),
								"presencas" => $resource[2],
								"descricao" => $resource[3]
							    );
            				$return = $this->evento_model->insertNewEvento($local_data	);
            				if(!$return)
            				{
			            		$this->evento_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->loadView('evento/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->evento_model->commitTransaction();
        		echo "<script> alert('Load do csv de evento feito com sucesso!');</script>";
        		$this->show();
            }
    }

	public function admin(){
		$data['eventos'] = $this->evento_model->selectAllEvento();
		$this->loadView('evento/admin', $data);
	}
}
?>