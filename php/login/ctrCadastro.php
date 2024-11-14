<?php
session_start();

include_once "clsLogin.php";

$Cad = new login();
$rm = filter_input(INPUT_POST, "rm");
$nome = filter_input(INPUT_POST, "username");
$classe = filter_input(INPUT_POST, "classe");
$email = filter_input(INPUT_POST, "email");
$sexo = filter_input(INPUT_POST, "sexo");
$nascimento = filter_input(INPUT_POST, "nascimento");
$senha = filter_input(INPUT_POST, "password");

$Cad->setRm($nome);
$Cad->setNome($nome);
$Cad->setClasse($classe);
$Cad->setEmail($email);
$Cad->setSexo($sexo);
$Cad->setNascimento($nascimento);
$Cad->setSenha($senha);

if (isset($_POST["cadastrar"])) {
    $mensagem = $Cad->cadastrar();
    echo $mensagem;
}