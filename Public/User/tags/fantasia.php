<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/FanficController.php';

if (isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];

    $fanficController = new FanficController($pdo);
    $fanfics = $fanficController->listarFanficsPorCategoria($categoria_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="../../../Resources/Css/stylecateg.css">
    <title>Lista de Fanfics de Ação</title>
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
                <a href="../tags.php">Voltar</a>
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
    <div class="container2">
            <h1 class= "tag2"><a href="../landing.php">Abc fanfiction</h1></a> <h1 class= "tag"> > </h1> <h1 class= "tag2"><a href="../tags.php"> Tags </h1></a> <h1 class= "tag"> > </h1> <h1 class= "tag"> Fantasia </h1>
    </div>
        <div class="fanfic-container">
            <?php
                foreach ($fanfics as $fanfic) {
                    echo "<div class='fanfic'>";
                    echo "<a href='leiturafan.php?fanfic_id={$fanfic['id_fanfic']}'><p><strong>Título: </strong>{$fanfic['titulo']}</p></a>";
                    echo "<p><strong>Autor: </strong>{$fanfic['nome_user']}</p>";
                    if (!empty($fanfic['imagem'])) {
                        echo '<img src="../' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
                    } else {
                        echo 'Sem Imagem';
                    }
                    echo "<p><strong>Status: </strong>";
                    if ($fanfic['concluido']) {
                        echo "Concluído";
                    } else {
                        echo "Em andamento";
                    }
                    echo "</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>