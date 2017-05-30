<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class VoluntarioController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('voluntario_model');

        $this->voluntario_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
	}

	public function insert(){
		$this->loadView('voluntario/insert');
	}

	public function search(){
		$this->loadView('voluntario/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["cpf"]))
			$cpf = $dataIn["cpf"];
		else
			$cpf = "";
		$data['voluntario'] = $this->voluntario_model->selectOneVoluntario($cpf);
		$this->loadView('voluntario/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);

		$return = $this->voluntario_model->insertNewVoluntario($dataIn);
		$data['message'] = "Voluntario cadastrado com sucesso!";
		$this->admin($data);
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);
		$return = $this->voluntario_model->updateVoluntario($dataIn);
		$data['message'] = "Voluntario atualizado com sucesso!";
		$this->admin($data);
	}

	public function show(){
		$data['voluntarios'] = $this->voluntario_model->selectAllVoluntario();
		$this->loadView('voluntario/show_voluntarios', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['voluntario'] = $this->voluntario_model->selectOneVoluntario($dataIn);
		$this->loadView('voluntario/show_voluntario', $data);
	}

	public function get(){
		$dataIn = $this->input->get();
		$data['voluntario'] = $this->voluntario_model->selectOneVoluntario($dataIn);
		$this->loadView('voluntario/show_voluntario', $data);
	}


	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["cpf"]))
			$cpf = $dataIn["cpf"];
		else
			$cpf = '';
		$return = $this->voluntario_model->deleteVoluntario($cpf);
		$data['message'] = "Voluntario excluído com sucesso!";
		$this->admin($data);
	}

	public function form_csv()
    {
            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
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

                    $this->loadView('voluntario/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->voluntario_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeira coluna do csv de voluntario deve ser Nome!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "CPF")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de voluntario deve ser CPF');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "RG")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de voluntario deve ser RG');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[3] !== "Data de Nascimento")
                    		{
                    			echo "<script> alert('A quarta coluna do csv de voluntario deve ser Data de Nascimento');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[4] !== "Naturalidade")
                    		{
                    			echo "<script> alert('A quinta coluna do csv de voluntario deve ser Naturalidade!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[5] !== "Email")
                    		{
                    			echo "<script> alert('A sexta coluna do csv de voluntario deve ser Email!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[6] !== "Telefone")
                    		{
                    			echo "<script> alert('A setima coluna do csv de voluntario deve ser Telefone!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[7] !== "Celular")
                    		{
                    			echo "<script> alert('A oitava coluna do csv de voluntario deve ser Celular!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[8] !== "Rua")
                    		{
                    			echo "<script> alert('A nona coluna do csv de voluntario deve ser Rua!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[9] !== "Numero")
                    		{
                    			echo "<script> alert('A decima coluna do csv de voluntario deve ser Numero!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[10] !== "Complemento")
                    		{
                    			echo "<script> alert('A decima primeira coluna do csv de voluntario deve ser Complemento!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[11] !== "Bairro")
                    		{
                    			echo "<script> alert('A decima segunda coluna do csv de voluntario deve ser Bairro!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[12] !== "Cidade")
                    		{
                    			echo "<script> alert('A decima terceira coluna do csv de voluntario deve ser Cidade!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[13] !== "UF")
                    		{
                    			echo "<script> alert('A decima quarta coluna do csv de voluntario deve ser UF!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[14] !== "CEP")
                    		{
                    			echo "<script> alert('A decima quinta coluna do csv de voluntario deve ser CEP!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    	}
                    	else
                    	{
                    		$local_data = (object) array(    
							    "nome" => $resource[0],
								"cpf" => $resource[1],
								"rg" => $resource[2],
								"data_nascimento" => $this->toYYYYMMDD($resource[3]),
								"naturalidade" => $resource[4],
								"email" => $resource[5],
								"telefone" => $resource[6],
								"celular" => $resource[7],
								"rua" => $resource[8],
								"numero" => $resource[9],
								"complemento" => $resource[10],
								"bairro" => $resource[11],
								"cidade" => $resource[12],
								"uf" => $resource[13],
								"cep" => $resource[14]
							    );
            				$return = $this->voluntario_model->insertNewVoluntario($local_data	);
            				if(!$return)
            				{
			            		$this->voluntario_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->loadView('voluntario/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->voluntario_model->commitTransaction();
        		$data["message"] = 'Load do csv de voluntario feito com sucesso!';
        		$this->admin($data);
            }
    }

	public function admin($data=array()){
		$data['voluntarios'] = $this->voluntario_model->selectAllVoluntario();
		$this->loadView('voluntario/admin', $data);
	}
}
?>