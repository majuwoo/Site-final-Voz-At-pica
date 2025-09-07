<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$bio = $_POST['bio'];
$imagem_perfil = null;

// Verifica se foi enviada uma nova imagem
if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
    $imagem_perfil = $_FILES['imagem_perfil'];
    $extensao = pathinfo($imagem_perfil['name'], PATHINFO_EXTENSION);
    $novo_nome_imagem = uniqid() . '.' . $extensao;
    move_uploaded_file($imagem_perfil['tmp_name'], 'uploads/' . $novo_nome_imagem);
} else {
    $novo_nome_imagem = null;  // Não alterou a imagem
}

// Atualiza os dados no banco
$stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, bio = ?, imagem_perfil = ? WHERE id = ?");
$stmt->bind_param("ssssi", $nome, $email, $bio, $novo_nome_imagem, $usuario_id);
$stmt->execute();
$stmt->close();

header("Location: perfil.php?usuario_id=" . $usuario_id);
exit();
?>
