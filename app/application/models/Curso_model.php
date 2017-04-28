<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/curso.php';

class Curso_model extends RN_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewCurso($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $curso = Curso::createObjectCurso($dataIn);
        if(isset($curso))
        {
			return $this->execute($this->db, $curso->getSqlToInsert(), 
				$curso->getDataToSave());
   		}
        return false;
    }

    public function updateCurso($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $curso = Curso::createObjectCurso($info);
        $resultArray = $curso->getDataToSave();
        $resultArray[] = $info->old_nome;
        if(isset($curso)){
            $this->execute($this->db, $curso->getSqlToUpdate(), $resultArray);
        }
        return false;
    }

    public function deleteCurso($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Curso::getSqlToDelete(), $nome);
        }
        return false;
    }

    public function selectOneCurso($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, Curso::getSqlToSelect(), $dataIn);

        if ($result)
            return Curso::createObjectCurso ($result, true);

        return null;  
    }

    public function selectAllCurso()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, Curso::getSqlToSelectAll());

        $return_array = array();

        foreach($result as $row)
            $return_array[] = Curso::createObjectCurso($row, true);

        return $return_array;
    }    
}

?>