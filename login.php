<?php
session_start();
require_once 'conexao.php'; // Arquivo de conexão com o banco de dados

// Verifique se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para verificar se o usuário existe
    $stmt = $conn->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Verifica a senha
        if (password_verify($senha, $usuario['senha'])) {
            // Define as variáveis de sessão
            $_SESSION['usuario_id'] = $usuario['id'];      // ID do usuário
            $_SESSION['usuario_nome'] = $usuario['nome'];  // Nome do usuário

            // Redireciona para o fórum após login
            header("Location: forum.php");
            exit();
        } else {
            $_SESSION['erro_login'] = "Senha incorreta!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['erro_login'] = "Usuário não encontrado!";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Voz Atípica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #3A1075;
            overflow: hidden;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0; left: 0;
            z-index: 0;
        }
        .login-container {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-box {
            background: rgba(58, 16, 117, 0.85);
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(123, 63, 207, 0.5);
            width: 100%;
            max-width: 420px;
            backdrop-filter: blur(10px);
        }
        h2 {
            margin-bottom: 25px;
            text-align: center;
            font-weight: 700;
        }
        .form-control {
            background: rgba(255 255 255 / 0.15);
            border: none;
            color: white;
        }
        .form-control:focus {
            background: rgba(255 255 255 / 0.25);
            color: white;
            box-shadow: 0 0 8px #7b3fcf;
            border: none;
        }
        label {
            font-weight: 600;
        }
        ::placeholder {
            color: #ddd;
            opacity: 1;
        }
        .btn-light {
            background-color: #7b3fcf;
            border: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            color: white;
        }
        .btn-light:hover {
            background-color: #a074f9;
            color: white;
        }
        a {
            color: #d6b3ff;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            color: #f3e1ff;
            text-decoration: underline;
        }
        .alert {
            background-color: rgba(255, 99, 71, 0.85);
            border: none;
            color: white;
            font-weight: 600;
            box-shadow: 0 0 8px rgba(255, 99, 71, 0.7);
        }
    </style>
</head>
<body>

<div id="particles-js"></div>

<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>

        <!-- Mensagem de erro -->
        <?php
        if (isset($_SESSION['erro_login'])) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['erro_login']) . '</div>';
            unset($_SESSION['erro_login']);
        }
        ?>

        <form action="login.php" method="POST" autocomplete="off" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    required
                    placeholder="seuemail@exemplo.com"
                    autofocus
                />
            </div>
            <div class="mb-4">
                <label for="senha" class="form-label">Senha</label>
                <input
                    type="password"
                    class="form-control"
                    id="senha"
                    name="senha"
                    required
                    placeholder="********"
                />
            </div>
            <button type="submit" class="btn btn-light w-100">Entrar</button>
        </form>

        <p class="text-center mt-3">
            Ainda não tem uma conta? <a href="registro.php">Registrar</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS('particles-js', {
  particles: {
    number: { value: 50, density: { enable: true, value_area: 800 } },
    color: { value: ["#7b3fcf", "#5b2aad", "#3a1075", "#d6b3ff"] },
    shape: { type: "circle" },
    opacity: {
      value: 0.5,
      random: true,
      anim: { enable: true, speed: 1.5, opacity_min: 0.1, sync: false }
    },
    size: {
      value: 4,
      random: true,
      anim: { enable: true, speed: 6, size_min: 0.3, sync: false }
    },
    move: {
      enable: true,
      speed: 1.5,
      direction: "none",
      random: true,
      straight: false,
      out_mode: "out"
    }
  },
  interactivity: {
    detect_on: "canvas",
    events: {
      onhover: { enable: true, mode: "grab" },
      onclick: { enable: true, mode: "push" }
    },
    modes: {
      grab: { distance: 140, line_linked: { opacity: 0.7 } },
      push: { particles_nb: 4 }
    }
  },
  retina_detect: true
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
