<?php

class Model {

    private static $conn;
    private static $sql;
    private static $config;

    private function getConn() {
        try {
            if (!isset($this->conn)) {
                $this->conn = new PDO($this->getConfig()["stringConexao"]);
            }
            return $this->conn;
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
        return null;
    }

    private function getSQL() {
        try {
            if (!isset($this->sql)) {
                $this->sql = parse_ini_file("config/sql.properties");
            }
            return $this->sql;
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
        return null;
    }

    private function getConfig() {
        try {
            if (!isset($this->config)) {
                $this->config = parse_ini_file("config/configuration.properties");
            }
            return $this->config;
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
        return null;
    }

    function execSQL($nameSql, $data) {
        $conn = $this->getConn();
        if ($data == null) {
            return $conn->query($this->getSQL()[$nameSql]);
        } else {
            $sth = $conn->prepare($this->getSQL()[$nameSql]);
            $sth->execute($data);
            return  $sth->fetchAll();
        }
    }

}
