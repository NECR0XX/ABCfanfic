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
    <title>ABC Fanfiction</title>
</head>
<body>
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
                <a href="User/tags.php">Tags</a>
                <?php
                    if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <a href="User/perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="User/sobre.php">Sobre</a>
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
    <section>
        <div class="infog">
            <div class="cat">
                <h2>Encontre seus favoritos</h2>
                <div class="line"></div>
                <div class="cat2">
                    <a href="User/tags/acao.php?categoria_id=7">•  Ação</a>
                    <a href="User/tags/aventura.php?categoria_id=5">•  Aventura</a>
                    <a href="User/tags/comedia.php?categoria_id=8">•  Comédia</a>
                    <a href="User/tags/drama.php?categoria_id=4">•  Drama</a>
                    <a href="User/tags/fantasia.php?categoria_id=1">•  Fantasia</a>
                </div>
                <div class="cat3">
                    <a href="User/tags/guerra.php?categoria_id=9">•  Guerra</a>
                    <a href="User/tags/luta.php?categoria_id=10">•  Luta</a>
                    <a href="User/tags/romance.php?categoria_id=3">•  Romance</a>
                    <a href="User/tags/suspense.php?categoria_id=6">•  Suspense</a>
                    <a href="User/tags/terror.php?categoria_id=2">•  Terror</a>
                </div>
            </div>
            <div class="infor">
                <p>Um site criado por fãs, administrado por fãs, sem fins lucrativos e não comercial, para obras de fãs transformadoras, como fanfiction, fanart, vídeos de fãs e podfic</p>
                <h5>mais de 63.990 fandoms | 6.816.000 usuários | 12.630.000 obras</h5>
            </div>
            <div class="siga">
                <h2>Siga-nos</h2>
                <div class="line2"></div>
                <p>Siga-nos no <a href="https://twitter.com/">Twitter</a> ou no <a href="https://www.tumblr.com/?language=pt_BR">Tumblr</a> para atualizações de status</p>
            </div>
            <div class="bene">
                <p>Com uma conta Abc, você pode:<br><br>
                ° Compartilhar suas próprias obras de fãs<br>
                ° Ser notificado quando suas obras, séries ou usuários favoritos forem atualizados<br>
                ° Participar de desafios<br>
                ° Acompanhar as obras que você visitou e as que deseja conferir mais tarde<br>
                Você pode participar recebendo um convite de nossa fila de convites automática. Todos os fãs e fanworks são bem-vindos!</p>
                <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <?php else: ?>
                        <form action="cadastro.php">
                            <button>Seja Convidado</button>
                        </form>
                    <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <div class="foot">
            
        </div>
    </footer>
</body>
</html>
