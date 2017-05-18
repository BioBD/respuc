<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/RN_Controller.php';


class CursoController extends RN_Controller {

    public function __construct() {
        //Aqui é necessário inicializar todos os modelos usados nesse controlador
        parent::__construct();

        $this->load->model('curso_model');

        $this->curso_model->setLogger($this->Logger);
        $this->load->helper(array('form', 'url'));
    }

    public function insert(){
        $this->loadView('curso/insert');
    }

    public function search(){
        $this->loadView('curso/search');
    }

    public function edit(){
        $dataIn = $this->input->get();
        if(isset($dataIn["nome"]))
            $nome = $dataIn["nome"];
        else
            $nome = "";
        $data['curso'] = $this->curso_model->selectOneCurso($nome);
        $this->loadView('curso/edit',$data);
    }

    public function save(){
        $dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $return = $this->curso_model->insertNewCurso($dataIn);
        $data['message'] = "Curso cadastrado com sucesso!";
		$this->loadView('curso/admin', $data);
    }

    public function update(){
        $dataIn = $this->input->post();
        $dataIn = (object) $dataIn;
        $return = $this->evento_model->updateEvento($dataIn);
        $data['message'] = "Curso atualizado com sucesso!";
		$this->loadView('curso/admin');
    }

    public function show(){
        $data['cursos'] = $this->curso_model->selectAllCurso();
        $this->loadView('curso/show_cursos', $data);
    }

    public function find(){
        $dataIn = $this->input->post();
        $data['curso'] = $this->curso_model->selectOneCurso($dataIn);
        $this->loadView('curso/show_curso', $data);
    }

    public function delete(){
        $dataIn = $this->input->get();
        if(isset($dataIn["nome"]))
            $nome = $dataIn["nome"];
        else
            $nome = '';
        $return = $this->curso_model->deleteCurso($nome);
        $data['message'] = "Curso excluído com sucesso!";
		$this->loadView('curso/admin', $data);
    }

    public function form_csv()
    {
            $this->loadView('curso/form_csv', array('error' => ' ' ));
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

                    $this->loadView('curso/form_csv', $error);
            }
            else
            {
                    $data = $this->upload->data();
                    $file = fopen($data["full_path"],"r");
                    $firstRow = true;
                    $this->curso_model->startTransaction();

                    while (($resource = fgetcsv($file,0,";")) !== FALSE) 
                    {
                        if($firstRow)
                        {
                            $firstRow = false;; 
                            if($resource[0] !== "Nome")
                            {
                                echo "<script> alert('A primeira coluna do csv de curso deve ser Nome!');</script>";
                                $this->loadView('curso/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[1] !== "Coordenador")
                            {
                                echo "<script> alert('A segunda coluna do csv de curso deve ser Coordenador');</script>";
                                $this->loadView('curso/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[2] !== "Departamento")
                            {
                                echo "<script> alert('A terceira coluna do csv de curso deve ser Departamento');</script>";
                                $this->loadView('curso/form_csv', array('error' => ' ' ));
                                return;
                            }
                            if($resource[3] !== "QuantidadeAlunos")
                            {
                                echo "<script> alert('A quarta coluna do csv de curso deve ser QuantidadeAlunos!');</script>";
                                $this->loadView('curso/form_csv', array('error' => ' ' ));
                                return;
                            }
                        }
                        else
                        {
                            $local_data = (object) array(    
                                "nome" => $resource[0],
                                "coord" => $resource[1],
                                "depto" => $resource[2],
                                "qtd_alunos" => $resource[3]
                                );
                            $return = $this->curso_model->insertNewCurso($local_data  );
                            if(!$return)
                            {
                                $this->curso_model->rollbackTransaction();
                                echo "<script> alert('Ocorreu um problema ao fazer o load do csv, favor verificar o arquivo enviado!');</script>";
                                $this->loadView('curso/form_csv', array('error' => ' ' ));
                                return;

                            }
                        }
                    }
                $this->curso_model->commitTransaction();
                echo "<script> alert('Load do csv de curso feito com sucesso!');</script>";
                $this->show();
            }
    }

    public function admin(){
		$data['cursos'] = $this->curso_model->selectAllCurso();
		$this->loadView('curso/admin', $data);
	}
}
?>