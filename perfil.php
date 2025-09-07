<?php 
session_start();
require_once 'conexao.php';
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$page_title = "Meu Perfil - Voz Atípica";
include 'header.php';

// Define o id do usuário a exibir (ou o próprio, por padrão)
$usuario_id = isset($_GET['usuario_id']) ? $_GET['usuario_id'] : $_SESSION['usuario_id'];

$usuario_nome = $_SESSION['usuario_nome'] ?? '';
$email = '';
$bio = '';
$imagem_perfil = '';

// Busca os dados do usuário no banco
$stmt = $conn->prepare("SELECT nome, email, bio, imagem_perfil FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($usuario_nome, $email, $bio, $imagem_perfil);
$stmt->fetch();
$stmt->close();
?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(-45deg, #3A1075, #5b2aad, #7b3fcf, #3A1075);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        color: white;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    #page-wrapper {
        flex: 1 0 auto;
    }

    footer {
        flex-shrink: 0;
    }

    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    .profile-card {
        background-color: rgba(58, 16, 117, 0.85);
        border-radius: 15px;
        padding: 40px 30px;
        box-shadow: 0 8px 25px rgba(58, 16, 117, 0.7);
        text-align: center;
        color: white;
    }

    .profile-pic {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        margin-bottom: 20px;
        box-shadow: 0 0 10px #7b3fcf;
        transition: transform 0.3s ease;
    }

    .profile-pic:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px #a475f9;
    }

    .btn-light {
        border-radius: 30px;
        background-color: white;
        color: #3A1075;
        padding: 10px 30px;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 10px rgba(123, 63, 207, 0.5);
        margin-top: 25px;
    }

    .btn-light:hover {
        background-color: #7b3fcf;
        color: white;
        box-shadow: 0 6px 15px rgba(123, 63, 207, 0.8);
    }
</style>

<div id="page-wrapper">
    <div class="container mt-5 mb-5">
        <div class="profile-card">
            <img src="uploads/<?php echo $imagem_perfil ?: 'avatar_padrao.png'; ?>" alt="Foto de perfil" class="profile-pic" />
            <h2><?php echo htmlspecialchars($usuario_nome); ?></h2>

            <?php if ($_SESSION['usuario_id'] == $usuario_id): ?>
                <p><?php echo htmlspecialchars($email); ?></p>
            <?php else: ?>
                <p>Email protegido.</p>
            <?php endif; ?>

            <p><em><?php echo nl2br(htmlspecialchars($bio ?: "Nenhuma bio adicionada ainda.")); ?></em></p>

            <?php if ($_SESSION['usuario_id'] == $usuario_id): ?>
                <a href="editar_perfil.php" class="btn btn-light">Editar Perfil</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
