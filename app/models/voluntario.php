<?php

include_once "model.php";

class Voluntario extends Model {

    function cadastrar($dataIn) {
        if ($this->valida($dataIn)) {
            $dataOut = array($dataIn["matricula"],
                $dataIn["nome"],
                $dataIn["cpf"],
                $dataIn["identidade"],
                $dataIn["orgao_emissor"],
                $dataIn["genero"],
                $dataIn["periodo"],
                $dataIn["data_nascimento"],
                $dataIn["idioma"],
                $dataIn["nome_curso"],
                $dataIn["rua"],
                $dataIn["complemento"],
                $dataIn["bairro"],
                $dataIn["cidade"],
                $dataIn["uf"],
                $dataIn["cep"],
                $dataIn["telefone_fixo"],
                $dataIn["celular"],
                $dataIn["email"]);

            return $this->execSQL("insertVoluntario", $dataOut);
        } else {
            return null;
        }
    }

    function valida($data) {

        if (empty($data["matricula"])) {
            //tratar erro para campo matricula vazio.
        } else if (isset($data["matricula"])) {
            //tratar erro variavel matricula nao eh um numero
        } else {
            //variavel OK
        }
        if (empty($data["nome"])) {
            //tratar erro para campo nome vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["cpf"])) {
            //tratar erro para campo cpf vazio.
        } else if (is_nan($data["cpf"])) {
            //Tratar erro variavel cpf nao eh um numero
        } else {
            //Variavel OK.
        }
        if (empty($data["dt_nasc"])) {
            //tratar erro para campo dt_nasc vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["genero"])) {
            //tratar erro para campo genero vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["periodo"])) {
            //tratar erro para campo periodo vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["idioma"])) {
            //tratar erro para campo idioma vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["email"])) {
            //tratar erro para campo email vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["nome_curso"])) {
            //tratar erro para campo nome_curso vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["rua"])) {
            //tratar erro para campo rua vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["complemento"])) {
            //tratar erro para campo complemento vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["bairro"])) {
            //tratar erro para campo bairro vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["cidade"])) {
            //tratar erro para campo cidade vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["uf"])) {
            //tratar erro para campo uf vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["cep"])) {
            //tratar erro para campo cep vazio.
        } else {
            //variavel OK.
        }
        if (empty($data["telefone_fixo"])) {
            //tratar erro para campo telefone_fixo vazio.
        } else if (is_nan($data["telefone_fixo"])) {
            //tratar erro para campo telefone_fixo nao eh numero.
        } else {
            //variavel OK.
        }
        if (empty($data["celular"])) {

        } else if (is_nan($data["celular"])) {
            //tratar erro para campo celular nao eh numero.
        } else {
            //variavel OK.
        }
        return true;
    }

    function listar() {
        return $this->execSQL("todosVoluntarios", null);
    }

}
