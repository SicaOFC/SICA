<?php
$bco = "sica";
$usuario = "lucas";
$senha = "Batata007";
try {
    $conexao = new PDO("mysql:host=localhost;dbname=$bco", "$usuario", "$senha");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("SET NAMES utf8mb4");
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}