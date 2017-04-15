<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/aprendiz.php';

class Aprendiz_model extends RN_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewAprendiz($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $aprendiz = Aprendiz::createObjectAprendiz($dataIn);
        if(isset($aprendiz))
        {
			$this->execute($this->db, $aprendiz->getSqlToInsert(), 
				$aprendiz->getDataToSave());
   		}
        return false;
    }

    public function updateAprendiz($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $aprendiz = Aprendiz::createObjectAprendiz($info);
        $resultArray = $aprendiz->getDataToSave();
        $resultArray[] = $info->old_nome;
        if(isset($aprendiz)){
            $this->execute($this->db, $aprendiz->getSqlToUpdate(), $resultArray);
        }
        return false;
    }

    public function deleteAprendiz($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Aprendiz::getSqlToDelete(), $nome);
        }
        return false;
    }

    public function selectOneAprendiz($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, 
        	Aprendiz::getSqlToSelect(), $dataIn);

        if ($result)
            return Aprendiz::createObjectAprendiz ($result, true);

        return null;  
    }

    public function selectAllAprendiz()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, 
        	Aprendiz::getSqlToSelectAll());

        $return_array = array();

        foreach($result as $row)
            $return_array[] = Aprendiz::createObjectAprendiz($row, true);

        return $return_array;
    }    
}

?>























