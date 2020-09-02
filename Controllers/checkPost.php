<?php
include_once '../Models/salvar.php';

var_dump(file_get_contents('php://input'));
debugar($_POST, false);
debugar($_REQUEST, false);
debugar($_SERVER);

function debugar($data, $exit = true, $vd = false) {
    echo '<pre>';
    if ($vd) {
        var_dump($data);
    } else {
        print_r($data);
    }

    if ($exit) {
        exit();
    }
}
//vai receber os post