<?php

    function toYYYYMMDD($date) {
        if ($date !== "" && $date !== FALSE && $date !== NULL) {
            $date = explode("/", $date);
            return $date[2] . "-" . $date[1] . "-" . $date[0];
        }
    }

    function toDDMMYYYY($date) {
        if ($date !== "" && $date !== FALSE && $date !== NULL) {
            $date = explode("-", $date);
            return $date[2] . "/" . $date[1] . "/" . $date[0];
        }
    }

?>