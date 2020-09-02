<?php
include_once 'conecta.php';

function salvarDadosPessoa($dados) {
    $db = conecta();

    $nome = !empty($dados['nome']) ? $dados['nome'] : '';
    $email = !empty($dados['email']) ? $dados['email'] : '';
    $documento = !empty($dados['documento']) ? $dados['documento'] : '';
    $idade = !empty($dados['idade']) ? $dados['idade'] : '';
    $senha = !empty($dados['senha']) ? sha1($dados['senha']) : '';
    $cidade = !empty($dados['cidade']) ? $dados['cidade'] : '';
    $dataCadastro = date('Y-m-d H:i:s');

    $inserir = $db->prepare("INSERT INTO pessoa(nome, email, documento, idade, senha, cidade, data_cadastro) VALUES (:nome, :email, :documento, :idade, :senha, :cidade, :data_cadastro)");

    $inserir->bindParam(':nome', $nome);
    $inserir->bindParam(':email', $email);
    $inserir->bindParam(':documento', $documento);
    $inserir->bindParam(':idade', $idade);
    $inserir->bindParam(':cidade', $cidade);
    $inserir->bindParam(':dataCadastro', $dataCadastro);
    $inserir->bindParam(':senha', $senha);

    if ($inserir->execute()) {
        return true;
    } else {
        return false;
    }
}