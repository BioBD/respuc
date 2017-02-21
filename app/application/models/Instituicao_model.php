<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/instituicao.php';

class Instituicao_model extends RN_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertNewInstituicao($dataIn) {
        $this->Logger->info("Running: " . __METHOD__);

        $sql = 'INSERT INTO instituicao (nome, telefone) VALUES (?,?)';
        $returnId = $this->execute($this->db, $sql, array($dataIn['nome'], $dataIn['telefone']));
        if ($returnId)
            return $returnId;

        return false;
    }
}
?>