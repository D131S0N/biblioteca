<?php
include 'head.php';
?>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<div class="container margin-top-50">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">Cadastro de aluguel de livro</div>

        <div class="card-body">
            <form method="POST" action="#">
                <div class="form-group row">
                    <label for="nome" class="col-md-2 col-form-label text-md-center">Nome</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nome" placeholder="Nome de quem está alugando" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="livro" class="col-md-2 col-form-label text-md-center">Livro</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="livro" placeholder="Livro que está sendo alugado" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lancamento" class="col-md-2 col-form-label text-md-center">Data retirada</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="lancamento" placeholder="Exemplo: 10/10/2019">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lancamento" class="col-md-2 col-form-label text-md-center">Data entrega</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="lancamento" placeholder="Exemplo: 10/10/2019">
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="pessoa" class="col-md-2 col-form-label text-md-center">Pessoa</label>
                    <div class="col-md-10">
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
                </div>

                <div class="form-group row">
                    <div class="col-sm-2 text-md-center">Em aberto</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emAberto">
                            <label class="form-check-label" for="emAberto">
                                O livro ainda está alugado?
                            </label>
                        </div>
                    </div>
                </div>
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