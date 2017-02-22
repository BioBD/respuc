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
			$this->execute($this->db, $escola->getSqlInsert(), $escola->getDataToSave());
   		}

        return false;
    }
}

?>
