<?php
session_start();

// Se não houver posts ainda, cria array vazio
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [];
}

// Se não houver likes ainda, cria array vazio
if (!isset($_SESSION['likes'])) {
    $_SESSION['likes'] = [];
}

// Dados do usuário
$nome    = $_SESSION['nome'] ?? "Usuário Padrão";
$usuario = $_SESSION['usuario'] ?? "usuario_padrao";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Mini Feed</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }
    .sidebar {
      position: fixed; top: 0; left: 0;
      width: 60px; height: 100vh;
      background-color: #fff; border-right: 1px solid #ddd;
      display: flex; flex-direction: column; align-items: center;
      padding-top: 20px; gap: 30px;
    }
    .sidebar i { font-size: 24px; cursor: pointer; }

    .container { margin-left: 80px; max-width: 600px; margin-top: 30px; }
    .profile { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .profile-header { display: flex; align-items: center; justify-content: space-between; }
    .profile-info { display: flex; align-items: center; gap: 10px; }
    .profile-info img { width: 50px; height: 50px; border-radius: 50%; }
    .profile-info h2 { margin: 0; font-size: 18px; }
    .profile-info p { margin: 0; color: gray; font-size: 14px; }

    .edit-btn {
      padding: 8px 12px; background: black; color: white;
      border: none; border-radius: 5px; cursor: pointer;
    }

    .post-box { margin-top: 15px; }
    .post-box textarea {
      width: 95%; height: 60px; padding: 10px;
      border-radius: 8px; border: 1px solid #ccc; resize: none;
    }
    .post-box button {
      margin-top: 8px; padding: 8px 20px;
      background: black; color: white;
      border: none; border-radius: 5px; cursor: pointer;
    }

    .feed { margin-top: 20px; }
    .post {
      background: #fff; padding: 15px;
      border-radius: 8px; margin-bottom: 15px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .post-header { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
    .post-header img { width: 40px; height: 40px; border-radius: 50%; }
    .post .user { font-weight: bold; }
    .post .username { color: gray; font-size: 14px; margin-left: 5px; }

    .like-btn { border: none; background: none; cursor: pointer; font-size: 20px; }

    .post-usarnames{ display: flex; flex-direction: column; }
    .post-actions{display: flex; justify-content: space-between; align-items: center; margin-top: 10px;}
    .delete-btn {
      border: none;
      background: none;
      cursor: pointer;
      font-size: 18px;
      margin-left: 10px;
      color: red;
    }

  </style>
</head>
<body>
  <div class="sidebar">
    <i>🏠</i><i>🔍</i><i>➕</i><i>👤</i>
  </div>

  <div class="container">
    <div class="profile">
      <div class="profile-header">
        <div class="profile-info">
          <img src="https://pbs.twimg.com/media/GO2Zo1KXwAE4bws?format=jpg&name=4096x4096" alt="Foto de perfil">
          <div>
            <h2><?= htmlspecialchars($nome) ?></h2>
            <p>@<?= htmlspecialchars($usuario) ?></p>
          </div>
        </div>
        <button class="edit-btn">Editar Perfil</button>
      </div>

      <!-- Formulário de criação de post -->
      <div class="post-box">
        <form method="POST" action="processa.php">
          <textarea name="conteudo" placeholder="O que você está pensando?"></textarea>
          <br />
          <button type="submit">Postar</button>
        </form>
      </div>

      <!-- Feed do usuário -->
      <div class="feed">
        <?php foreach (array_reverse($_SESSION['posts'], true) as $id => $post): ?>
          <div class="post">
            <div class="post-header">
              <img src="https://pbs.twimg.com/media/GO2Zo1KXwAE4bws?format=jpg&name=4096x4096" alt="foto">
              <div class="post-usarnames">
                <span class="user"><?= htmlspecialchars($nome) ?></span>
                <span class="username">@<?= htmlspecialchars($usuario) ?></span>
              </div>
            </div>
            <p><?= nl2br(htmlspecialchars($post)) ?></p>

            <!-- Botão de like -->
            <form method="POST" action="processa.php">
              <div class="post-actions">
                  <input type="hidden" name="like_id" value="<?= $id ?>">
                  <button type="submit" class="like-btn">❤️</button>
                  <span>
                    <?= $_SESSION['likes'][$id] ?? 0 ?> curtidas
                  </span>
              </div>
            </form>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>
</html>
