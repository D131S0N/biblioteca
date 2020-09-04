<?php
    include 'head.php';
?>
<!-- <script src="js/cadastroPessoa.js"></script> -->

<div class="container margin-top-50">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">Cadastro de pessoa</div>

        <div class="card-body">
            <form action="../Controllers/checkLogin.php" method="post" class="cadastro-pessoa">
                <div class="form-group row">
                    <label for="nome" class="col-md-2 col-form-label text-md-center">Nome</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-center">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senha" class="col-md-2 col-form-label text-md-center">Senha</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="documento" class="col-md-2 col-form-label text-md-center">Documento</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="documento" name="documento" placeholder="CPF, CNPJ...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idade" class="col-md-2 col-form-label text-md-center">Idade</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="idade" name="idade" placeholder="Idade">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cidade" class="col-md-2 col-form-label text-md-center">Cidade</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                </div>

                <input type="hidden" class="form-control" id="acao" name="acao" value="cadastro-pessoa">

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary direita">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>