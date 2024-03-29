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
            <a href="User/perfil.php">Perfil</a>
        </div>
<section>
        <div class="topicsstart">
            <h3>Encontre seus favoritos</h3>
            <hr>
        </div>
    
        <div class="topics">
            <a href="User/tags/fantasia.php?categoria_id=1">•  Fantasia</a>
            <a href="User/tags/terror.php?categoria_id=2">•  Terror</a>
            <a href="User/tags/romance.php?categoria_id=3">•  Romance</a>
            <a href="User/tags/drama.php?categoria_id=4">•  Drama</a>
            <a href="User/tags/aventura.php?categoria_id=5">•  Aventura</a>
        </div>
        
        <div class="topics2">
            <a href="User/tags/suspense.php?categoria_id=6">•  Suspense</a>
            <a href="User/tags/acao.php?categoria_id=7">•  Ação</a>
            <a href="User/tags/comedia.php?categoria_id=8">•  Comédia</a>
            <a href="User/tags/guerra.php?categoria_id=9">•  Guerra</a>
            <a href="User/tags/luta.php?categoria_id=10">•  Luta</a>
        </div>
        <div class="search">
            <form id="search-form">
                <input type="search" id="search-input" placeholder="Pesquisar">
                    <ul id="suggestions"></ul>
            </form>
        </div>
    <script src="../Resources/Js/search.js"></script>
    </section>
</body>
</html>
