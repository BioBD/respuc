<?php
include_once "models/instituicao.php";
include_once "controller.php";

class ControllerInstituicao extends Controller {

    function listar() {
        $instituicao = new Instituicao();
        $_SESSION["ControllerInstituicao"]["Instituicoes"] = $instituicao->listar();
        include "views/voluntarios.php";
    }

    function cadastrar() {
        $instituicao = new Instituicao();
        if ($instituicao->cadastrar($_POST) == null) {
            include "views/erro.php";
        } else {
            $this->listar();
        }
    }

}

if (isset($_GET['cmd'])) {
    $objController = new ControllerInstituicao();
    $objController->{$_GET['cmd']}();
} else {
    print_r($_GET);
}


?>