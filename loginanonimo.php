<?php
session_start();

// Cria sessão como "usuário anônimo"
$_SESSION['usuario_id'] = 'anonimo_' . uniqid();
$_SESSION['usuario_nome'] = 'Anônimo';

header("Location: forum.php");
exit();
