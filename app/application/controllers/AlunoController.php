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

	public function insert(){
		$this->loadView('aluno/insert');
	}

	public function search(){
		$this->loadView('aluno/search');
	}

	public function edit(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = "";
		$data['aluno'] = $this->aluno_model->selectOneAluno($nome);
		$this->loadView('aluno/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento)

		$return = $this->aluno_model->insertNewAluno($dataIn);
		$this->loadView('aluno/cadastrosucesso');
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento)
		$return = $this->aluno_model->updateAluno($dataIn);
		$this->loadView('aluno/cadastrosucesso');
	}

	public function show(){
		$data['alunos'] = $this->aluno_model->selectAllAluno();
		$this->loadView('aluno/show_alunos', $data);
	}

	public function find(){
		$dataIn = $this->input->post();
		$data['aluno'] = $this->aluno_model->selectOneAluno($dataIn);
		$this->loadView('aluno/show_aluno', $data);
	}

	public function delete(){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		else
			$nome = '';
		$return = $this->aluno_model->deleteAluno($nome);
		$this->loadView('aluno/excluidosucesso');
	}

	public function form_csv()
    {
            $this->load->view('aluno/form_csv', array('error' => ' ' ));
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

                    $this->load->view('aluno/form_csv', $error);
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
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[1] !== "CPF")
                    		{
                    			echo "<script> alert('A segunda coluna do csv de aluno deve ser CPF');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[2] !== "RG")
                    		{
                    			echo "<script> alert('A terceira coluna do csv de aluno deve ser RG');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[3] !== "Data de Nascimento")
                    		{
                    			echo "<script> alert('A quarta coluna do csv de aluno deve ser Data de Nascimento');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[4] !== "Naturalidade")
                    		{
                    			echo "<script> alert('A quinta coluna do csv de aluno deve ser Naturalidade!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[5] !== "Email")
                    		{
                    			echo "<script> alert('A sexta coluna do csv de aluno deve ser Email!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[6] !== "Telefone")
                    		{
                    			echo "<script> alert('A setima coluna do csv de aluno deve ser Telefone!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[7] !== "Celular")
                    		{
                    			echo "<script> alert('A oitava coluna do csv de aluno deve ser Celular!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[8] !== "Rua")
                    		{
                    			echo "<script> alert('A nona coluna do csv de aluno deve ser Rua!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[9] !== "Numero")
                    		{
                    			echo "<script> alert('A decima coluna do csv de aluno deve ser Numero!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[10] !== "Complemento")
                    		{
                    			echo "<script> alert('A decima primeira coluna do csv de aluno deve ser Complemento!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[11] !== "Bairro")
                    		{
                    			echo "<script> alert('A decima segunda coluna do csv de aluno deve ser Bairro!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[12] !== "Cidade")
                    		{
                    			echo "<script> alert('A decima terceira coluna do csv de aluno deve ser Cidade!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[13] !== "UF")
                    		{
                    			echo "<script> alert('A decima quarta coluna do csv de aluno deve ser UF!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[14] !== "CEP")
                    		{
                    			echo "<script> alert('A decima quinta coluna do csv de aluno deve ser CEP!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[15] !== "Cursos")
                    		{
                    			echo "<script> alert('A decima sexta coluna do csv de aluno deve ser Cursos!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[16] !== "Nome do Responsavel")
                    		{
                    			echo "<script> alert('A decima setima coluna do csv de aluno deve ser Nome do Responsavel!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[17] !== "Telefone do Responsavel")
                    		{
                    			echo "<script> alert('A decima oitava primeira coluna do csv de aluno deve ser Telefone do Responsavel!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[18] !== "Profissao do Responsavel")
                    		{
                    			echo "<script> alert('A decima nona coluna do csv de aluno deve ser Profissao do Responsavel!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;
                    		}
                    		if($resource[19] !== "CPF do Responsavel")
                    		{
                    			echo "<script> alert('A vigesima coluna do csv de aluno deve ser CPF do Responsavel!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
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
								"cursos" => $resource[15],
								"nome_responsavel"=> $resource[16],
								"telefone_responsavel" => $resource[17],
								"profissao_responsavel" => $resource[18],
								"cpf_responsavel"=> $resource[19]
							    );
            				$return = $this->aluno_model->insertNewAluno($local_data	);
            				if(!$return)
            				{
			            		$this->aluno_model->rollbackTransaction();
                    			echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
					            $this->load->view('aluno/form_csv', array('error' => ' ' ));
			                    return;

            				}
                    	}
                    }
            	$this->aluno_model->commitTransaction();
        		echo "<script> alert('Load do csv de aluno feito com sucesso!');</script>";
        		$this->show();
            }
    }
}
?>