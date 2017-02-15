<?php

include_once "model.php";

class Instituicao extends Model {

    function cadastrar($dataIn) {
        if ($this->valida($dataIn)) {
            $dataOut = array(
                $dataIn["razao_social"],
                $dataIn["nome_fantasia"],
                $dataIn["ano_de_fundacao"],
                $dataIn["website"],
                $dataIn["vinculo"],
                $dataIn["qtd_membros"],
                $dataIn["email_instituicao"],                                
                $dataIn["relacoes_publicas"],
                $dataIn["email_relacoes_publicas"],
                $dataIn["rua"],
                $dataIn["complemento"],
                $dataIn["bairro"],
                $dataIn["cidade"],
                $dataIn["uf"],
                $dataIn["cep"],
                $dataIn["telefone_fixo"],
                $dataIn["celular"]);
            return $this->execSQL("insertInstituicao", $dataOut);
        } else {
            return null;
        }
    }

 function valida($data) {

        $errors = array();

        $errors = $this->validaRazaoSocial($data["razao_social"], $errors);
        $errors = $this->validaNomeFantasia($data["nome_fantasia"], $errors);
        $errors = $this->validaAnoDeFundacao($data["ano_de_fundacao"], $errors);
        $errors = $this->validaWebsite($data["website"], $errors);
        $errors = $this->validaVinculo($data["vinculo"], $errors);
        $errors = $this->validaQtdMembros($data["qtd_membros"], $errors);
        $errors = $this->validaEmailInstituicao($data["email_instituicao"], $errors);
        $errors = $this->validaRelacoesPublicas($data["relacoes_publicas"], $errors);
        $errors = $this->validaEmailRelacoesPublicas($data["email_relacoes_publicas"], $errors);
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

    function validaRazaoSocial($data, $errors){
        if(empty($data)){
            $errors["razao_social"] = "Razão Social não pode ser vazia!";
        }
        return $errors;
    }

    function validaNomeFantasia($data, $errors){
        if (empty($data["nome_fantasia"])) {
            //tratar erro para campo nome vazio.
        } else {
            //variavel OK.
        }
    }

    function validaAnoDeFundacao($data, $errors){
        if (empty($data["ano_de_fundacao"])) {
            //tratar erro para campo ano_de_fundacao vazio.
        } else {
            //Variavel OK.
        }
    }

    function validaWebsite($data, $errors){
        if (empty($data["website"])) {
            //tratar erro para campo dt_nasc vazio.
        } else {
            //variavel OK.
        }
    }

    function validaVinculo($data, $errors){
        if (empty($data["vinculo"])) {
            //tratar erro para campo vinculo vazio.
        } else {
            //variavel OK.
        }
    }

    function validaQtdMembros($data, $errors){
        if (empty($data["qtd_membros"])) {
            //tratar erro para campo qtd_membros vazio.
        } else {
            //variavel OK.
        }
    }

    function validaEmailInstituicao($data, $errors){
        if (empty($data["email_instituicao"])) {
            //tratar erro para campo email_instituicao vazio.
        } else {
            //variavel OK.
        }

    }

    function validaRelacoesPublicas($data, $errors){
        if (empty($data["relacoes_publicas"])) {
            //tratar erro para campo relacoes publicas vazio.
        } else {
            //variavel OK.
        }
    }

    function validaEmailRelacoesPublicas($data, $errors){
        if (empty($data["email_relacoes_publicas"])) {
            //tratar erro para campo email_relacoes_publicas vazio.
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
        return $this->execSQL("todasInstituicoes", null);
    }

}
