<?php
	class Person {
		public $personId;
		public $fullname;
		public function __construct($personId, $fullname){
			$this->personId = $personId;
			$this->fullname = $fullname;
		}

		public static function createPersonObject($resultRow){
			return new Person(
				$resultRow->person_id, 
				$resultRow->fullname
			);
		}

		public function setPersonId($personId){
			$this->personId = $personId;
		}
		public function getPersonId(){
			return $this->personId;
		}

		public function setFullname($fullname){
			$this->fullname = $fullname;
		}
		public function getFullname(){
			return $this->fullname;
		}

	}
?>