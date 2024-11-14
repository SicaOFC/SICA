<?php
session_start();

include_once "clsLogin.php";

print_r($_POST);
$Cad = new login();
$nome = filter_input(INPUT_POST, "username");
$senha = filter_input(INPUT_POST, "password");

$Cad->setNome($nome);
$Cad->setSenha($senha);

if (isset($_POST["login"])) {
    $mensagem = $Cad->logar();
    echo $mensagem;
}