<?php

class Model {

    private static $conn;

    private function getConn() {
        try {
            if (!isset($this->conn)) {
                $this->conn = new PDO("pgsql:host=localhost;port=5432;dbname=respuc;user=postgres;password=postgres");
            }
            return $this->conn;
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
        return null;
    }

    function execSQL($nameSql) {
        $conn = $this->getConn();
        $sql = 'SELECT * FROM voluntarios';
        return $conn->query($sql);
    }

}
