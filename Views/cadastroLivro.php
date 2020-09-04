<?php
include '../Controllers/getData.php';
include 'head.php';
?>

<div class="container margin-top-50">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">Cadastro de livro</div>

        <div class="card-body">
            <form action="../Controllers/checkPost.php" method="post" class="cadastro-livro">
                <?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = addslashes($_GET['id']);
                    $livro = buscaLivroById("SELECT *  FROM livros WHERE id = {$id}");
                    // echo '<pre>';
                    // print_r($livro);
                ?>
                    <input type="hidden" class="form-control" id="id_livro" name="id_livro" value="<?php echo $_GET['id']; ?>">
                <?php
                }
                ?>
                <div class="form-group row">
                    <label for="titulo" class="col-md-2 col-form-label text-md-center">Título</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="titulo" required autofocus value="<?php !empty($livro['titulo']) ? print($livro['titulo']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-md-2 col-form-label text-md-center">ISBN13</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="isbn" value="<?php !empty($livro['isbn13']) ? print($livro['isbn13']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editora" class="col-md-2 col-form-label text-md-center">Editora</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="editora" id="editora" placeholder="Editora que lançou o livro (marca)" value="<?php !empty($livro['editora']) ? print($livro['editora']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="encadernacao" class="col-md-2 col-form-label text-md-center">Encadernação</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="encadernacao" id="encadernacao" placeholder="Capa dura, capa brochura...." value="<?php !empty($livro['tipo_encadercacao']) ? print($livro['tipo_encadercacao']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="paginas" class="col-md-2 col-form-label text-md-center">Páginas</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="paginas" id="paginas" placeholder="Número de páginas do livro" value="<?php !empty($livro['paginas']) ? print($livro['paginas']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idioma" class="col-md-2 col-form-label text-md-center">Idioma</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="idioma" id="idioma" placeholder="Idioma do livro" value="<?php !empty($livro['idioma']) ? print($livro['idioma']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lancamento" class="col-md-2 col-form-label text-md-center">Data lançamento</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="lancamento" id="lancamento" placeholder="Exemplo: 10/10/2019" value="<?php !empty($livro['data_lancamento']) ? print($livro['data_lancamento']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edicao" class="col-md-2 col-form-label text-md-center">Edição</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="edicao" id="edicao" placeholder="Exemplo: 1" value="<?php !empty($livro['edicao']) ? print($livro['edicao']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descricao" class="col-md-2 col-form-label text-md-center">Descrição</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do livro" value="<?php !empty($livro['descricao']) ? print($livro['descricao']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="autor" class="col-md-2 col-form-label text-md-center">Autor</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor do livro" value="<?php !empty($livro['autor']) ? print($livro['autor']) : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 text-md-center">Ativo</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="ativo" checked="<?php !empty($livro['ativo']) && $livro['ativo'] == 1 ? print('checked') : ''?>">
                            <label class="form-check-label" for="ativo">
                                O livro está ativo?
                            </label>
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="acao" name="acao" value="cadastro-livro">

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary direita">Cadastrar livro</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>