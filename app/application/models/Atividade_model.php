<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/atividade.php';

class Atividade_model extends RN_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewAtividade($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $atividade = Atividade::createObjectAtividade($dataIn);
        if(isset($atividade))
        {
			return $this->execute($this->db, $atividade->getSqlToInsert(), 
				$atividade->getDataToSave());
   		}
        return false;
    }

    public function updateAtividade($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $atividade = Atividade::createObjectAtividade($info);
        $resultArray = $atividade->getDataToSave();
        $resultArray[] = $info->old_nome;
        if(isset($atividade)){
            $this->execute($this->db, $atividade->getSqlToUpdate(), $resultArray);
        }
        return false;
    }

    public function deleteAtividade($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Atividade::getSqlToDelete(), $nome);
        }
        return false;
    }

    public function selectOneAtividade($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, Atividade::getSqlToSelect(), $dataIn);

        if ($result)
            return Atividade::createObjectAtividade ($result, true);

        return null;  
    }

    public function selectAllAtividade()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, Atividade::getSqlToSelectAll());

        $return_array = array();

        foreach($result as $row)
            $return_array[] = Atividade::createObjectAtividade($row, true);

        return $return_array;
    }    
}

?>