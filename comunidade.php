<?php
session_start();

// Redireciona automaticamente para o fórum se o usuário estiver logado
if (isset($_SESSION['usuario_id'])) {
    header("Location: forum.php");
    exit();
}

$page_title = "Comunidade - Voz Atípica";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <style>
        /* Fundo animado igual ao das outras páginas */
        body {
            background: linear-gradient(-45deg, #3A1075, #5b2aad, #7b3fcf, #3A1075);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: white;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .content {
            background-color: rgba(58, 16, 117, 0.8);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(58,16,117,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: white;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .content:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(58,16,117,0.6);
        }

        a {
            color: #d6b3ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #f3e1ff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <div class="content">
            <h2>Bem-vindo(a) à Comunidade Voz Atípica!</h2>
            <p>Este é um espaço seguro, respeitoso e acolhedor, feito especialmente para pessoas autistas e seus aliados. Aqui, você pode compartilhar suas experiências, tirar dúvidas, buscar apoio e se conectar com outras pessoas que entendem sua vivência.</p>

            <h4 class="mt-3">📌 Regras da Comunidade:</h4>
            <ul>
                <li><strong>Respeito acima de tudo:</strong> Não serão tolerados ataques, discursos de ódio, preconceito ou qualquer tipo de desrespeito.</li>
                <li><strong>Seja paciente com a comunicação:</strong> Nem todo mundo se expressa da mesma forma. Algumas pessoas preferem textos curtos, outras se aprofundam mais. Tudo bem!</li>
                <li><strong>Espaço seguro:</strong> Valorizamos a escuta empática. Nem todo mundo comunica do mesmo jeito, então seja paciente.</li>
                <li><strong>Seja gentil:</strong> Dúvidas são bem-vindas! Aqui ninguém julga, todo mundo aprende junto.</li>
                <li><strong>Evite spam:</strong> Não publique links, propagandas ou conteúdos fora do propósito do fórum.</li>
            </ul>

            <p class="mt-3"><strong>Ao participar, você concorda com essas diretrizes e nos ajuda a manter um ambiente saudável para todos. 💜</strong></p>

            <p class="mt-5 text-center">
                <em>Você não precisa se encaixar para pertencer. Este é um espaço feito para pessoas autistas se expressarem com liberdade, segurança e verdade. Sua vivência é válida. Sua voz é bem-vinda. 💜</em>
            </p>
        </div>
    </div>

    <!-- Modal de boas-vindas -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: rgba(58,16,117,0.9); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Junte-se à nossa comunidade!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Participe do nosso fórum e troque experiências com outras pessoas autistas.</p>
                    <div class="d-grid gap-2">
                        <a href="registro.php" class="btn btn-light">Criar Conta</a>
                        <a href="login.php" class="btn btn-light">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            welcomeModal.show();
        });
    </script>
</body>
</html>
