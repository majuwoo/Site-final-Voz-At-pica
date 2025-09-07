<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['post_id'], $_SESSION['usuario_id'])) {
    $post_id = (int) $_POST['post_id'];
    $usuario_id = (int) $_SESSION['usuario_id'];

    // Verifica se o post pertence ao usuário logado
    $stmt = $conn->prepare("SELECT id FROM posts WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $post_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Exclui os comentários relacionados ao post
        $del_comentarios = $conn->prepare("DELETE FROM comentarios WHERE post_id = ?");
        $del_comentarios->bind_param("i", $post_id);
        $del_comentarios->execute();
        $del_comentarios->close();

        // Exclui o post
        $del_post = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $del_post->bind_param("i", $post_id);
        $del_post->execute();
        $del_post->close();
    }

    $stmt->close();
}

header("Location: forum.php");
exit();
