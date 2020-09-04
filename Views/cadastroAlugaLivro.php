<?php
include 'head.php';
?>

<div class="container margin-top-50">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">Cadastro de aluguel de livro</div>

        <div class="card-body">
            <form method="POST" action="../Controllers/checkPost.php">
                <div class="form-group row">
                    <label for="nome" class="col-md-2 col-form-label text-md-center">Nome</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome de quem está alugando" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="livro" class="col-md-2 col-form-label text-md-center">Livro</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="livro" id="livro" placeholder="Livro que está sendo alugado" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="retirada" class="col-md-2 col-form-label text-md-center">Data retirada</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="retirada" id="retirada" placeholder="Exemplo: 10/10/2019">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="entrega" class="col-md-2 col-form-label text-md-center">Data entrega</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="entrega" id="entrega" placeholder="Exemplo: 10/10/2019">
                    </div>
                </div>
               
                <!-- <div class="form-group row">
                    <label for="pessoa" class="col-md-2 col-form-label text-md-center">Pessoa</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" name="pessoa" id="pessoa" placeholder="Quem está alugando o livro?" required>
                    <select class="form-control js-example-basic-single" name="state">
                        <option value="AL">Alabama</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="AL">Alabam</option>
                        <option value="WY">Wyoming</option>
                    </select>
                    </div>
                </div> -->

                <div class="form-group row">
                    <div class="col-sm-2 text-md-center">Em aberto</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="emAberto" id="emAberto">
                            <label class="form-check-label" for="emAberto">
                                O livro ainda está alugado?
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="acao" name="acao" value="aluga-livro">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary direita">Alugar livro</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>