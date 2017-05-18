<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'core/RN_Controller.php';
class FuncionarioController extends RN_Controller {
    public function __construct() {
        //Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();
        $this->load->model('funcionario_model');
        $this->funcionario_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
    }
    public function insert(){
        $this->loadView('funcionario/insert');
    }
    public function search(){
        $this->loadView('funcionario/search');
    }
    public function edit(){
        $dataIn = $this->input->get();
        if(isset($dataIn["nome"]))
            $nome = $dataIn["nome"];
        else
            $nome = "";
        $data['funcionario'] = $this->funcionario_model->selectOneFuncionario($nome);
        $this->loadView('funcionario/edit',$data);
    }
    public function save(){
        $dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);
        $return = $this->funcionario_model->insertNewFuncionario($dataIn);
        $this->loadView('funcionario/cadastrosucesso');
        $data['message'] = "Funcionário cadastrado com sucesso!";
		$this->loadView('funcionario/admin', $data);
    }
    public function update(){
        $dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $dataIn->data_nascimento = $this->toYYYYMMDD($dataIn->data_nascimento);
        $return = $this->funcionario_model->updateFuncionario($dataIn);
        $data['message'] = "Funcionário atualizado com sucesso!";
		$this->loadView('funcionario/admin');
    }
    public function show(){
        $data['funcionarios'] = $this->funcionario_model->selectAllFuncionario();
        $this->loadView('funcionario/show_funcionarios', $data);
    }
    public function find(){
        $dataIn = $this->input->post();
        $data['funcionario'] = $this->funcionario_model->selectOneFuncionario($dataIn);
        $this->loadView('funcionario/show_funcionario', $data);
    }
    public function delete(){
        $dataIn = $this->input->get();
        if(isset($dataIn["nome"]))
            $nome = $dataIn["nome"];
        else
            $nome = '';
        $return = $this->funcionario_model->deleteFuncionario($nome);
        $data['message'] = "Funcionário excluído com sucesso!";
		$this->loadView('funcionario/admin', $data);
    }
    public function form_csv()
    {
            $this->load->view('funcionario/form_csv', array('error' => ' ' ));
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
                    $this->load->view('funcionario/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
                    $this->funcionario_model->startTransaction();
                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                        if($firstRow)
                        {
                            $firstRow = false;; 
                            if($resource[0] !== "Nome")
                            {
                                echo "<script> alert('A primeira coluna do csv de funcionario deve ser Nome!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[1] !== "CPF")
                            {
                                echo "<script> alert('A segunda coluna do csv de funcionario deve ser CPF');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[2] !== "RG")
                            {
                                echo "<script> alert('A terceira coluna do csv de funcionario deve ser RG');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[3] !== "Data de Nascimento")
                            {
                                echo "<script> alert('A quarta coluna do csv de funcionario deve ser Data de Nascimento');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[4] !== "Naturalidade")
                            {
                                echo "<script> alert('A quinta coluna do csv de funcionario deve ser Naturalidade!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[5] !== "Email")
                            {
                                echo "<script> alert('A sexta coluna do csv de funcionario deve ser Email!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[6] !== "Telefone")
                            {
                                echo "<script> alert('A setima coluna do csv de funcionario deve ser Telefone!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[7] !== "Celular")
                            {
                                echo "<script> alert('A oitava coluna do csv de funcionario deve ser Celular!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[8] !== "Funcao")
                            {
                                echo "<script> alert('A nona coluna do csv de funcionario deve ser Funcao!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
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
                                "funcao" => $resource[8]
                                );
                            $return = $this->funcionario_model->insertNewFuncionario($local_data  );
                            if(!$return)
                            {
                                $this->funcionario_model->rollbackTransaction();
                                echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
                                $this->load->view('funcionario/form_csv', array('error' => ' ' ));
                                return;
                            }
                        }
                    }
                $this->funcionario_model->commitTransaction();
                echo "<script> alert('Load do csv de funcionario feito com sucesso!');</script>";
                $this->show();
            }
    }

    public function admin(){
		$data['funcionarios'] = $this->funcionario_model->selectAllFuncionario();
		$this->loadView('funcionario/admin', $data);
	}
}
?>
