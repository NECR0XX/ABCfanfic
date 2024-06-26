<?php
session_start();
require_once '../../Config/config.php';
require_once '../../App/Controller/FavoritoController.php';

$favoritoController = new FavoritoController($pdo);
$favoritos = $favoritoController->listarFavoritos($_SESSION['usuarioId']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="../../Resources/css/stylefavo.css">
    <title>Favoritos</title>
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
        <div class="favbox">
            <h1>Seus Favoritos</h1>
            <?php
            if (count($favoritos) > 0) {
                foreach ($favoritos as $favorito) {
                    echo "<a href='tags/leiturafan.php?fanfic_id={$favorito['fanfic_id']}'><p><strong>Título: </strong>{$favorito['fanfic_titulo']}</p></a>";
                    if (!empty($favorito['fanfic_imagem'])) {
                        echo '<img src="' . $favorito['fanfic_imagem'] . '" alt="Imagem do favorito" width="100">';
                    } else {
                        echo 'Sem Imagem';
                    }
                }
            }
                    else {
                echo "<h3>Você ainda não adicionou nenhuma fanfic aos favoritos.";
            }
            ?>
        </div>
    </section>
</body>
</html>