<?php
include_once '../Models/salvar.php';

// var_dump(file_get_contents('php://input'));
debugar($_POST, false);
// debugar($_REQUEST, false);
debugar($_SERVER);
if (isset($_POST) && !empty($_POST) && isset($_POST['acao']) && !empty($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastro-pessoa':
            $result = salvarDadosPessoa($_POST);
            if ($result) {
                header("Location: Views/home.php?next=ok&action=pessoa");
            }
            header("Location: Views/home.php?next=error");
            break;
        default:
            header("Location: ../Views/page404.php");
        break;
    }
} else {
    header("Location: ../Views/page404.php");
}


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