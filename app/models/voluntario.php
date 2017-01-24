<?php

include_once "model.php";

class Voluntario extends Model {

    function cadastrar($dataIn) {
        if ($this->valida($dataIn)) {
            $dataOut = array($dataIn["matricula"], $dataIn["nome"]);
            return $this->execSQL("insertVoluntario", $dataOut);
        } else {
            return null;
        }
    }

    function valida($data) {
        return true;
    }

    function listar() {
        return $this->execSQL("todosVoluntarios", null);
    }

}
