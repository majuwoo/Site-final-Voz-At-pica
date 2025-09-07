<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($page_title)) $page_title = "Voz Atípica";
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: white;
            position: relative;
            min-height: 100vh;
        }

        /* Fundo animado */
        .animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, #7e4ec2, #3A1075, #7e4ec2);
            background-size: 600% 600%;
            animation: gradientMove 20s ease infinite;
            z-index: -1;
        }

        @keyframes gradientMove {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* Navbar personalizada */
        .navbar {
            background-color: #3A1075;
            box-shadow: 0 4px 12px rgba(58, 16, 117, 0.4);
            padding: 0.75rem 1.5rem;
            z-index: 10;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #a77ef0;
            text-decoration: none;
        }

        .nav-link:hover {
            color: white;
            transform: scale(1.05);
        }

        .nav-link.active {
            color: #fff;
            font-weight: 700;
            border-bottom: 2px solid #a77ef0;
        }

        .navbar-toggler {
            border-color: #a77ef0;
        }

        .navbar-toggler-icon {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(93deg) brightness(107%) contrast(102%);
        }

        @media (max-width: 768px) {
            .navbar-nav {
                background-color: #3A1075;
                border-radius: 0 0 10px 10px;
                padding: 1rem;
            }
        }

        .nav-link {
            margin: 0.5rem 0;
        }

        .logo {
            max-height: 80px; /* Mantém o tamanho semelhante ao do perfil.php */
            margin-right: 10px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<!-- Fundo animado -->
<div class="animated-background"></div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="Logo do site" class="logo"> Voz Atípica
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'index.php') echo 'active'; ?>" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'diagnostico_tardio.php') echo 'active'; ?>" href="diagnostico_tardio.php">Diagnóstico Tardio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'autismo_mulheres.php') echo 'active'; ?>" href="autismo_mulheres.php">Autismo em Mulheres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'orientacoes_crises.php') echo 'active'; ?>" href="orientacoes_crises.php">Orientações em Crises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'sinais_autismo.php') echo 'active'; ?>" href="sinais_autismo.php">Sinais de Autismo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == (isset($_SESSION['usuario_id']) ? 'forum.php' : 'comunidade.php')) echo 'active'; ?>" 
                       href="<?php echo isset($_SESSION['usuario_id']) ? 'forum.php' : 'comunidade.php'; ?>">
                        Comunidade
                    </a>
                </li>
            </ul>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle"></i> Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
