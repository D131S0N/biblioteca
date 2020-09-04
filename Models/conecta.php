<?php

function conecta()
{
    try {

        $opcoes = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        // $db = new PDO('mysql:host=127.0.0.1;port=3310;dbname=biblioteca;charset=utf8', 'root', 'des', $opcoes);
        $db = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', '', $opcoes);

        return $db;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }
}
