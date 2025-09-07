<?php
session_start();
require_once 'conexao.php';
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$stmt = $conn->prepare("SELECT nome, email, bio, imagem_perfil FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($usuario_nome, $email, $bio, $imagem_perfil);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novo_nome = $_POST['nome'] ?? $usuario_nome;
    $novo_email = $_POST['email'] ?? $email;
    $nova_bio = $_POST['bio'] ?? $bio;

    if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] == 0) {
        $arquivo = $_FILES['imagem_perfil'];
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($extensao), $extensoes_permitidas)) {
            $novo_nome_imagem = uniqid("perfil_") . "." . $extensao;
            $caminho = "uploads/" . $novo_nome_imagem;

            if (move_uploaded_file($arquivo['tmp_name'], $caminho)) {
                $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, imagem_perfil = ?, bio = ? WHERE id = ?");
                $stmt->bind_param("ssssi", $novo_nome, $novo_email, $novo_nome_imagem, $nova_bio, $usuario_id);
                $stmt->execute();
                $stmt->close();
                header("Location: perfil.php");
                exit();
            } else {
                $erro_upload = "Erro ao enviar a imagem.";
            }
        } else {
            $erro_upload = "Formato de imagem inválido.";
        }
    } else {
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, bio = ? WHERE id = ?");
        $stmt->bind_param("sssi", $novo_nome, $novo_email, $nova_bio, $usuario_id);
        $stmt->execute();
        $stmt->close();
        header("Location: perfil.php");
        exit();
    }
}

$page_title = "Editar Perfil - Voz Atípica";
include 'header.php';
?>

<style>
body {
    background: linear-gradient(-45deg, #3A1075, #5b2aad, #7b3fcf, #3A1075);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    font-family: 'Poppins', sans-serif;
    color: white;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.edit-profile-container {
    background-color: rgba(58, 16, 117, 0.85);
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 8px 25px rgba(58, 16, 117, 0.7);
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
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

h2 {
    font-weight: 600;
    margin-bottom: 25px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}

label {
    font-weight: 600;
    color: #d3c6f8;
}

.form-control {
    border-radius: 10px;
    border: none;
    padding: 10px 15px;
    font-size: 1rem;
}

.form-control:focus {
    box-shadow: 0 0 8px #7b3fcf;
    border: none;
    outline: none;
}

.btn-light {
    border-radius: 30px;
    background-color: white;
    color: #3A1075;
    padding: 10px 30px;
    font-weight: 600;
    border: none;
    box-shadow: 0 4px 10px rgba(123, 63, 207, 0.5);
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 20px;
}

.btn-light:hover {
    background-color: #7b3fcf;
    color: white;
    box-shadow: 0 6px 15px rgba(123, 63, 207, 0.8);
}

.alert-error {
    background-color: #d9534f;
    padding: 10px 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-weight: 600;
    box-shadow: 0 0 8px #a94442;
    color: white;
    text-align: center;
}
</style>

<div class="container mt-4 mb-5">
    <div class="edit-profile-container">
        <h2>Editar Perfil</h2>

        <img src="uploads/<?php echo htmlspecialchars($imagem_perfil ?: 'avatar_padrao.png'); ?>" alt="Foto de perfil" class="profile-pic" />

        <?php if (!empty($erro_upload)): ?>
            <div class="alert-error"><?php echo htmlspecialchars($erro_upload); ?></div>
        <?php endif; ?>

        <form action="editar_perfil.php" method="POST" enctype="multipart/form-data" novalidate>
            <div class="mb-3 text-start">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo htmlspecialchars($usuario_nome); ?>" required />
            </div>
            <div class="mb-3 text-start">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required />
            </div>
            <div class="mb-3 text-start">
                <label for="bio">Sua bio</label>
                <textarea name="bio" id="bio" class="form-control" rows="4"><?php echo htmlspecialchars($bio); ?></textarea>
            </div>
            <div class="mb-3 text-start">
                <label for="imagem_perfil">Alterar foto de perfil</label>
                <input type="file" name="imagem_perfil" id="imagem_perfil" class="form-control" accept="image/*" />
            </div>
            <button type="submit" class="btn btn-light">Salvar Alterações</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
