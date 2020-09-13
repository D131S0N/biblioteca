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
?>

<div class="container margin-top-50">
    <div class="row">
      <div class="card col-md-4">
        <img class="card-img-top" src="img/biblioteca.jpg" width="340" height="230" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title">Cadastrar Livros</h5>
          <p class="card-text">Veja os atendimentos que estão abertos no sistema.</p>
          <a href="cadastroLivro.php" class="btn btn-outline-dark">Visitar</a>
        </div>
      </div>
      <div class="card col-md-4">
        <img class="card-img-top" src="img/alugar.jpg" width="340" height="230" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title">Alugar livro</h5>
          <p class="card-text">Veja as peças disponíveis no sistema, seja com ou sem estoque.</p>
          <a href="cadastroAlugaLivro.php" class="btn btn-outline-dark">Visitar</a>
        </div>
      </div>
      <div class="card col-md-4">
        <img class="card-img-top" src="img/pessoa.jpg" width="340" height="230" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title">Cadastrar pessoa</h5>
          <p class="card-text">Veja os carros que estão cadastrados no sitema.</p>
          <a href="cadastroPessoa.php" class="btn btn-outline-dark">Visitar</a>
        </div>
      </div>
    </div>

    <section id="estatisticas" class="wrapper">
        <h2 class="title-center">Estatísticas da bilioteca</h2>
        <p class="p-center">
            Confira as estatísticas da nossa bilioteca!
        </p>
        <div style="margin-bottom: 50px;">
            <div class="stats-box">
                <p class="stats-text">Livros Cadastrados</p>
                <span class="stats-qtd">25789</span>
            </div>
            <div class="stats-box">
                <p class="stats-text">Pessoas cadastradas</p>
                <span class="stats-qtd">579</span>
            </div>
            <div class="stats-box">
                <p class="stats-text">Livros alugados</p>
                <span class="stats-qtd">8567</span>
            </div>
            <div class="stats-box">
                <p class="stats-text">Livros em aberto</p>
                <span class="stats-qtd">369</span>
            </div>
        </div>
        </section>
  </div>

<?php
include 'footer.php';
?>