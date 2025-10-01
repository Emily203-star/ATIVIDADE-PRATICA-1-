<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = trim($_POST['nome'] ?? '');
    $usuario  = trim($_POST['usuario'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $senha    = $_POST['senha'] ?? '';
    $confirmar= $_POST['confirmar'] ?? '';

    // Validação da senha
    if ($senha !== $confirmar) {
        echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
        exit;
    }

    // Salva dados na sessão
    $_SESSION['nome']    = $nome;
    $_SESSION['usuario'] = $usuario;

    // Redireciona direto para a página inicial
    header("Location: index.php");
    exit;
}
?>
