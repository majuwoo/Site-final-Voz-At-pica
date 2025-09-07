<?php 
session_start();
require_once 'conexao.php';

$page_title = "Fórum - Voz Atípica";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Postagem
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['conteudo_post'])) {
    $conteudo_post = trim($_POST['conteudo_post']);
    if (!empty($conteudo_post)) {
        $stmt = $conn->prepare("INSERT INTO posts (usuario_id, conteudo) VALUES (?, ?)");
        $stmt->bind_param("is", $_SESSION['usuario_id'], $conteudo_post);
        $stmt->execute();
    }
}

// Comentário
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['conteudo_comentario'], $_POST['post_id'])) {
    $conteudo_comentario = trim($_POST['conteudo_comentario']);
    $post_id = (int) $_POST['post_id'];
    if (!empty($conteudo_comentario)) {
        $stmt = $conn->prepare("INSERT INTO comentarios (post_id, usuario_id, conteudo) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $post_id, $_SESSION['usuario_id'], $conteudo_comentario);
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Seu CSS -->
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="forum.css">

    <style>
        /* Fundo animado */
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

        /* Ícone do usuário */
        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid white;
        }

        /* Posts e comentários */
        .post, .comment {
            background-color: rgba(58, 16, 117, 0.8);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(58,16,117,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: white;
        }

       .post:hover, .comment:hover {
            /* Removido o translate para evitar deslocamento */
            box-shadow: 0 12px 25px rgba(58,16,117,0.6);
        }

        /* Comentários com fundo um pouco mais claro */
        .comment {
            background-color: rgba(91, 42, 173, 0.8);
            margin-top: 10px;
        }

        /* Botões com borda arredondada e efeitos */
        .btn-outline-light {
            border-radius: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: #7b3fcf;
            color: white;
            border-color: #7b3fcf;
        }

        .btn-light {
            border-radius: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-light:hover {
            background-color: #7b3fcf;
            color: white;
        }

        /* Pequenos ajustes no container e título */
        .container {
            max-width: 900px;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        }

    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-4">
   <div class="post mb-4" style="padding: 20px 30px;">
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? 'Anônimo'); ?>!</h2>
    <p>Aqui você pode compartilhar sua história e interagir com outras pessoas da comunidade.</p>

    <!-- Formulário de novo post -->
    <form action="forum.php" method="POST" class="mt-3">
        <textarea class="form-control" name="conteudo_post" placeholder="Escreva seu post..." rows="3" required></textarea>
        <button type="submit" class="btn btn-light mt-2">
            <i class="fas fa-paper-plane"></i> Postar
        </button>
    </form>
</div>


        <!-- Lista de posts -->
        <?php
        $query = "SELECT posts.id, posts.conteudo, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.imagem_perfil 
                  FROM posts 
                  JOIN usuarios ON posts.usuario_id = usuarios.id 
                  ORDER BY posts.data_criacao DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0):
            while ($post = $result->fetch_assoc()):
                $imagem_postador = $post['imagem_perfil'] ? 'uploads/' . $post['imagem_perfil'] : 'uploads/avatar_padrao.png';
        ?>
            <div class="post mb-4">
                <div class="d-flex align-items-center mb-2">
                    <!-- Tornando a foto clicável -->
                    <a href="perfil.php?usuario_id=<?php echo $post['usuario_id']; ?>">
                        <img src="<?php echo $imagem_postador; ?>" class="user-icon" alt="Foto do usuário">
                    </a>
                    <h5 class="mb-0"><?php echo htmlspecialchars($post['nome']); ?> - 
                        <small class="text-light"><?php echo date('d/m/Y H:i', strtotime($post['data_criacao'])); ?></small>
                    </h5>
                </div>
                <p><?php echo nl2br(htmlspecialchars($post['conteudo'])); ?></p>

                <!-- Formulário de comentário -->
                <form action="forum.php" method="POST" class="mt-2">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <textarea class="form-control mb-2" name="conteudo_comentario" placeholder="Comente algo..." rows="2" required></textarea>
                    <button type="submit" class="btn btn-outline-light">
                        <i class="fas fa-comment"></i> Comentar
                    </button>
                </form>

                <!-- Botões de comentário e exclusão em uma linha com espaçamento -->
                <div class="d-flex gap-2 mt-3 align-items-center">
                    <button class="btn btn-outline-light btn-sm" type="button"
                        onclick="toggleComentarios('<?php echo $post['id']; ?>')" id="botao-comentarios-<?php echo $post['id']; ?>">
                        Ver Comentários
                    </button>
                    <button class="btn btn-outline-light btn-sm" type="button"
                        id="botao-fechar-<?php echo $post['id']; ?>" style="display:none;"
                        onclick="toggleComentarios('<?php echo $post['id']; ?>')">
                        Fechar Comentários
                    </button>

                    <?php if ($post['usuario_id'] == $_SESSION['usuario_id']): ?>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalExcluirPost<?php echo $post['id']; ?>">
                        Excluir Post
                    </button>
                    <?php endif; ?>
                </div>

                <!-- Comentários -->
                <div class="collapse mt-3" id="comentarios-<?php echo $post['id']; ?>">
                    <?php
                    $comentarios_stmt = $conn->prepare(
                        "SELECT comentarios.id, comentarios.conteudo, comentarios.data_criacao, usuarios.nome, usuarios.imagem_perfil, usuarios.id AS autor_id 
                         FROM comentarios 
                         JOIN usuarios ON comentarios.usuario_id = usuarios.id
                         WHERE comentarios.post_id = ? 
                         ORDER BY comentarios.data_criacao ASC"
                    );
                    $comentarios_stmt->bind_param("i", $post['id']);
                    $comentarios_stmt->execute();
                    $comentarios_result = $comentarios_stmt->get_result();

                    if ($comentarios_result->num_rows > 0):
                        while ($comentario = $comentarios_result->fetch_assoc()):
                            $imagem_comentador = $comentario['imagem_perfil'] ? 'uploads/' . $comentario['imagem_perfil'] : 'uploads/avatar_padrao.png';
                    ?>
                        <div class="comment p-2 rounded">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo $imagem_comentador; ?>" class="user-icon" alt="Foto do usuário">
                                <strong><?php echo htmlspecialchars($comentario['nome']); ?></strong>
                            </div>
                            <p class="mb-1 mt-1"><?php echo nl2br(htmlspecialchars($comentario['conteudo'])); ?></p>
                            <small><?php echo date('d/m/Y H:i', strtotime($comentario['data_criacao'])); ?></small>

                            <?php if ($comentario['autor_id'] == $_SESSION['usuario_id']): ?>
                                <!-- Botão que ativa o modal -->
<button type="button" class="btn btn-danger btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#modalExcluirComentario<?php echo $comentario['id']; ?>">
    Excluir
</button>

<!-- Modal de confirmação -->
<div class="modal fade" id="modalExcluirComentario<?php echo $comentario['id']; ?>" tabindex="-1" aria-labelledby="modalExcluirComentarioLabel<?php echo $comentario['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: rgba(91,42,173,0.95); color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExcluirComentarioLabel<?php echo $comentario['id']; ?>">Confirmar Exclusão</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este comentário? Esta ação é irreversível.
      </div>
      <div class="modal-footer">
        <form action="excluir_comentario.php" method="POST">
            <input type="hidden" name="comentario_id" value="<?php echo $comentario['id']; ?>">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
                            <?php endif; ?>
                        </div>
                    <?php
                        endwhile;
                    else:
                        echo "<p class='text-light'>Nenhum comentário ainda.</p>";
                    endif;
                    ?>
                </div>

                <!-- Modal para excluir post -->
                <?php if ($post['usuario_id'] == $_SESSION['usuario_id']): ?>
                <div class="modal fade" id="modalExcluirPost<?php echo $post['id']; ?>" tabindex="-1" aria-labelledby="modalExcluirPostLabel<?php echo $post['id']; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="background-color: rgba(58,16,117,0.95); color: white;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalExcluirPostLabel<?php echo $post['id']; ?>">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        Tem certeza que deseja excluir este post? Esta ação não pode ser desfeita.
                      </div>
                      <div class="modal-footer">
                        <form action="excluir_post.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

            </div>
        <?php
            endwhile;
        else:
            echo "<p class='text-light'>Nenhum post encontrado.</p>";
        endif;
        ?>
</div>

<!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleComentarios(postId) {
        const comentariosDiv = document.getElementById('comentarios-' + postId);
        const btnVer = document.getElementById('botao-comentarios-' + postId);
        const btnFechar = document.getElementById('botao-fechar-' + postId);

        if (comentariosDiv.classList.contains('show')) {
            comentariosDiv.classList.remove('show');
            btnVer.style.display = 'inline-block';
            btnFechar.style.display = 'none';
        } else {
            comentariosDiv.classList.add('show');
            btnVer.style.display = 'none';
            btnFechar.style.display = 'inline-block';
        }
    }
   
</script>
</body>
</html>
<?php include 'footer.php'; ?>