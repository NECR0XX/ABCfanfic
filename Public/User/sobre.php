<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="../../Resources/css/stylesobre.css">
</head>
<body>
    <header>
        <div class="cabpri">
            <div class="logo">
                <img src="../../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
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
                    <a href="perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="sobre.php">Sobre</a>
            </div>
            <div class="search">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Pesquise Aqui">
                        <ul id="suggestions"></ul>
                </form>
                    </div>
                <script src="../../Resources/Js/searchuser.js"></script>
            </div>
    </header>   
    <section>
        <div class="container2">
            <div class="container">
                <div class="ret">
                    <h1>Sobre Nós</h1>
                </div>
                <p>A Abc Fanfiction é uma organização sem fins lucrativos, criada por fãs em 2007, para servir os interesses dos fãs, fornecendo acesso e preservando a história das obras de fãs e da cultura de fãs em suas inúmeras formas. Acreditamos que as obras de fãs são transformadoras e que as obras transformadoras são legítimas.
                Somos proativos e inovadores na proteção e defesa do nosso trabalho contra a exploração comercial e desafios legais. Preservamos nossa economia, valores e expressão criativa de fãs, protegendo e nutrindo nossos colegas fãs, nosso trabalho, nossos comentários, nossa história e nossa identidade, ao mesmo tempo em que fornecemos o acesso mais amplo possível à atividade de fãs para todos os fãs.</p>
                <p>A Abc oferece um local de hospedagem central não comercial e sem fins lucrativos para obras de fãs usando software de arquivamento de código aberto.</p>
            </div>
        </div>
    </section>
</body>
</html>
