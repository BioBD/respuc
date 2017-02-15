<?php

require_once APPPATH . 'core/RN_Model.php';
require_once APPPATH . 'core/person.php';

class Person_model extends RN_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertNewPerson($fullname) {
        $this->Logger->info("Running: " . __METHOD__);

        $sql = 'INSERT INTO person (fullname) VALUES (?)';
        $returnId = $this->executeReturningId($this->db, $sql, array($fullname));
        if ($returnId)
            return $returnId;

        return false;
    }

    public function getPerson($personId) {
        $this->Logger->info("Running: " . __METHOD__);
        $sql = "SELECT * FROM person WHERE person_id = ?";
        $result = $this->executeRow($this->db, $sql, array(intval($personId)));

        if ($result)
            return Person::createPersonObject($result);

        return null;
    }

    public function getPersons() {
        $this->Logger->info("Running: " . __METHOD__);
        $sql = "SELECT * FROM person";
        $result = $this->executeRows($this->db, $sql);
        $return_array = array();
        foreach($result as $row)
            $return_array[] = Person::createPersonObject($row);
        return $return_array;
    }

}

?>