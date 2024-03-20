<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/css/stylelanding.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="../Resources/Js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
            <button id="log" onclick="logout()">Sair</button>
            <h3>Olá <?php echo $_SESSION['usuarioNomedeUsuario'], "!"; ?> </h3>
        <?php else: ?>
        <?php endif; ?>
    </header>
    
    <section>
        <div class="retanguloheader">
            <img src="../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
            <h1>Abc fanfiction</h1>
            <h3><a href="login.php">conecte-se</a></h3>
        </div>
        
        <div class="subretangulo">
            <a href="User/tags.php">Tags</a>
            <?php
                if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                <a href="User/perfil.php">perfil</a><br>
            <?php else: ?>
            <?php endif; ?>
            <a href="User/sobre.php">Sobre</a>
        </div>

        <div class="topicsstart">
            <h3>Encontre seus favoritos</h3>
            <hr>
        </div>
    
        <div class="topics">
            <a href="topic1.html">•  Todos os fãs</a>
            <a href="topic2.html">•  Anime e mangá</a>
            <a href="topic3.html">•  Livros e Literatura</a>
            <a href="topic4.html">•  Desenhos animados e HQS</a>
            <a href="topic5.html">•  Celebridades e pessoas reais</a>
        </div>
        
        <div class="topics2">
            <a href="topic8.html">•  Filmes</a>
            <a href="topic9.html">•  Música e Bandas</a>
            <a href="topic10.html">•  Outras mídias</a>
            <a href="topic11.html">•  Teatro</a>
            <a href="topic12.html">•  Programas de televisão</a>
            <a href="topic13.html">•  Jogos de vídeo</a>
            <a href="topic13.html">•  Fandoms sem categoria</a> 
        </div>  
    </section>
</body>
</html>
