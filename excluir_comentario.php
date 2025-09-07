<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: forum.php");
    exit();
}

if (isset($_POST['comentario_id'])) {
    $comentario_id = (int)$_POST['comentario_id'];

    // Primeiro, verifica se o comentário pertence ao usuário logado
    $verifica = $conn->prepare("SELECT id FROM comentarios WHERE id = ? AND usuario_id = ?");
    $verifica->bind_param("ii", $comentario_id, $_SESSION['usuario_id']);
    $verifica->execute();
    $verifica->store_result();

    if ($verifica->num_rows > 0) {
        // Se pertence, pode deletar
        $delete = $conn->prepare("DELETE FROM comentarios WHERE id = ?");
        $delete->bind_param("i", $comentario_id);
        $delete->execute();
    }
}

header("Location: forum.php");
exit();
?>
