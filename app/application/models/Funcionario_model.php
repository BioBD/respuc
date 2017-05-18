<?php
require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/funcionario.php';
class Funcionario_model extends RN_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    public function insertNewFuncionario($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $funcionario = Funcionario::createObjectFuncionario($dataIn);
        if(isset($funcionario))
        {
			return $this->execute($this->db, $funcionario->getSqlToInsert(), 
				$funcionario->getDataToSave());
   		}
        return false;
    }
    public function updateFuncionario($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $funcionario = Funcionario::createObjectFuncionario($info);
        $resultArray = $funcionario->getDataToSave();
        $resultArray[] = $info->old_cpf;
        if(isset($funcionario)){
            $this->execute($this->db, $funcionario->getSqlToUpdate(), $resultArray);
        }
        return false;
    }
    public function deleteFuncionario($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Funcionario::getSqlToDelete(), $nome);
        }
        return false;
    }
    public function selectOneFuncionario($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, 
        	Funcionario::getSqlToSelect(), $dataIn);
        if ($result)
            return Funcionario::createObjectFuncionario ($result, true);
        return null;  
    }
    public function selectAllFuncionario()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, 
        	Funcionario::getSqlToSelectAll());
        $return_array = array();
        foreach($result as $row)
            $return_array[] = Funcionario::createObjectFuncionario($row, true);
        return $return_array;
    }    
}
?>