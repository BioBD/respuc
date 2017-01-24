<?php

include_once "models/voluntario.php";

class ControllerVoluntario {

    function voluntarios() {
        $voluntario = new Voluntario();
        $_SESSION["ControllerVoluntario"]["voluntarios"] = $voluntario->execSQL("todosVoluntarios");
        include "views/voluntarios.php";
    }

}

if (isset($_GET['pg'])) {
    $className = new ControllerVoluntario();
    $className->{$_GET['pg']}();
} else {
    print_r($_GET);
}