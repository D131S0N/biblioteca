<?php

function conecta()
{
    try {

        //opções para exibir erros caso ocorram
        $opcoes = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        //conexão com porta
        // $db = new PDO('mysql:host=127.0.0.1;port=3310;dbname=biblioteca;charset=utf8', 'root', 'des', $opcoes);

        //concexão sem porta
        $db = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', '', $opcoes);

        return $db;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }
}
