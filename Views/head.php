<html>

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Referência externa aos arquivos do bootstrap -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="
    anonymous">

    <link href="css/estilo.css" rel="stylesheet" />
    <link rel="icon" href="img/favicon.jpg" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <a class="navbar-brand" href="home.php">
                    <img src="img/biblioteca.jpg" width="40" height="40" class="d-inline-block align-top img-thumbnail">
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Página Inicial</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="cadastroPessoa.php">Pessoa</a>
                            <a class="dropdown-item" href="cadastroLivro.php">Livro</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaLivros.php">Lista de livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroAlugaLivro.php">Alugar Livro</a>
                    </li>

                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Olá, Renato</a>
                    </li> -->
                </ul>
                <form class="form-inline my-4 my-lg-0" action="search.php" method="post">
                    <select class="form-control" name="campo">
                        <option value="livro">Livro</option>
                        <option value="autor">Autor</option>
                        <option value="isbn">ISBN</option>
                    </select>
                    <input class="form-control mr-sm-4" name="busca" type="search" placeholder="Pesquisar Livro" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>