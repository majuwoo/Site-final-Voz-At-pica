<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bio = trim($_POST['bio']);
    
    // Verifica se a bio não está vazia
    if (!empty($bio)) {
        // Atualiza a bio no banco de dados
        $stmt = $conn->prepare("UPDATE usuarios SET bio = ? WHERE id = ?");
        $stmt->bind_param("si", $bio, $usuario_id);
        $stmt->execute();
        $stmt->close();
        
        // Redireciona de volta para o perfil com a bio atualizada
        header("Location: perfil.php");
        exit();
    } else {
        // Se a bio estiver vazia, não atualiza e exibe uma mensagem
        echo "A bio não pode estar vazia.";
    }
}
?>
