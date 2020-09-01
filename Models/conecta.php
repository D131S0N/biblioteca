<?php

function conecta() {
    try {

        $db = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', '');
    
        return $db;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }
}

function getAll($sql)
{
    $db = conecta();
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function setDados(string $tabela, array $dados, string $tipo = 'INSERT', string $where = '')
{
    $db = conecta();

    if (strtoupper($tipo) === 'INSERT') {
        $sql = "INSERT INTO {$tabela} (";
    } elseif (strtoupper($tipo) === 'UPDATE') {
        $sql = "UPDATE {$tabela} SET ";
    }

    $campos = array_keys($dados);

    $totalCampos = count($campos) - 1;
    foreach ($campos as $key => $campo) {
        $sql .= $campo;
        if ($totalCampos != $key) {
            $sql .= ', ';
        } elseif ($totalCampos == $key) {
            $sql .= ')';
        }
    }

    $sql .= ' VALUES(';
    foreach ($campos as $key => $campo) {
        $sql .= ":{$campo}";
        if ($totalCampos != $key) {
            $sql .= ', ';
        } elseif ($totalCampos == $key) {
            $sql .= ')';
        }
    }

    $stmt = $db->prepare($sql);

    foreach ($dados as $campo => $valor) {
        $stmt->bindParam(":{$campo}", $valor);
    }

    if (!$stmt->execute()) {
        return false;
    }

    return true;
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