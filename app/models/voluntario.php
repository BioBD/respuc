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

        $errors = array();

        $errors = $this->validaMatricula($data["matricula"], $errors);
        $errors = $this->validaNome($data["nome"], $errors);
        $errors = $this->validaCPF($data["cpf"], $errors);
        $errors = $this->validaDataNascimento($data["data_nascimento"], $errors);
        $errors = $this->validaGenero($data["genero"], $errors);
        $errors = $this->validaPeriodo($data["periodo"], $errors);
        $errors = $this->validaIdioma($data["idioma"], $errors);
        $errors = $this->validaEmail($data["email"], $errors);
        $errors = $this->validaNomeCurso($data["nome_curso"], $errors);
        $errors = $this->validaRua($data["rua"], $errors);
        $errors = $this->validaComplemento($data["complemento"], $errors);
        $errors = $this->validaBairro($data["bairro"], $errors);
        $errors = $this->validaCidade($data["cidade"], $errors);
        $errors = $this->validaUF($data["uf"], $errors);
        $errors = $this->validaCEP($data["cep"], $errors);
        $errors = $this->validaTelefoneFixo($data["telefone_fixo"], $errors);
        $errors = $this->validaCelular($data["celular"], $errors);

        if($errors == null){
            return true;
        }

        return false;
    }

    function validaMatricula($data, $errors){
        if(empty($data)){
            $errors["matricula"] = "Matrícula não pode ser vazia!";
        }
        return $errors;
    }

    function validaNome($data, $errors){
        if (empty($data["nome"])) {
            //tratar erro para campo nome vazio.
        } else {
            //variavel OK.
        }
    }

    function validaCPF($data, $errors){
        if (empty($data["cpf"])) {
            //tratar erro para campo cpf vazio.
        } else {
            //Variavel OK.
        }
    }

    function validaDataNascimento($data, $errors){
        if (empty($data["data_nascimento"])) {
            //tratar erro para campo dt_nasc vazio.
        } else {
            //variavel OK.
        }
    }

    function validaGenero($data, $errors){
        if (empty($data["genero"])) {
            //tratar erro para campo genero vazio.
        } else {
            //variavel OK.
        }
    }

    function validaPeriodo($data, $errors){
        if (empty($data["periodo"])) {
            //tratar erro para campo periodo vazio.
        } else {
            //variavel OK.
        }
    }

    function validaIdioma($data, $errors){
        if (empty($data["idioma"])) {
            //tratar erro para campo idioma vazio.
        } else {
            //variavel OK.
        }

    }

    function validaEmail($data, $errors){
        if (empty($data["email"])) {
            //tratar erro para campo email vazio.
        } else {
            //variavel OK.
        }
    }

    function validaNomeCurso($data, $errors){
        if (empty($data["nome_curso"])) {
            //tratar erro para campo nome_curso vazio.
        } else {
            //variavel OK.
        }
    }

    function validaRua($data, $errors){
        if (empty($data["rua"])) {
            //tratar erro para campo rua vazio.
        } else {
            //variavel OK.
        }
    }

    function validaComplemento($data, $errors){
        if (empty($data["complemento"])) {
            //tratar erro para campo complemento vazio.
        } else {
            //variavel OK.
        }
    }

    function validaBairro($data, $errors){
       if (empty($data["bairro"])) {
            //tratar erro para campo bairro vazio.
        } else {
            //variavel OK.
        }
    }

    function validaCidade($data, $errors){
        if (empty($data["cidade"])) {
            //tratar erro para campo cidade vazio.
        } else {
            //variavel OK.
        }
    }

    function validaUF($data, $errors){
        if (empty($data["uf"])) {
            //tratar erro para campo uf vazio.
        } else {
            //variavel OK.
        }
    }

    function validaCEP($data, $errors){
        if (empty($data["cep"])) {
            //tratar erro para campo cep vazio.
        } else {
            //variavel OK.
        }
    }

    function validaTelefoneFixo($data, $errors){
        if (empty($data["telefone_fixo"])) {
            //tratar erro para campo telefone_fixo vazio.
        } else {
            //variavel OK.
        }
    }

    function validaCelular($data, $errors){
        if (empty($data["celular"])) {

        } else {
            //variavel OK.
        }
    }

    function listar() {
        return $this->execSQL("todosVoluntarios", null);
    }

}
