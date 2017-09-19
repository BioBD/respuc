<?php
require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/voluntario.php';
class Voluntario_model extends RN_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    public function insertNewVoluntario($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $voluntario = Voluntario::createObjectVoluntario($dataIn);
        if(isset($voluntario))
        {
			return $this->execute($this->db, $voluntario->getSqlToInsert(), 
				$voluntario->getDataToSave());
   		}
        return false;
    }
    public function updateVoluntario($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $voluntario = Voluntario::createObjectVoluntario($info);
        if(isset($voluntario)){
                $resultArray = $voluntario->getDataToSave();
                $resultArray[] = $info->old_cpf;
                return $this->execute($this->db, $voluntario->getSqlToUpdate(), $resultArray);
        }
        return false;
    }
    public function deleteVoluntario($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Voluntario::getSqlToDelete(), $nome);
        }
        return false;
    }
    public function selectOneVoluntario($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, 
        	Voluntario::getSqlToSelect(), $dataIn);
        if ($result)
            return Voluntario::createObjectVoluntario ($result, true);
        return null;  
    }
    public function selectAllVoluntario()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, 
        	Voluntario::getSqlToSelectAll());
        $return_array = array();
        foreach($result as $row)
            $return_array[] = Voluntario::createObjectVoluntario($row, true);
        return $return_array;
    }    
}
?>