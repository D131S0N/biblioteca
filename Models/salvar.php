<?php
include_once 'conecta.php';

function salvarDadosPessoa($dados)
{
    $db = conecta();

    if (isset($dados['acao'])) {
        unset($dados['acao']);
    }
print_r($dados);
    $nome = !empty($dados['nome']) ? $dados['nome'] : '';
    $email = !empty($dados['email']) ? $dados['email'] : '';
    $documento = !empty($dados['documento']) ? $dados['documento'] : '';
    $idade = !empty($dados['idade']) ? $dados['idade'] : 0;
    $senha = !empty($dados['senha']) ? sha1($dados['senha']) : '';
    $cidade = !empty($dados['cidade']) ? $dados['cidade'] : '';
    $dataCadastro = date('Y-m-d H:i:s');

    $inserir = $db->prepare("INSERT INTO pessoa(nome, email, documento, idade, senha, cidade, data_cadastro) VALUES (:nome, :email, :documento, :idade, :senha, :cidade, :data_cadastro)");

    $inserir->bindValue(':nome', $nome);
    $inserir->bindValue(':email', $email);
    $inserir->bindValue(':documento', $documento);
    $inserir->bindValue(':idade', $idade, PDO::PARAM_INT);
    $inserir->bindValue(':senha', $senha);
    $inserir->bindValue(':cidade', $cidade);
    $inserir->bindValue(':data_cadastro', $dataCadastro);

    try {
        if ($inserir->execute() === false) {
            print_r($inserir->errorInfo());
        }
        return true;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }
}

function salvarDadosLivro($dados)
{
    $db = conecta();

    if (isset($dados['acao'])) {
        unset($dados['acao']);
    }
// print_r($dados);die;

    $titulo = !empty($dados['titulo']) ? $dados['titulo'] : '';
    $isbn = !empty($dados['isbn']) ? $dados['isbn'] : '';
    $editora = !empty($dados['editora']) ? $dados['editora'] : '';
    $encadernacao = !empty($dados['encadernacao']) ? $dados['encadernacao'] : '';
    $paginas = !empty($dados['paginas']) ? $dados['paginas'] : 0;
    $idioma = !empty($dados['idioma']) ? $dados['idioma'] : '';
    // $lancamento = !empty($dados['lancamento']) ? $dados['lancamento'] : '';
    $edicao = !empty($dados['edicao']) ? $dados['edicao'] : '';
    $descricao = !empty($dados['descricao']) ? $dados['descricao'] : '';
    $autor = !empty($dados['autor']) ? $dados['autor'] : '';
    $ativo = (!empty($dados['ativo']) && $dados['ativo'] == 'on') ? 1 : 0;
    $dataCadastro = date('Y-m-d H:i:s');

    $inserir = $db->prepare("INSERT INTO livro(titulo, isbn13, editora, tipo_encadercacao, idioma, descricao, edicao, autor, paginas, ativo, data_cadastro) VALUES (:titulo, :isbn13, :editora, :tipo_encadercacao, :idioma, :descricao, :edicao, :autor, :paginas, :ativo, :data_cadastro)");

    $inserir->bindValue(':titulo', $titulo);
    $inserir->bindValue(':isbn13', $isbn);
    $inserir->bindValue(':editora', $editora);
    $inserir->bindValue(':tipo_encadercacao', $encadernacao);
    $inserir->bindValue(':idioma', $idioma);
    $inserir->bindValue(':descricao', $descricao);
    $inserir->bindValue(':edicao', $edicao);
    $inserir->bindValue(':autor', $autor);
    $inserir->bindValue(':paginas', $paginas, PDO::PARAM_INT);
    // $inserir->bindValue(':lancamento', $lancamento);
    $inserir->bindValue(':ativo', $ativo, PDO::PARAM_INT);
    $inserir->bindValue(':data_cadastro', $dataCadastro);

    try {
        if ($inserir->execute() === false) {
            print_r($inserir->errorInfo());
        }
        return true;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }
}