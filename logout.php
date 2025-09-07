<?php
session_start();
session_destroy();
header("Location: index.php"); // Agora redireciona para a página inicial
exit();
