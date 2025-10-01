<?php
session_start();

// Se tiver dados salvos em sessão, usa eles
$nome = $_SESSION['nome'] ?? "Usuário Padrão";
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
        position: fixed;
        top: 0;
        left: 0;
        width: 60px;
        height: 100vh;
        background-color: #fff;
        border-right: 1px solid #ddd;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
        gap: 30px;
      }

      .sidebar i {
        font-size: 24px;
        cursor: pointer;
      }

      .container {
        margin-left: 80px;
        max-width: 600px;
        margin-top: 30px;
      }

      .profile {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .profile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .profile-info {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .profile-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }

      .profile-info h2 {
        margin: 0;
        font-size: 18px;
      }

      .profile-info p {
        margin: 0;
        color: gray;
        font-size: 14px;
      }

      .edit-btn {
        padding: 8px 12px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .post-box {
        margin-top: 15px;
      }

      .post-box textarea {
        width: 100%;
        height: 60px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        resize: none;
      }

      .post-box button {
        margin-top: 8px;
        padding: 8px 20px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .feed {
        margin-top: 20px;
      }

      .post {
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      }

      .post .user {
        font-weight: bold;
      }

      .post .username {
        color: gray;
        font-size: 14px;
        margin-left: 5px;
      }

      .interactions {
        margin-top: 5px;
        color: gray;
        font-size: 14px;
      }

      .interactions span {
        margin-right: 10px;
      }

      .mika img,
      .mika2 img {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        border-radius: 50%;
      }
    </style>
  </head>
  <body>
    <div class="sidebar">
      <i>🏠</i>
      <i>🔍</i>
      <i>➕</i>
      <i>👤</i>
    </div>

    <div class="container">
      <div class="profile">
        <div class="profile-header">
          <div class="profile-info">
            <img src="https://pbs.twimg.com/media/GO2Zo1KXwAE4bws?format=jpg&name=4096x4096" alt="Foto de perfil">
            <div>
              <h2><?php echo htmlspecialchars($nome); ?></h2>
              <p>@<?php echo htmlspecialchars($usuario); ?></p>
            </div>
          </div>
          <button class="edit-btn">Editar Perfil</button>
        </div>

        <div class="post-box">
          <textarea placeholder="O que você está pensando?"></textarea>
          <br />
          <button>Postar</button>
        </div>

        <div class="feed">
          <div class="post">
            <div class="mika">
              <img
                src="https://i.pinimg.com/736x/5f/ef/89/5fef89a3131b13249358b4fd2c4a68b0.jpg"
                alt="foto"
              />
            </div>
            <div>
              <span class="user">Maki Silva </span>
              <span class="username">@makisilva09</span>
            </div>
            <p>não falo nada</p>
            <div class="interactions">
              <span>❤️ 58 curtidas</span>
              <span>💬 1 comentário</span>
            </div>
          </div>

          <div class="post">
            <div class="mika2">
              <img
                src="https://pbs.twimg.com/media/GO2Zo1KXwAE4bws?format=jpg&name=4096x4096"
                alt="Foto de perfil"
              />
            </div>
            <div>
              <span class="user">Itadori</span>
              <span class="username">@itadorigadodeloiras</span>
            </div>
            <p>segura esse Black Flash</p>
            <div class="interactions">
              <span>❤️ 856 curtidas</span>
              <span>💬 436 comentários</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
