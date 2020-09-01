<html lang="pt-br">

<head>
    <title>Bem vindo ao painel da biblioteca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php
    ?>
    <div class="container">
        <form class="col-lg-4 col-lg-offset-4 my_form" action="Controllers/checkLogin.php" method="post">
            <img src="img/tom.jpg" class="center-block" alt="" style="width: 150px; height: 150px;" />
            <h2 class="text-center">Por favor faça o login!</h2>

            <!--<label for="imput_email" class="sr_only"></label>-->
            <input type="text" name="user_name" id="imput_email" class="form-control" placeholder="Type here your name" required autofocus>
            <!--<label for="imput_senha" class="sr_only"></label>
                <input type="password" name="senha" id="imput_senha" class="form-control"  placeholder="Type here you password" required autofocus>-->
            <br>
            <button class="btn btn-lg btn-info btn-block btn-login" type="submit">Logar</button>
            <!-- <a href="#" data-toggle="modal" data-target="#modalCad" id="cad" class="btn btn-lg btn-sucess btn-block btn-login" type="button">Cadastrar</a>-->
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>