<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/evento.php';

class Evento_model extends RN_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function insertNewEvento($dataIn) 
    {
        $this->Logger->info("Running: " . __METHOD__);
        $evento = Evento::createObjectEvento($dataIn);
        if(isset($evento))
        {
            return $this->execute($this->db, $evento->getSqlToInsert(), 
                $evento->getDataToSave());
        }
        return false;
    }

    public function updateEvento($info)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $evento = Evento::createObjectEvento($info);
        $resultArray = $evento->getDataToSave();
        $resultArray[] = $info->old_nome;
        if(isset($evento)){
            $this->execute($this->db, $evento->getSqlToUpdate(), $resultArray);
        }
        return false;
    }

    public function deleteEvento($nome)
    {
        $this->Logger->info("Running: " . __METHOD__);
        if(isset($nome))
        {
            return $this->execute($this->db, Evento::getSqlToDelete(), $nome);
        }
        return false;
    }

    public function selectOneEvento($dataIn)
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, Evento::getSqlToSelect(), $dataIn);

        if ($result)
            return Evento::createObjectEvento ($result, true);

        return null;  
    }

    public function selectAllEvento()
    {
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, Evento::getSqlToSelectAll());

        $return_array = array();

        foreach($result as $row)
            $return_array[] = Evento::createObjectEvento($row, true);

        return $return_array;
    }    
}

?>