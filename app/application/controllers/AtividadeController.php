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

	public function edit($nome="",$data=array()){
		$dataIn = $this->input->get();
		if(isset($dataIn["nome"]))
			$nome = $dataIn["nome"];
		$data['atividade'] = $this->atividade_model->selectOneAtividade($nome);
		$data['pessoas'] = $this->atividade_model->selectPersonsActivity($data['atividade']);
		$this->loadView('atividade/edit',$data);
	}

	public function save(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->atividade_model->insertNewAtividade($dataIn);
		$data['message'] = "Atividade cadastrada com sucesso!";
		$this->admin($data);
	}

	public function update(){
		$dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
		$return = $this->atividade_model->updateAtividade($dataIn);
		$data['message'] = "Atividade atualizada com sucesso!";
		$this->admin($data);	
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

	public function get(){
		$dataIn = $this->input->get();
		$data['atividade'] = $this->atividade_model->selectOneAtividade($dataIn);
		$data['pessoas'] = $this->atividade_model->selectPersonsActivity($data['atividade']);
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
		$this->admin($data);
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
        		$data["message"] = 'Load do csv de atividade feito com sucesso!';
        		$this->admin($data);
            }
    }

	public function admin($data = array()){
		$data['atividades'] = $this->atividade_model->selectAllAtividade();
		$candidatos = array();
		foreach ($data['atividades'] as $atividades)
		{
			$candidatos[$atividades->getNome()] = $this->atividade_model->selectCandidates($atividades);
			
		}
		$data["candidatos"] = $candidatos;
		$this->loadView('atividade/admin', $data);
	}

	public function addPerson()
	{
		$dataIn = $this->input->get();
		$splittedPerson = explode("####",$dataIn["person"]);
		$cpf = $splittedPerson[0];
		$tipo = $splittedPerson[1];
		$atividade = $dataIn["atividade"];
		$message = "";
		if($tipo === 'aluno')
		{
			$result = $this->atividade_model->addAlunoAtividade($cpf,$atividade);
			if ($result)
				$message = "Aluno adicionado com sucesso na atividade";
			else
				$message = "Problema ao inserir aluno em atividade";
		}
		else if($tipo === 'aprendiz')
		{
			$result = $this->atividade_model->addAprendizAtividade($cpf,$atividade);
			if ($result)
				$message = "Aprendiz adicionado com sucesso na atividade";
			else
				$message = "Problema ao inserir aprendiz em atividade";

		}
		else
			$message = "Problema ao inserir pessoa em atividade";
		$data["message"] = $message;
		$this->admin($data);
	}

	public function removePerson(){
		$dataIn = $this->input->get();
		$cpf = $dataIn["cpf"];
		$tipo = $dataIn["tipo"];
		$atividade = $dataIn["atividade"];
		if($tipo === 'aluno')
		{
			$result = $this->atividade_model->removeAluno($cpf,$atividade);
			if ($result)
				$message = "Aluno removido com sucesso da atividade";
			else
				$message = "Problema ao remover aluno de atividade";
		}
		else if($tipo === 'aprendiz')
		{
			$result = $this->atividade_model->removeAprendiz($cpf,$atividade);
			if ($result)
				$message = "Aprendiz removido com sucesso da atividade";
			else
				$message = "Problema ao remover aprendiz de atividade";

		}
		else
			$message = "Problema ao remover pessoa de atividade";
		$data["message"] = $message;
		$this->edit($atividade,$data);
	}


}
?>