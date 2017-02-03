<?php

include_once "models/voluntario.php";
include_once "controller.php";

class ControllerVoluntario extends Controller {

    function listar() {//Exibe todos os voluntários.
        $voluntario = new Voluntario();
        $_SESSION["ControllerVoluntario"]["voluntarios"] = $voluntario->listar();
        include "views/voluntarios.php";
    }

    function editar(){ //Exibe somente um voluntário especifico
        $voluntario = new Voluntario();
        $_SESSION["ControllerVoluntario"]["voluntarios"] = $voluntario->consultar($_GET['valor']);
        include "views/editar_voluntario.php";
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
            /******* Erro : $_POST = vazia *********/
        } else {
            if($voluntario->alterar($_POST) == null){
                include "views/erro.php";
            } else{
                $this->listar();
            }
        }
    }

    function excluir() {
        $voluntario = new Voluntario();
        if(!isset($_GET['valor']) || empty($_GET['valor'])) {
            /***** Erro: $_GET[valor] = vazia *******/
        } else {
            $valor = $_GET['valor'];
            if($voluntario->excluir($valor) == null){
                include "views/erro.php";
            } else {
                $this->listar();
            }
        }
    }

    function consultar(){
        $voluntario = new Voluntario();
        if(!isset($_POST) || empty($_POST)){
            /***** Erro: $_POST = vazia *******/
        } else{
            if($voluntario->consultar($_POST['matricula']) == null){
                include "views/erro.php";
            } else{
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