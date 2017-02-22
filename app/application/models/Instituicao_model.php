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
}
?>