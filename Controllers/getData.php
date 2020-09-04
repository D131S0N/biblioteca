<?php
include '../Models/getDados.php';

function buscaLivros($sql)
{
    return getAll($sql);
}

function busca($sql)
{
    return getAll($sql);
}

function buscaLivroById($sql)
{
    $dados = getAll($sql);
    if (!empty($dados) && is_array($dados) && !empty($dados[0])) {
        $dados = $dados[0];
    }

    return $dados;
}