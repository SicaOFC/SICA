<?php
session_start();

include_once "clsLogin.php";

print_r($_POST);
$Cad = new login();
$rm = filter_input(INPUT_POST, "rm");
$nome = filter_input(INPUT_POST, "nome");
$classe = filter_input(INPUT_POST, "classe");
$email = filter_input(INPUT_POST, "email");
$email2 = filter_input(INPUT_POST, "email2");
$email = $email.$email2;
$sexo = filter_input(INPUT_POST, "sexo");
$nascimento = filter_input(INPUT_POST, "nascimento");
$senha = filter_input(INPUT_POST, "senha");

$Cad->setRm($rm);
$Cad->setNome($nome);
$Cad->setClasse($classe);
$Cad->setEmail($email);
$Cad->setSexo($sexo);
$Cad->setNascimento($nascimento);
$Cad->setSenha($senha);

if (isset($_POST["submit"]) && $_POST["submit"] = "cadastrar") {
    $mensagem = $Cad->cadastrar();
    echo $mensagem;
}