<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class InstituicaoController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('instituicao_model');

        $this->instituicao_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
	}

	public function insert(){
		$this->loadView('instituicao/insert');
	}

	public function search(){
		$this->loadView('instituicao/search');
	}

    public function home(){
        $this->loadView('instituicao/home');
    }


	public function edit(){
		$dataIn = $this->input->get();
		$nome = $dataIn["nome"];
		$data['instituicao'] = $this->instituicao_model->selectOneInstituicao($nome);
		$this->loadView('instituicao/edit', $data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->instituicao_model->insertNewInstituicao($dataIn);
		$this->loadView('instituicao/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->instituicao_model->updateInstituicao($dataIn);
		$this->loadView('instituicao/cadastrosucesso');
	}

	public function show(){
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

    public function form_csv()
    {
            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
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

                    $this->load->view('instituicao/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->instituicao_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeira coluna do csv de instituicao deve ser Nome!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "Telefone")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de instituicao deve ser Telefone');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "Celular")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de instituicao deve ser Celular');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[3] !== "Email")
                    		{
                    			echo "<script> alert('A quarta coluna do csv de instituicao deve ser Email');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[4] !== "Vinculo")
                    		{
                    			echo "<script> alert('A quinta coluna do csv de instituicao deve ser Vinculo!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[5] !== "Nome do Responsavel")
                    		{
                    			echo "<script> alert('A sexta coluna do csv de instituicao deve ser Nome do Responsavel!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[6] !== "Email do Responsavel")
                    		{
                    			echo "<script> alert('A setima coluna do csv de instituicao deve ser Email do Responsavel!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[7] !== "Telefone do Responsavel")
                    		{
                    			echo "<script> alert('A oitava coluna do csv de instituicao deve ser Telefone do Responsavel!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		
                    		/* LINKS FICAM POR FORA POR ENQUANTO */

                    	}
                    	else
                    	{
                    		$local_data = (object) array(    
								"nome" => $resource[0],
								"telefone" => $resource[1],
								"celular" => $resource[2],
								"email" => $resource[3],
								"vinculo" => $resource[4],
								"nome_responsavel" => $resource[5],
								"email_responsavel" => $resource[6],
								"telefone_responsavel" => $resource[7]
							    );

            				$return = $this->instituicao_model->insertNewInstituicao($local_data	);
            				if(!$return)
            				{
			            		$this->instituicao_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->load->view('instituicao/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->instituicao_model->commitTransaction();
        		echo "<script> alert('Load do csv de instituicao feito com sucesso!');</script>";
        		$this->show();
            }
    }
}
?>