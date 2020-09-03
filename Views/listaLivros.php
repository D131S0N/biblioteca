<?php
include 'head.php';
include '../Models/conecta.php';

conecta();

$teste = getAll("SELECT * FROM livro;");

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
?>
<div class="container margin-top-50">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Editora</th>
                <th scope="col">Idioma</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($teste) && is_array($teste)) {
                foreach ($teste as $ttt) { ?>

                    <tr>
                        <th scope="row"><?php echo $ttt['id'] ?></th>
                        <td><?php echo $ttt['titulo'] ?></td>
                        <td><?php echo $ttt['editora'] ?></td>
                        <td><?php echo $ttt['idioma'] ?></td>
                    </tr>


            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php';
?>