<?php
include '../Controllers/getData.php';
include 'head.php';

if (!empty($_POST) && !empty($_POST['busca']) && !empty($_POST['campo'])) {
    switch ($_POST['campo']) {
        case 'livro':
            $campo = 'titulo';
            break;

        case 'autor':
            $campo = 'autor';
            break;

        case 'isbn':
            $campo = 'isbn';
            break;

        default:
            $campo = 'titulo';
            break;
    }
    $busca = addslashes($_POST['busca']);
    $sqlBusca = "SELECT * FROM livros WHERE {$campo} LIKE '%{$busca}%'";

    $livros = busca($sqlBusca);

}

?>
<div class="container margin-top-50">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Resultado da busca!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="container margin-top-50">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Editora</th>
                <th scope="col">Idioma</th>
                <th scope="col">Autor</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($livros) && is_array($livros)) {
                foreach ($livros as $livro) { ?>

                    <tr>
                        <th scope="row"><?php echo $livro['id'] ?></th>
                        <td><?php echo $livro['titulo'] ?></td>
                        <td><?php echo $livro['editora'] ?></td>
                        <td><?php echo $livro['idioma'] ?></td>
                        <td><?php echo $livro['autor'] ?></td>
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
