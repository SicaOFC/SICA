<?php
$bco = "sica";
$usuario = "root";
$senha = "usbw";
try {
    $conexao = new PDO("mysql:host=localhost;port=3307;dbname=$bco", "$usuario", "$senha");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("SET NAMES utf8mb4");
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}