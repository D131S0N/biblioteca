<?php
include 'head.php';

if (isset($_GET['next']) && $_GET['next'] == 'ok') {
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Cadastro realizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
} elseif (isset($_GET['next']) && $_GET['next'] == 'error') {
?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Infelizmente ocorreu um erro ao realizar o cadastro!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
}
include 'footer.php';
?>