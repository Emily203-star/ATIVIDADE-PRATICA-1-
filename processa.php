<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Cadastro de usuário
    if (isset($_POST['nome']) && isset($_POST['usuario'])) {
        $nome      = trim($_POST['nome'] ?? '');
        $usuario   = trim($_POST['usuario'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $senha     = $_POST['senha'] ?? '';
        $confirmar = $_POST['confirmar'] ?? '';

        // Validação da senha
        if ($senha !== $confirmar) {
            echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
            exit;
        }

        // Salva dados do usuário na sessão
        $_SESSION['nome']    = $nome;
        $_SESSION['usuario'] = $usuario;

        // Redireciona para a página inicial
        header("Location: index.php");
        exit;
    }

    // Criação de posts
    if (isset($_POST['conteudo'])) {
        $conteudo = trim($_POST['conteudo'] ?? '');

        if ($conteudo !== '') {
            if (!isset($_SESSION['posts'])) {
                $_SESSION['posts'] = [];
            }
            $_SESSION['posts'][] = $conteudo;
        }

        header("Location: index.php");
        exit;
    }

    // Like
    if (isset($_POST['like_id'])) {
        $id = (int) $_POST['like_id'];

        // Se não houver likes ainda, inicializa
        if (!isset($_SESSION['likes'])) {
            $_SESSION['likes'] = [];
        }

        // Se o post não tiver curtidas ainda, começa com 0
        if (!isset($_SESSION['likes'][$id])) {
            $_SESSION['likes'][$id] = 0;
        }

        // Incrementa curtidas
        $_SESSION['likes'][$id]++;

        header("Location: index.php");
        exit;
    }

    // Exclusão de post
    if (isset($_POST['delete_id'])) {
        $id = (int) $_POST['delete_id'];
        if (isset($_SESSION['posts'][$id])) {
            unset($_SESSION['posts'][$id]);
        }
        header("Location: index.php");
        exit;
    }

}

// Se não for POST, volta pro index
header("Location: index.php");
exit;
