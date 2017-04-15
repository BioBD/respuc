<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/escola.php';

class Escola_model extends RN_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewEscola($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $escola = Escola::createObjectEscola($dataIn);
        if(isset($escola))
        {
			$this->execute($this->db, $escola->getSqlToInsert(), $escola->getDataToSave());
   		}

        return false;
    }

    public function updateEscola($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $escola = Escola::createObjectEscola($info);
        $resultArray = $escola->getDataToSave();
        $resultArray[] = $info->old_nome;
        if(isset($escola))
        {
            $this->execute($this->db, $escola->getSqlToUpdate(), $resultArray);
        }
        return false;
    }
    
    public function deleteEscola($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        return $this->execute($this->db, Escola::getSqlToDelete(), $nome);
    }

    public function selectOneEscola($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, Escola::getSqlToSelect(), $dataIn);
        if ($result)
            return Escola::createObjectEscola($result, true);
        return null;  
    }

    public function selectAllEscola()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, Escola::getSqlToSelectAll());
        $return_array = array();
        foreach($result as $row)
            $return_array[] = Escola::createObjectEscola($row, true);
        return $return_array;
    }    
}

?>