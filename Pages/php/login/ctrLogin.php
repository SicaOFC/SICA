<?php
session_start();

include_once "clsLogin.php";

print_r($_POST);
$Cad = new login();
$rm = filter_input(INPUT_POST, "rm");
$senha = filter_input(INPUT_POST, "senha");

$Cad->setRm($rm);
$Cad->setSenha($senha);

if (isset($_POST["submit"]) && $_POST["submit"] = "login") {
    $mensagem = $Cad->logar();
    echo $mensagem;
}