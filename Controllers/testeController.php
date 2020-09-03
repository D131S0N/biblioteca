<?php
include '../Models/salvar.php';

echo '<pre>';
print_r($_POST);

if (isset($_POST) && !empty($_POST) && isset($_POST['acao']) && !empty($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastro-pessoa':
            $result = salvarDadosPessoa($_POST);
            if ($result) {
                header("Location: ../Views/home.php?next=ok&action=pessoa");
            } else {
                header("Location: ../Views/home.php?next=error");
            }
            break;

        case 'cadastro-livro':
            $result = salvarDadosLivro($_POST);
            if ($result) {
                header("Location: ../Views/listaLivros.php?next=ok&action=livro");
            } else {
                header("Location: ../Views/listaLivros.php?next=error");
            }
            break;
        default:
            header("Location: ../Views/page404.php");
            break;
    }
} else {
    header("Location: ../Views/page404.php");
}
