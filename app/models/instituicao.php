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
        return true;
    }

    function listar() {
        return $this->execSQL("todasInstituicoes", null);
    }

}
