<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class AlunoController extends RN_Controller {

    public function __construct() {
    	//Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('aluno_model');

        $this->aluno_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
	}

	public function insert($data = array()){
		$data["action"] = "save"; 
		$this->loadView('aluno/modifyShow',$data);
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["cpf"]))
			$cpf = $dataIn["cpf"];
		else
			$cpf = "";
		$data["action"] = "update"; 
		$data['aluno'] = $this->aluno_model->selectOneAluno($cpf);
		$this->loadView('aluno/modifyShow',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);

		$return = $this->aluno_model->insertNewAluno($dataIn);
		if($return)
			$data['message'] = "Aluno cadastrado com sucesso!";
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
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);
		$return = $this->aluno_model->updateAluno($dataIn);
		if($return)
			$data['message'] = "Aluno atualizado com sucesso!";
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
		$data['aluno'] = $this->aluno_model->selectOneAluno($dataIn);
		$this->loadView('aluno/modifyShow', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["cpf"]))
			$cpf = $dataIn["cpf"];
		else
			$cpf = '';
		$return = $this->aluno_model->deleteAluno($cpf);
		$data['message'] = "Aluno excluído com sucesso!";
		$this->admin($data);
	}

	public function form_csv()
    {
            $this->loadView('aluno/form_csv', array('error' => ' ' ));
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

                    $this->loadView('aluno/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
            		$this->aluno_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                    	if($firstRow)
                    	{
                    		$firstRow = false;; 
                    		if($resource[0] !== "Nome")
                    		{
                    			echo "<script> alert('A primeira coluna do csv de aluno deve ser Nome!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "CPF")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de aluno deve ser CPF');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "RG")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de aluno deve ser RG');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[3] !== "Data de Nascimento")
                    		{
                    			echo "<script> alert('A quarta coluna do csv de aluno deve ser Data de Nascimento');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[4] !== "Naturalidade")
                    		{
                    			echo "<script> alert('A quinta coluna do csv de aluno deve ser Naturalidade!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[5] !== "Email")
                    		{
                    			echo "<script> alert('A sexta coluna do csv de aluno deve ser Email!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[6] !== "Telefone")
                    		{
                    			echo "<script> alert('A setima coluna do csv de aluno deve ser Telefone!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[7] !== "Celular")
                    		{
                    			echo "<script> alert('A oitava coluna do csv de aluno deve ser Celular!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[8] !== "Rua")
                    		{
                    			echo "<script> alert('A nona coluna do csv de aluno deve ser Rua!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[9] !== "Numero")
                    		{
                    			echo "<script> alert('A decima coluna do csv de aluno deve ser Numero!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[10] !== "Complemento")
                    		{
                    			echo "<script> alert('A decima primeira coluna do csv de aluno deve ser Complemento!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[11] !== "Bairro")
                    		{
                    			echo "<script> alert('A decima segunda coluna do csv de aluno deve ser Bairro!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[12] !== "Cidade")
                    		{
                    			echo "<script> alert('A decima terceira coluna do csv de aluno deve ser Cidade!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[13] !== "UF")
                    		{
                    			echo "<script> alert('A decima quarta coluna do csv de aluno deve ser UF!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[14] !== "CEP")
                    		{
                    			echo "<script> alert('A decima quinta coluna do csv de aluno deve ser CEP!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[15] !== "Nome do Responsavel")
                    		{
                    			echo "<script> alert('A decima sexta coluna do csv de aluno deve ser Nome do Responsavel!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[16] !== "Telefone do Responsavel")
                    		{
                    			echo "<script> alert('A decima setima primeira coluna do csv de aluno deve ser Telefone do Responsavel!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[17] !== "Profissao do Responsavel")
                    		{
                    			echo "<script> alert('A decima oitava coluna do csv de aluno deve ser Profissao do Responsavel!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[18] !== "CPF do Responsavel")
                    		{
                    			echo "<script> alert('A decima nona coluna do csv de aluno deve ser CPF do Responsavel!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
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
								"cep" => $resource[14],
								"nome_responsavel"=> $resource[15],
								"telefone_responsavel" => $resource[16],
								"profissao_responsavel" => $resource[17],
								"cpf_responsavel"=> $resource[18]
							    );
            				$return = $this->aluno_model->insertNewAluno($local_data);
            				if(!$return)
            				{
			            		$this->aluno_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->loadView('aluno/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->aluno_model->commitTransaction();
        		echo "<script> alert('Load do csv de aluno feito com sucesso!');</script>";
        		$this->show();
            }
    }

	public function admin($data=array()){
		$data['alunos'] = $this->aluno_model->selectAllAlunos();
		$this->loadView('aluno/admin', $data);
	}
}
?>