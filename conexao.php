<?php
$host = 'localhost';
$usuario = 'root';
$senha = ''; // Sem senha
$banco = 'site_tcc'; // Nome do banco de dados
$porta = 3307; // Corrigido: sem "port_" e como número

$conn = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// $conn->set_charset("utf8"); // Opcional: define charset
?>
