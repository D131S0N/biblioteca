<?php
include '../Models/getDados.php';

session_start();
$email = $_POST["email"];
$senha = sha1($_POST["password"]);

$select = "SELECT * FROM funcionario WHERE email = '{$email}' AND senha = '{$senha}'";
$result = getAll($select);

if (!empty($result) && !empty($result[0]) && !empty($result[0]['nome'])) {
    $_SESSION['user_name'] = $result[0]['nome'];
    header("Location: ../Views/home.php");
} else {
    header("Location: ../Views/login.php?next=error");
}