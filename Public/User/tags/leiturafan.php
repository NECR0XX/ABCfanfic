<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/CapController.php';
require_once '../../../App/Controller/FanficController.php';
require_once '../../../App/Controller/FavoritoController.php';
$fanfic_id = $_GET['fanfic_id'];

$fanficController = new FanficController($pdo);
$capController = new CapController($pdo);
$favoritoController = new FavoritoController($pdo);

$fanfics = $fanficController->getFanficById($fanfic_id);
$caps = $capController->listarCaps($fanfic_id);

$user_id = $_SESSION['usuarioId'];
$favoritada = $favoritoController->verificarFavorito($user_id, $fanfic_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" type="text/css" href="../../../Resources/css\leiturafan.css" />
    <title>Leitura</title>
</head>
<body>
    <header>
        <div class="cabpri">
            <div class="logo">
                <img src="../../../Resources/Assets/Uploads/WhatsApp Image 2024-03-15 at 9.43.43 AM.jpeg" alt="logo" class="logo">
                <h1>Abc fanfiction</h1>
            </div>
            <div class="acess">
                <?php if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <button id="log" onclick="logout()">Sair</button>
                <?php else: ?>
                    <h3><a href="../../../login.php">conecte-se</a></h3>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="cabsec">
            <div class="bots">
                <a href="../tags.php">Tags</a>
                <?php
                    if(isset($_SESSION['usuarioEmail']) && isset($_SESSION['usuarioNomedeUsuario'])): ?>
                    <a href="../perfil.php">perfil</a><br>
                <?php else: ?>
                <?php endif; ?>
                <a href="../sobre.php">Sobre</a>
            </div>
            <div class="search">
                <form id="search-form">
                    <input type="search" id="search-input" placeholder="Pesquise Aqui">
                        <ul id="suggestions"></ul>
                </form>
                    </div>
                <script src="../../../Resources/Js/searchtags.js"></script>
            </div>
    </header>
    <section>
        <div class="container">
        <div class="info">
        <?php if($favoritada): ?>
            <p>Fanfic favoritada</p>
        <?php else: ?>
            <form method='post' action="../../../App/Providers/favorito.php">
                <input type='hidden' name='fanfic_imagem' value="<?php echo $fanfics['imagem']; ?>">
                <input type='hidden' name='fanfic_titulo' value="<?php echo $fanfics['titulo']; ?>">
                <input type='hidden' name='user_id' value="<?php echo $_SESSION['usuarioId']; ?>">
                <input type='hidden' name='fanfic_id' value="<?php echo $fanfics['id_fanfic']; ?> ">
                <button type='submit'>Favoritar</button>
            </form>
        <?php endif; ?>

        <?php
        echo "<p><strong>Título: </strong>" . $fanfics['titulo'] . "</p>";
        echo "<p><strong>Autor: </strong>" . $fanfics['nome_user'] . "</p>";

        if (!empty($fanfics['imagem'])) {
            echo '<img src="../' . $fanfics['imagem'] . '" alt="Imagem do fanfic" width="100">';
        } else {
            echo 'Sem Imagem';
        }

        echo "<p><strong>Status: </strong>";
        echo $fanfics['concluido'] ? "Concluído" : "Em andamento";
        echo "</p>";

        echo '
            <div class="rating">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="../../../Resources/Js/rate.js"></script>';
        echo "</div>";

        echo "<p><strong>Sinopse: </strong>" . $fanfics['sinopse'] . "</p>";

        foreach ($caps as $cap) {
            echo "<a href='leituracap.php?id_capitulo={$cap['id_capitulo']}'>" . $cap['cap'] . "</a><br>";
        }

        ?>
        </div>
    </section>
</body>
</html>