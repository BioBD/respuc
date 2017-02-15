<?php
include_once "models/instituicao.php";
include_once "controller.php";

class ControllerInstituicao extends Controller {

    function listar() {
        $instituicao = new Instituicao();
        $_SESSION["ControllerInstituicao"]["instituicoes"] = $instituicao->listar();
        include "views/instituicoes.php";
    }

    function cadastrar() {
        $instituicao = new Instituicao();
        if ($instituicao->cadastrar($_POST) == null) {
            include "views/erro.php";
        } else {
            $this->listar();
        }
    }

    function alterar() {

    }

    function excluir() {

    }

    function consultar() {

    }

}

if (isset($_GET['cmd'])) {
    $objController = new ControllerInstituicao();
    $objController->{$_GET['cmd']}();
} else {
    print_r($_GET);
}
?>