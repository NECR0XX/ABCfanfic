<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/css/styletag.css">
    <title>Document</title>
</head>
<header>
        <div class="cabpri">
            <div class="logo">
                <img src="../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
                <h1>Abc fanfiction</h1>
            </div>
            <div class="acess">
                <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <button id="log" onclick="logout()">Sair</button>
                <?php else: ?>
                    <h3><a href="login.php">conecte-se</a></h3>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="cabsec">
            <div class="bots">
                <a href="tags.php">Tags</a>
                <?php
                    if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <a href="User/perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="gsobre.php">Sobre</a>
                <a class="procurar" href="User/search.php">Procurar</a>

            </div>
            <div class="search">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Pesquise Aqui">
                        <ul id="suggestions"></ul>
                </form>
                    </div>
                <script src="../Resources/Js/search.js"></script>
            </div>
    </header>   
<body>
    <a href="../landing.php">Voltar</a><br><br>
    <a href="tags/fantasia.php?categoria_id=1">Fantasia</a><br>
    <a href="tags/terror.php?categoria_id=2">Terror</a><br>
    <a href="tags/romance.php?categoria_id=3">Romance</a><br>
    <a href="tags/drama.php?categoria_id=4">Drama</a><br>
    <a href="tags/aventura.php?categoria_id=5">Aventura</a><br>
    <a href="tags/suspense.php?categoria_id=6">Suspense</a><br>
    <a href="tags/acao.php?categoria_id=7">Ação</a><br>
    <a href="tags/comedia.php?categoria_id=8">Comédia</a><br>
    <a href="tags/guerra.php?categoria_id=9">Guerra</a><br>
    <a href="tags/luta.php?categoria_id=10">Luta</a><br>
</body>
</html>