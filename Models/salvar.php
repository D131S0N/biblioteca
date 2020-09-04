<?php
include_once 'conecta.php';

function salvarDadosPessoa($dados)
{
    $db = conecta();

    if (isset($dados['acao'])) {
        unset($dados['acao']);
    }

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
    // echo '<pre>';
    // print_r($dados);die;
    if (isset($dados['acao'])) {
        unset($dados['acao']);
    }

    $titulo = !empty($dados['titulo']) ? $dados['titulo'] : '';
    $isbn = !empty($dados['isbn']) ? $dados['isbn'] : '';
    $editora = !empty($dados['editora']) ? $dados['editora'] : '';
    $encadernacao = !empty($dados['encadernacao']) ? $dados['encadernacao'] : '';
    $paginas = !empty($dados['paginas']) ? $dados['paginas'] : 0;
    $idioma = !empty($dados['idioma']) ? $dados['idioma'] : '';
    $lancamento = !empty($dados['lancamento']) ? date('Y-m-d', strtotime($dados['lancamento'])) : '';
    $edicao = !empty($dados['edicao']) ? $dados['edicao'] : '';
    $descricao = !empty($dados['descricao']) ? $dados['descricao'] : '';
    $autor = !empty($dados['autor']) ? $dados['autor'] : '';
    $ativo = (!empty($dados['ativo']) && $dados['ativo'] == 'on') ? 1 : 0;
    $dataCadastro = date('Y-m-d H:i:s');

    if (isset($dados['id_livro']) && !empty($dados['id_livro'])) {
        $id = $dados['id_livro'];
        $inserir = $db->prepare("UPDATE livros SET titulo=?, isbn13=?, editora=?, tipo_encadernacao=?, idioma=?, descricao=?, edicao=?, autor=?, paginas=?, ativo=?, data_lancamento=?, data_cadastro=? WHERE id=?");
        $inserir->bindParam(13, $id, PDO::PARAM_INT);
    } else {
        $inserir = $db->prepare("INSERT INTO livros(titulo, isbn13, editora, tipo_encadernacao, idioma, descricao, edicao, autor, paginas, ativo, data_lancamento, data_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    }

    $inserir->bindValue(1, $titulo);
    $inserir->bindValue(2, $isbn);
    $inserir->bindValue(3, $editora);
    $inserir->bindValue(4, $encadernacao);
    $inserir->bindValue(5, $idioma);
    $inserir->bindValue(6, $descricao);
    $inserir->bindValue(7, $edicao);
    $inserir->bindValue(8, $autor);
    $inserir->bindValue(9, $paginas, PDO::PARAM_INT);
    $inserir->bindValue(10, $ativo, PDO::PARAM_INT);
    $inserir->bindValue(11, $lancamento);
    $inserir->bindValue(12, $dataCadastro);

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

function salvarAlugaLivro($dados)
{
    $db = conecta();

    if (isset($dados['acao'])) {
        unset($dados['acao']);
    }
    // print_r($dados);die;
    $nome = !empty($dados['nome']) ? $dados['nome'] : '';
    $email = !empty($dados['email']) ? $dados['email'] : '';
    $retirada = !empty($dados['retirada']) ? $dados['retirada'] : '';
    $entrega = !empty($dados['entrega']) ? $dados['entrega'] : '';
    $emAberto = (!empty($dados['emAberto']) && $dados['ativo'] == 'on') ? 1 : 0;

    $inserir = $db->prepare("INSERT INTO livros_alugados(id_livro, id_pessoa, id_funcionario, data_retirada, data_devolucao, em_aberto) VALUES (:id_livro, :id_pessoa, :id_funcionario, :data_retirada, :data_devolucao, :em_aberto)");

    $inserir->bindValue(':id_livro', 1, PDO::PARAM_INT);
    $inserir->bindValue(':id_pessoa', 1, PDO::PARAM_INT);
    $inserir->bindValue(':id_funcionario', 1, PDO::PARAM_INT);
    $inserir->bindValue(':data_retirada', $retirada);
    $inserir->bindValue(':data_devolucao', $entrega);
    $inserir->bindValue(':em_aberto', $emAberto, PDO::PARAM_INT);

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
