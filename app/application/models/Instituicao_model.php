<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/instituicao.php';

class Instituicao_model extends RN_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertNewInstituicao($dataIn) {
        $this->Logger->info("Running: " . __METHOD__);
        $instituicao = Instituicao::createObjectInstituicao($dataIn);
        if(isset($instituicao)){
			$this->execute($this->db, $instituicao->getSqlToInsert(), $instituicao->getDataToSave());
   		}
        return false;
    }
    public function updateInstituicao($info){
        $this->Logger->info("Running: " . __METHOD__);
        $instituicao = Instituicao::createObjectInstituicao($info);
        if(isset($instituicao)){
            $this->execute($this->db, $instituicao->getSqlToUpdate(), $instituicao->getDataToSave());
        }
        return false;
    }
    
    public function deleteInstituicao($info){
        $this->Logger->info("Running: " . __METHOD__);
        $instituicao = Instituicao::createObjectInstituicao($info);
        if(isset($instituicao)){
            $this->execute($this->db, $instituicao->getSqlToDelete(), $instituicao->getName());
        }
        return false;
    }

    public function selectOneInstituicao($dataIn){
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRow($this->db, Instituicao::getSqlToSelect(), $dataIn);
        if ($result)
            return Instituicao::createObjectInstituicao($result);
        return null;
        
    }

    public function selectAllInstituicao(){
        $this->Logger->info("Running: " . __METHOD__);
        $result = $this->executeRows($this->db, Instituicao::getSqlToSelectAll());
        $return_array = array();
        foreach($result as $row)
            $return_array[] = Instituicao::createObjectInstituicao(json_decode(json_encode($row), true));
        return $return_array;
    }    
}
?>