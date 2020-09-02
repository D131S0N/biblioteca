<?php
include 'head.php';
?>

<div class="container margin-top-50">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">Cadastro de livro</div>

        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="titulo" class="col-md-2 col-form-label text-md-center">Título</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="titulo" placeholder="titulo" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-md-2 col-form-label text-md-center">ISBN13,</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="isbn" placeholder="isbn">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="encadernacao" class="col-md-2 col-form-label text-md-center">Encadernação</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="encadernacao" placeholder="Capa dura, capa brochura....">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="paginas" class="col-md-2 col-form-label text-md-center">Páginas</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="paginas" placeholder="Número de páginas do livro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idioma" class="col-md-2 col-form-label text-md-center">Idioma</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="idioma" placeholder="Idioma do livro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lancamento" class="col-md-2 col-form-label text-md-center">Data lançamento</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="lancamento" placeholder="Exemplo: 10/10/2019">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edicao" class="col-md-2 col-form-label text-md-center">Edição</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="edicao" placeholder="Exemplo: 1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descricao" class="col-md-2 col-form-label text-md-center">Descrição</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="descricao" placeholder="Descrição do livro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="autor" class="col-md-2 col-form-label text-md-center">Autor</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="autor" placeholder="Autor do livro">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 text-md-center">Ativo</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ativo">
                            <label class="form-check-label" for="ativo">
                                O livrvos está ativo?
                            </label>
                        </div>
                    </div>
                </div>
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