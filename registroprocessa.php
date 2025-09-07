<?php
session_start();
require_once 'conexao.php'; // Arquivo com sua conexão ao banco

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar) {
        $_SESSION['erro_registro'] = "As senhas não coincidem!";
        header("Location: registro.php");
        exit();
    }

    // Verifica se o e-mail já está cadastrado
    $verifica = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $verifica->bind_param("s", $email);
    $verifica->execute();
    $verifica->store_result();

    if ($verifica->num_rows > 0) {
        $_SESSION['erro_registro'] = "E-mail já está em uso!";
        header("Location: registro.php");
        exit();
    }

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere no banco
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        // Login automático após cadastro
        $_SESSION['usuario_id'] = $stmt->insert_id;
        $_SESSION['usuario_nome'] = $nome;

        header("Location: forum.php");
        exit();
    } else {
        $_SESSION['erro_registro'] = "Erro ao registrar. Tente novamente.";
        header("Location: registro.php");
        exit();
    }
}
?>
