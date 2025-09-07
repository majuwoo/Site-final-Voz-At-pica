<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$page_title = "Painel do Usuário";
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?> | Voz Atípica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #7e4ec2;
            color: white;
        }
        .navbar {
            background-color: #3A1075;
        }
        .logo {
            height: 130px;
            margin-right: 10px;
        }
        .container {
            margin-top: 50px;
        }
        .box {
            background-color: #3A1075;
            padding: 30px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="Logo do site" class="logo"> Voz Atípica
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link <?php if ($current_page == 'index.php') echo 'active'; ?>" href="index.php">Início</a></li>
                <li class="nav-item"><a class="nav-link <?php if ($current_page == 'forum.php') echo 'active'; ?>" href="forum.php">Fórum</a></li>
                <li class="nav-item"><a class="nav-link <?php if ($current_page == 'painel.php') echo 'active'; ?>" href="painel.php">Painel</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="box text-center">
        <h2>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
        <p>Você está logado com sucesso.</p>
        <a href="forum.php" class="btn btn-light mt-3">Ir para o Fórum</a>
    </div>
</div>

<?php include 'footer.php'; ?>
