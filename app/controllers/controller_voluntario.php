<?php

include_once "models/voluntario.php";
include_once "controller.php";

class ControllerVoluntario extends Controller {

    function listar() {
        $voluntario = new Voluntario();
        $_SESSION["ControllerVoluntario"]["voluntarios"] = $voluntario->listar();
        include "views/voluntarios.php";
    }

    function cadastrar() {
        $voluntario = new Voluntario();
        if(!isset($_POST) || empty($_POST)){
            /****** Erro: $_POST = vazia ********/
        } else{
            if ($voluntario->cadastrar($_POST) == null) {
                include "views/erro.php";
            } else {
                $this->listar();
            }
        } 
    }

    function alterar() {
        $voluntario = new Voluntario();
       if(!isset($_POST) || empty($_POST)){
            /****** Erro: $_POST = vazia ********/
        } else{
            if ($voluntario->alterar($_POST) == null) {
                include "views/erro.php";
            } else {
                $this->listar();
            }
        }
    }

    function excluir() {

    }

    function consultar(){
        $voluntario = new Voluntario();
        if(!isset($_POST) || empty($_POST)){
            /***** Erro: $_POST = vazia *******/
        } else{
            if($voluntario->consultar($_POST) == null){
                include "views/erro.php";
            } else{
                 $_SESSION["ControllerVoluntario"]["voluntarios"] = $voluntario->consultar();
                 include "views/voluntarios.php";
            }
        }
    }
}

if (isset($_GET['cmd'])) {
    $objController = new ControllerVoluntario();
    $objController->{$_GET['cmd']}();
} else {
    print_r($_GET);
}
?>