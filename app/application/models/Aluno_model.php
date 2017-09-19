<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/aluno.php';

class Aluno_model extends RN_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewAluno($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $aluno = Aluno::createObjectAluno($dataIn);
        if(isset($aluno))
        {
			return $this->execute($this->db, $aluno->getSqlToInsert(), 
				$aluno->getDataToSave());
   		}
        return false;
    }

    public function updateAluno($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $aluno = Aluno::createObjectAluno($info);
        if(isset($aluno))
        {
            $resultArray = $aluno->getDataToSave();
            $resultArray[] = $info->old_cpf;
            return $this->execute($this->db, $aluno->getSqlToUpdate(), $resultArray);
        }
        return false;
    }

    public function deleteAluno($cpf)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($cpf))
        {
            return $this->execute($this->db, Aluno::getSqlToDelete(), $cpf);
        }
        return false;
    }

    public function selectOneAluno($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, 
        	Aluno::getSqlToSelect(), $dataIn);

        if ($result)
            return Aluno::createObjectAluno ($result, true);

        return null;  
    }

    public function selectAllAlunos()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, 
        	Aluno::getSqlToSelectAll());

        $return_array = array();

        foreach($result as $row)
            $return_array[] = Aluno::createObjectAluno($row, true);

        return $return_array;
    }    
}

?>























